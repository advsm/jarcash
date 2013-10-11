<?php

class Db_Peer extends Zend_Db_Table_Abstract
{

	const CACHE_TIME_LIMIT = 3600;
	
    /**
     * Classname for row
     *
     * @var string
     */
	protected $_rowClass = 'Db_Row';

    /**
     * Classname for rowset
     *
     * @var string
     */
    protected $_rowsetClass = 'Db_Rowset';

	/**
	 * @var Db_Peer
	 */
	private static $_instance;

	/**
	 * @var array
	 */
	private $_cache;

	/**
	 * @return Db_Peer
	 */
	public static function getInstance()
	{
		if (!self::$_instance) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Avoid bug with join.
	 * @link http://zendframework.ru/forum/index.php?topic=894.0
	 *
     * Returns an instance of a Db_Table_Select object.
     *
     * @param string|array $columns
     * @return Db_Select
     */
    public function select($columns = Db_Select::SQL_WILDCARD)
    {
        $select = new Db_Select($this);
        $select->from($this->_name, $columns, $this->_schema); //optimize columns in query
        return $select;
    }

    /**
     * Construct must be public for extends work.
     * But we can be sure about object is signleton all the same.
     *
     * @return Db_Peer
     */
    public function __construct($options = array())
    {
    	parent::__construct($options);
    }

    /**
     * Fetch row by column name and value.
     *
     * @param string $column
     * @param string $value
     * @return Db_Row
     */
    public function fetchBy($column, $value)
    {
    	$select = $this->select();
    	$select->where($column . ' = ?', $value);
    	$row = $this->fetchRow($select);
    	return $row;
    }

    /**
     * Fetch by key column.
     * Use Db_Select.
     *
     * @return Db_Row
     */
    public function fetchByKey($key)
    {
    	return $this->fetchBy('`key`', $key);
    }
    
    /**
     * Fetch by id column.
     * Use Db_Select.
     *
     * @return Db_Row
     */
    public function fetchById($id)
    {
    	return $this->fetchBy('`id`', $id);
    }

    /**
     * Return class name by table name.
     *
     * @param string $table
     * @return string
     */
    public static function tableNameToClassName($table)
    {
    	$table = str_replace('_', ' ', $table);
    	$table = ucwords($table);
    	$table = str_replace(' ', '', $table);
    	$table .= 'Peer';
    	return $table;
    }

    /**
     * Get string table name.
     *
     * @return string
     */
    public function getName()
    {
    	return $this->_name;
    }


    /**
     * Return count rows in the table.
     *
     * @param Db_Select $where Custom criteria for count rows.
     * @return integer
     */
    public function fetchCount($where = null)
    {
    	if ($where && !$where instanceof Db_Select) {
    		throw new Exception('Where must by a valid Db_Select object');
    	}

    	if (!$where) {
    		$where = $this->select();
    	}

    	$wherePart = $where->getPart(Db_Select::WHERE);

    	$where->reset();
    	$where->setPart(Db_Select::WHERE, $wherePart);
    	$where->from($this, array('count' => 'count(*)'), $this->_schema);

    	$result = $this->fetchAll($where);
    	return $result[0]['count'];
    }

	/**
	 * Return complex table information by full qualified column name
	 *
	 * @param string $column Full quality column name.
	 * @return array
	 */
	private static function _getTable($column)
	{
		$peer = implode('', array_map('ucfirst', explode('_', array_shift(explode('.', $column))))) . 'Peer';

		$tm = call_user_func(array($peer, 'getTableMap'));
		$cm = $tm->getColumn($column);

		return array(
			'peer'   => $peer,
			'table'  => $tm,
			'column' => $cm,
			'get'    => 'get' . $cm->getPhpName(),
		);
	}


	/**
	 * Return string with table name.
	 *
	 * @return string
	 */
	public function getTableName()
	{
		return $this->_name;
	}

	public function findReferenceByColName($colName) {
		foreach ($this->_referenceMap as $reference) {
			if ($reference['columns'] == $colName) {
				return $reference;
			}
		}
		throw new Exception('Invalid column name');
	}

	/**
	 *
	 * @param Db_Rowset $rowset
	 * @param string $colName
	 * @param Zend_Db_Table_Select $select
	 * @return Db_Select
	 */
	public function findParentSelect(Db_Rowset $rowset, $colName, Db_Select $select = null) {
		$colName = (string)$colName;

		$refKeys = array();
		foreach ($rowset as $row) {
			$val = $row->__get($colName);
			if (isset($val)) {
				$refKeys[$val] = true;
			}
		}

		$reference = $this->findReferenceByColName($colName);

		$where = QueryFunctions::in($reference['refColumns'], array_keys($refKeys) );

		$peer = Factory::getObject( $reference['refTableClass'] );

		if ($select === null) {
            $select = $peer->select();
        } else {
            $select->setTable($peer);
        }

		$select->where($where);

		return $select;
	}

	/**
	 *
	 * @param Db_Rowset $rowset
	 * @param string $colName
	 * @param Zend_Db_Table_Select $select
	 * @return Db_Rowset
	 */
	public function findParentRowsetGood(Db_Rowset $rowset, $colName, Zend_Db_Table_Select $select = null) {
		$refKeys = array();
		foreach ($rowset as $row) {
			$val = $row->__get($colName);
			if (isset($val)) {
				$refKeys[$val] = true;
			}
		}

		$reference = $this->findReferenceByColName($colName);

		$where = QueryFunctions::in($reference['refColumns'], array_keys($refKeys) );

		$peer = Factory::getObject( $reference['refTableClass'] );

		if ($select === null) {
            $select = $peer->select();
        } else {
            $select->setTable($peer);
        }

		$select->where($where);

		$parentRowset = $peer->fetchAll($select);
		if ($parentRowset) {
			$peer->setCacheRowset($parentRowset);
		}

		return $parentRowset;
	}

		
	/**
	 * получить зависимые родительские объекты
	 * (очень просто но работает)
	 * 
	 * @param unknown_type $rowset
	 * @param unknown_type $foreignKey
	 */
	public function findParentRowset($rowset, $ruleKey, Zend_Db_Table_Select $select = null, $params = array()) {
		
		//@todo необходимо добавить всякие проверки 
		
		//проходим по всем записям собирая необходимые id
		$colValues = array();
		foreach ($rowset as $row) {
			$val = $row->__get($ruleKey);
			if (!empty($val) && !in_array($val, $colValues)) {
				$colValues[] = $val;
			}
		}
		
		//получаем зависимый класс
		$map = $this->_referenceMap;
		foreach ($map as $reference) {
			if ($reference['columns'] == $ruleKey) {
				$class = $reference['refTableClass'];
				$refColumn = $reference['refColumns'];
				break;
			}
		}

		if (empty($refColumn) || count($colValues) == 0
			|| empty($class) || !class_exists($class)) {
			return false;
		}
		
		//формируем запрос
		$peer = call_user_func($class.'::getInstance');
		if ($select === null) {
            $select = $peer->select();
        } else {
            $select->setTable($peer);
        }
		if (count($colValues) > 1) {
			$select->where('`'.$refColumn.'` IN (?)', $colValues);
		} else {
			$select->where('`'.$refColumn.'` = ?', $colValues);
		}
		
		if(isset($params['cache'])) {
			$cacheTime = Lib::isset_or($params['cache']['time'], self::CACHE_TIME_LIMIT);
			
			$parentRowset = $this->_cacheSelect($select, $peer, $cacheTime);
		}
		else {
			$parentRowset = $peer->fetchAll($select);
		}
		
//		$parentRowset = $peer->fetchAll($select);
		if ($parentRowset) {
			foreach ($parentRowset as $row) {
				$peer->setCache($row);
			}
		}
		
		
		return $parentRowset;
	}
	
	/**
	 * Получить зависимые дочерние элементы
	 * (просто но работает)
	 * 
	 * @param unknown_type $rowset
	 * @param unknown_type $foreignKey
	 */
	public function findDependentRowset($rowset, $ruleKey, Zend_Db_Table_Select $select = null, $params = array()) {
		
		//@todo необходимо добавить всякие проверки
		
		//получаем зависимый класс
		$map = $this->_referenceMap;
		foreach ($map as $reference) {
			if ($reference['columns'] == $ruleKey) {
				//$class = $reference['refTableClass'];
				$refColumn = $reference['refColumns'];
				break;
			}
		}
		
		if (empty($refColumn)) {
			return false;
		}
			
		//проходим по всем записям собирая необходимые id
		$colValues = array();
		foreach ($rowset as $row) {
			$val = $row->__get($refColumn);
			if (!empty($val) && !in_array($val, $colValues)) {
				$colValues[] = $val;
			}
		}
		
		if (count($colValues) == 0) {
			return false;
		}
		
		//формируем запрос
		if ($select === null) {
            $select = $this->select();
        } else {
            $select->setTable($this);
        }
		if (count($colValues) > 1) {
			$select->where('`'.$ruleKey.'` IN (?)', $colValues);
		} else {
			$select->where('`'.$ruleKey.'` = ?', $colValues);
		}
		
		//@todo кешинование пока отключено в виду того что IN вроде шустр
		/*
		if (isset($params['cache']['time'])) {
			$cacheTime = $params['cache']['time'];
		} else {
			$cacheTime = self::CACHE_TIME_LIMIT;
		}
		
		if (!isset($params['cache']['force'])) {
			$dependentRowset = $this->_cacheSelect($select, $this, $cacheTime);
		} else {
			$dependentRowset = $this->fetchAll($select);
		}
		*/
		
		$dependentRowset = $this->fetchAll($select);
		if ($dependentRowset) {
			foreach ($dependentRowset as $row) {
				$this->setCache($row);
			}
		}
		
		return $dependentRowset;
	}
	
	/**
	 * создание индексного массива по необходимому ключу
	 * 
	 * @param rowset $rowset
	 * @param string $preferKey
	 * 
	 * @return array
	 */
	public function normalizeByPreferKey($rowset, $preferKey = 'id', $multi = false) {
		
		$rowsetArray = array();
		if (!empty($rowset)) {
			foreach ($rowset as $row) {
				if (is_object($row)) {
					$key = $row->__get($preferKey);
				} else {
					$key = $row[$preferKey];
				}
				if (!empty($key)) {
					if ($multi) {
						$rowsetArray[$key][] = $row;
					} else {
						$rowsetArray[$key] = $row;
					}
				}
			}
		}
		
		return $rowsetArray;
	}
	
	/**
	 * метод возвращающий массив контент листов
	 * @param DB_Rowset $rowset
	 * @param array $params
	 * 
	 * @return array|boolean
	 */
	public function getContentList($rowset, $params = array()) {
		return false;
	}
	
	/**
	 * работа с кешем запроса
	 * 
	 * @param object $select
	 * @param object $peer
	 * @param integer $cacheTime
	 * @return mixed
	 */
	public function _cacheSelect($select, $peer, $cacheTime = 3600) {
		
		$except = false;
		$cacheslot = new Cache_Slot_Query($select, $cacheTime);
		$data = $cacheslot->load();
		if ($data) {
			//при неудаче работы с объектом из кеша. осуществляем запрос
			//при постоянных ошибках кеш бесполезен :(
			try {
				$contentRowset = $data;
				$contentRowset->setTable($peer);
			} catch (Exception $e) {
				//@todo хотя метод setTable и кидает исключение иногда, но установку имени талицы он делает.
				//поэтому если $except = false; все работает и даже через кеш (но могут быть проблемы в дальнейшей работе с объектом)
				$except = true;
			}
		}
		
		if ($except || !$data) {
			$contentRowset = $peer->fetchAll($select);
			$cacheslot->save($contentRowset);
		}
		
		return $contentRowset;
	}
	
	public function _cacheSelectRow($select, $peer, $cacheTime = 3600) {
		
		$except = false;
		$cacheslot = new Cache_Slot_Query($select, $cacheTime);
		$data = $cacheslot->load();
		if ($data) {
			try {
				$row = $data;
				$row->setTable($peer);
			} catch (Exception $e) {
				$except = true;
			}
		}
		
		if ($except || !$data) {
			$row = $peer->fetchRow($select);
			$cacheslot->save($row);
		}
		
		return $row;
	}
	
	/**
	 * Вычисляет count по переданному $select
	 * @param DB_Select $select
	 * @return int
	 */
	public function count($select){
		$select->count();
        $count = $this->fetchAll($select);
        $count = $count[0]['count'];
        return $count;
	}
}
