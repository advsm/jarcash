<?php

/**
 * Генератор моделей, наследующих Zend_Db_Table and Zend_Db_Table_Row.
 *
 * Генерация происходит по файлу XML в котором должна быть описана структура всей базы данных.
 * Генерит по 2 класса для записи таблицы и для самой таблицы.
 * Например, если у нас есть таблица content, то сгенерятся следующие классы:
 * /models/ContentRow (extends Base_ContentRow) (генерится только первый раз)
 * /models/ContentPeer (extends Base_ContentPeer) (генерится только первый раз)
 * /models/Base/ContentRow (extends Zend_Db_Table_Row_Abstract)
 * /models/Base/ContentPeer (extends Zend_Db_Table_Abstract)
 */
class CodeGenerator_ModelGenerator
{
	/**
	 * Путь до XML файла со схемой базы данных. Относительно BASE_DIR.
	 *
	 * @var string
	 */
	const FILE_SCHEME = '/misc/scheme.xml';

	/**
	 * Базовый класс для всех таблиц, используется в случае,
	 * когда в XML не указан аттрибут basePeer у таблицы.
	 *
	 * @var string
	 */
	const BASE_PEER = 'Db_Peer';

	/**
	 * Базовый класс для всех записей, используется в случае,
	 * когда в XML не указан аттрибут baseRow у таблицы.
	 *
	 * @var string
	 */
	const BASE_ROW = 'Db_Row';

	/**
	 * Путь до папки, куда будут складываться модели, относительно BASE_DIR
	 *
	 * @var string
	 */
	const PATH_COMMON = '/application/models';

	/**
	 * Путь до папки, куда будут складываться базовые модели, относительно BASE_DIR
	 *
	 * @var string
	 */
	const PATH_BASE = '/application/models/Base';

    const ADAPTER_PATH = '/classes/Db';
    
    const ADAPTER_NAME = 'Adapter';
    
	/**
	 * Logger for write process information in the stream.
	 *
	 * @var Zend_Log
	 */
	private $_logger;

	/**
	 * Base method, take scheme and generate all models at one iteration.
	 *
	 * @return void
	 */
	public function run()
	{
		//$content = $this->_getXml();
		$schema = $this->_getSchemaFromDb();
		//$schema = $this->_getSchema($content);
		foreach ($schema as $table) {
			$this->_log('Process table: ' . $table['name']);
			$this->_processTable($table);
		}
		
		$this->_generateAdapterClass($schema);
	}
	
	private function _getSchemaFromDb()
	{
		$adapter = Db::getConnection();
		$tables = $adapter->listTables();
		$peers = array();
		foreach ($tables as $table) {
			if (stripos($table, '_') === 0) {
				continue;
			}
			$stmt = "show create table $table";
			$stmt = $adapter->query($stmt);
			
			$createStatement = $stmt->fetchAll();
			if (isset($createStatement[0]['Create Table'])) {
				$createStrings = explode("\n", $createStatement[0]['Create Table']);
			} else {
				continue;
			}
			
			$peers[$table]['name'] = $table;
			$peers[$table]['className'] = self::_camelCase($table);
			$peers[$table]['basePeer'] = self::BASE_PEER;
			$peers[$table]['baseRow'] = self::BASE_ROW;
			
			
			$describe = $adapter->describeTable($table);
			$references = array();
			foreach ($createStrings as $string) {
				// skipping misc lines
				if ((strpos($string, 'CONSTRAINT') !== false)) {
					preg_match_all('/\`(.+?)\`/is', $string, $matches);
					$matches = $matches[1];
					$references[$matches[1]] = array('ref_table' => $matches[2], 'ref_field' => $matches[3]);
				} else {
					continue; 
				}
			}
			foreach ($describe as $columnName => $metadata) {
				$property = array();
				$property['name'] = $metadata['COLUMN_NAME'];
				$property['type'] = $metadata['DATA_TYPE'];
				if (isset($references[$columnName])) {
					$property['ref_table'] = $references[$columnName]['ref_table'];
					$property['ref_field'] = $references[$columnName]['ref_field'];
					if ($property['ref_table']) {
						$refTable = self::_camelCase($property['ref_table']);
						$byColumn = self::_camelCase($property['name']);
	
						$peers[$table]['referenceMap'][ $refTable . $byColumn ] = array(
				            'columns'           => $property['name'],
				            'refTableClass'     => $refTable . 'Peer',
				            'refColumns'        => $property['ref_field'],
	       				 );
	
	       				 $peers[ $property['ref_table'] ]['dependentTables'][] = array(
	       				 	'dependent' => $peers[$table]['className'] . 'Peer',
	       				 	'byColumn' => $byColumn,
	       				 );
					}
				}
				$peers[$table]['columns'][] = $property;
			}
		}
		
		return $peers;
	}

	/**
	 * Process single table array and generate classes.
	 *
	 * @return void
	 */
	private function _processTable($table)
	{
		$this->_generatePeer($table);
		$this->_generateBasePeer($table);
		$this->_generateRow($table);
		$this->_generateBaseRow($table);
	}

	/**
	 * Parse XML configuration and create an array.
	 *
	 * @param string $content Pure xml content.
	 * @return array
	 */
	private function _getSchema($content)
	{
		$dom = new Zend_Dom_Query();
		$dom->setDocumentXml($content);
		$tables = $dom->query('table');
		$this->_log('Tables found: ' . count($tables));

		$peers = array();
		foreach ($tables as $table) {
			$name = $table->getAttribute('name');
			// Process table main attributes
			$peers[$name]['name'] = $table->getAttribute('name');
			$peers[$name]['className'] = self::_camelCase($peers[$name]['name']);
			$peers[$name]['basePeer'] = ($table->getAttribute('basePeer') ? $table->getAttribute('basePeer') : self::BASE_PEER);
			$peers[$name]['baseRow'] = ($table->getAttribute('baseRow') ? $table->getAttribute('baseRow') : self::BASE_ROW);

			// Process columns
			$columns = $table->getElementsByTagName('field');
			foreach ($columns as $column) {
				$property = array();
				$property['name'] = $column->getAttribute('name');
				$property['type'] = $column->getAttribute('type');
				$property['ref_table'] = $column->getAttribute('ref_table');
				$property['ref_field'] = $column->getAttribute('ref_field');
				if ($property['ref_table']) {
					$refTable = self::_camelCase($property['ref_table']);
					$byColumn = self::_camelCase($property['name']);

					$peers[$name]['referenceMap'][ $refTable . $byColumn ] = array(
			            'columns'           => $property['name'],
			            'refTableClass'     => $refTable . 'Peer',
			            'refColumns'        => $property['ref_field'],
       				 );

       				 $peers[ $property['ref_table'] ]['dependentTables'][] = array(
       				 	'dependent' => $peers[$name]['className'] . 'Peer',
       				 	'byColumn' => $byColumn,
       				 );
				}

				$peers[$name]['columns'][] = $property;
			}
		}

		return $peers;
	}

	/**
	 * Return pure xml content from file.
	 *
	 * @return string
	 */
	private function _getXml()
	{
		$path = BASE_DIR . self::FILE_SCHEME;
		if (!file_exists($path)) {
			throw new Zend_CodeGenerator_Exception('XML file not exists: ' . $path);
		}

		$content = file_get_contents($path);
		$this->_log('XML file readed.');
		return $content;
	}

	/**
	 * Return metadata by table name.
	 *
	 * @param string $table
	 * @return array
	 */
	private function _getMetadata($table)
	{
		try {
			$object = new Zend_Db_Table(array('name' => $table));
			$metadata = $object->info('metadata');
		} catch (Zend_Db_Exception $e) {
			$metadata = array();
		}
		return $metadata;
	}
	/**
	 * Re-generate TablePeer model.
	 *
	 * @param array $data Table array definition
	 * @return void
	 */
	private function _generateBasePeer($data)
	{
		// ---------------------------
		// Generate BasePeer class
		// ---------------------------
		$className = $data['className'] . 'Peer';
		$class = $this->_getClass('Base_' . $className);
		$class->setExtendedClass($data['basePeer']);
		$class->setImplementedInterfaces(array('ISingleton'));

		foreach($data['columns'] as $column) {
			$property = $this->_getProperty(strtoupper($column['name']), $class);
			$property->setConst(true);
			$property->setDefaultValue(sprintf("`%s`.`%s`", $data['name'], $column['name']));
		}

		// setting table name
		$property = $this->_getProperty('_name', $class);
		$property->setDefaultValue($data['name']);
		$property->setVisibility('protected');

		// setting row class
		$property = $this->_getProperty('_rowClass', $class);
		$property->setDefaultValue($data['className'] . 'Row');
		$property->setVisibility('protected');

		// setting dependent tables
		$property = $this->_getProperty('_dependentTables', $class);
		$property->setVisibility('protected');
		$dependentArray = array();
		if (isset($data['dependentTables'])) {
			$dependentArray = array();
			foreach ($data['dependentTables'] as $dTable) {
				$dependentArray[] = $dTable['dependent'];
			}
		}
			
		$property->setDefaultValue($dependentArray);
		
		// setting reference map
		$property = $this->_getProperty('_referenceMap', $class);
		$property->setVisibility('protected');
		$referenceMap = isset($data['referenceMap']) ? $data['referenceMap'] : array();
		$property->setDefaultValue($referenceMap);
		
		// setting primary key
		/*$property = $this->_getProperty('_primary', $class);
		$property->setDefaultValue('id');
		$property->setVisibility('protected');*/

		// setting instance
		$property = $this->_getProperty('_instance', $class);
		$property->setVisibility('private');
		$property->setStatic(true);


		// setting metadata
		$metadata = $this->_getMetadata($data['name']);
		//$string = Debug_TraceHelper::getVarAsString($metadata);
		$property = $this->_getProperty('_metadata', $class);
		$property->setVisibility('protected');
		$property->setDefaultValue($metadata);
		
		// ----------------------

		// creating method getInstance
		$method = $this->_getMethod('getInstance', $class);
		$docblock = new Zend_CodeGenerator_Php_Docblock();
		$docblock->setTag(array('name' => 'return', 'description' => $data['className'] . 'Peer'));
		$method->setDocblock($docblock);

		$method->setVisibility('public');
		$method->setStatic(true);
		$body = 'if (!self::$_instance) {' . PHP_EOL
			. '	self::$_instance = new ' . $data['className'] . 'Peer();' . PHP_EOL
			. '}' . PHP_EOL
			. 'return self::$_instance;';
		$method->setBody($body);

		//creating findBy{Field} methods
		foreach ($data['columns'] as $column) {
			$col = str_ireplace(' ', '', ucwords(str_ireplace('_', ' ', $column['name'])));
			
			$method = $this->_getMethod("findBy$col", $class);
			
			$docblock = new Zend_CodeGenerator_Php_Docblock();
			$docblock->setTag(array('name' => 'return', 'description' => 'Db_Rowset'));
			$method->setDocblock($docblock);
			
			$param = new Zend_CodeGenerator_Php_Parameter();
			$paramName = $column['name'];
			$param->setName($paramName);
			$method->setParameter($param);
			
			$method->setVisibility('public');
			
			$methodBody = '$select = $this->select();' . PHP_EOL
				. "\$select->where('`{$paramName}` = ?', \$$paramName);" . PHP_EOL
				. '$rowset = $this->fetchAll($select);' . PHP_EOL
				. 'return $rowset;';
			$method->setBody($methodBody);
		}

		$file = new Zend_CodeGenerator_Php_File(array('classes' => array($class)));
		$path = BASE_DIR . self::PATH_BASE . '/' . $className . '.php';
		$file->setFilename($path);
		$file->write();

		$this->_log($path . ' generated');
	}

	/**
	 * Re-generate TableRow model.
	 *
	 * @param array $data Table array definition
	 * @return void
	 */
	private function _generateBaseRow($data)
	{
		// ---------------------------
		// Generation of Row class
		// ---------------------------
		$className = $data['className'] . 'Row';
		$class = $this->_getClass('Base_' . $className);
		$class->setExtendedClass($data['baseRow']);

		// creating methods set and get
		foreach ($data['columns'] as $column) {
			$columnTableName = $column['name'];
			// creating method set
			$columnName = self::_camelCase($columnTableName);

			$method = $this->_getMethod('set' . $columnName, $class);
			$docblock = new Zend_CodeGenerator_Php_Docblock();
			$docblock->setShortDescription("Set new value for {$data['name']}.{$column['name']} column in current Row.");
			$docblock->setTag(array('name' => 'param', 'description' => $column['type'] . " \${$columnName}From{$className}"));
			$docblock->setTag(array('name' => 'return', 'description' => 'void'));
			$method->setDocblock($docblock);

			$method->setVisibility('public');
			$method->setParameter(array('name' => $columnName));
			$body = '$this->__set("' . $columnTableName . '", $' . $columnName . ');';
			$method->setBody($body);

			// creating method get
			$method = $this->_getMethod('get' . $columnName, $class);
			$docblock = new Zend_CodeGenerator_Php_Docblock();
			$docblock->setShortDescription("Return {$data['name']}.{$column['name']} column value in current Row.");
			$docblock->setTag(array('name' => 'return', 'description' => $column['type']));
			$method->setDocblock($docblock);

			$method->setVisibility('public');
			$body = 'return $this->__get("' . $columnTableName . '");';
			$method->setBody($body);

			// Creating get parent method
			if (isset($column['ref_table'])) {
				$refTable = self::_camelCase($column['ref_table']);

				$method = $this->_getMethod('get' . $refTable . 'RowBy' . $columnName, $class);
				$docblock = new Zend_CodeGenerator_Php_Docblock();

				$docblock->setShortDescription("Return parent row from table {$column['ref_table']} where {$data['name']}.{$column['name']} = {$column['ref_table']}.{$column['ref_field']}");
				$docblock->setTag(array('name' => 'param', 'description' => 'Db_Select $selectFrom' . $refTable));
				$docblock->setTag(array('name' => 'return', 'description' => $refTable . 'Row'));
				$method->setDocblock($docblock);

				$param = new Zend_CodeGenerator_Php_Parameter(array('name' => 'select', 'defaultValue' => null));
				$method->setParameter($param);
				$method->setVisibility('public');

				$body = "return \$this->findParentRow('{$refTable}Peer', null, \$select);";
				$method->setBody($body);
			}
		}

		if (isset($data['dependentTables'])) {
			foreach ($data['dependentTables'] as $dependentTable) {
				$depTable = str_replace('Peer', '', $dependentTable['dependent']);
				// Get dependent Rowset method
				$method = $this->_getMethod('get' . $depTable . 'RowsetBy' . $dependentTable['byColumn'], $class);

				$docblock = new Zend_CodeGenerator_Php_Docblock();
				$docblock->setShortDescription("Return dependent rowset from table {$depTable} where {$depTable}.{$dependentTable['byColumn']} reference to {$data['name']} table");
				$docblock->setTag(array('name' => 'param', 'description' => 'Db_Select $select From' . $depTable));
				$docblock->setTag(array('name' => 'return', 'description' => 'Zend_Db_Table_Rowset_Abstract'));
				$method->setDocblock($docblock);

				$method->setVisibility('public');
				$param = new Zend_CodeGenerator_Php_Parameter(array('name' => 'select', 'defaultValue' => null));
				$method->setParameter($param);
				$body = "return \$this->findDependentRowset('{$dependentTable['dependent']}', null, \$select);";
				$method->setBody($body);
			}
		}
		

		/** create many2many methods by Crud_* functionally **/
		$crudTable = new Crud_Db_Table($data['className']);
		$m2ms = $crudTable->getMany2ManyTables();
		foreach ($m2ms as $m2m) {
			$column = $m2m->getFKColumnNotFor($crudTable);
			$table3rd = $column->getFKTable();
			$table3rd = get_class($table3rd->getTable());
			$table3rd = str_replace('Peer', '', $table3rd);

			$m2mTable = get_class($m2m->getTable());
			$m2mTable = str_replace('Peer', '', $m2mTable);


			$method = $this->_getMethod('get' . $table3rd . 'RowsetBy' . $m2mTable, $class);

			$docblock = new Zend_CodeGenerator_Php_Docblock();
			$docblock->setShortDescription("Return many2many rowset from table {$table3rd} via {$m2mTable}.{$column->getName()}");
			$docblock->setTag(array('name' => 'param', 'description' => 'Db_Select $select From ' . $table3rd));
			$docblock->setTag(array('name' => 'return', 'description' => 'Zend_Db_Table_Rowset_Abstract'));
			$method->setDocblock($docblock);

			$method->setVisibility('public');
			$param = new Zend_CodeGenerator_Php_Parameter(array('name' => 'select', 'defaultValue' => null));
			$method->setParameter($param);
			$body = "return \$this->findManyToManyRowset({$table3rd}Peer::getInstance(), {$m2mTable}Peer::getInstance(), null, null, \$select);";
			$method->setBody($body);
		}

		$file = new Zend_CodeGenerator_Php_File(array('classes' => array($class)));
		$path = BASE_DIR . self::PATH_BASE . '/' . $className . '.php';
		$file->setFilename($path);
		$file->write();

		$this->_log($path . ' generated');
	}

	/**
	 * Check for existing and generate blank TablePeer file.
	 *
	 * @param array Table array definition
	 * @return void
	 */
	private function _generatePeer($table)
	{
		$this->_generateCommon($table, 'Peer');
	}

	/**
	 * Check for existing and generate blank TableRow file.
	 *
	 * @param array Table array definition
	 * @return void
	 */
	private function _generateRow($table)
	{
		$this->_generateCommon($table, 'Row');
	}

	/**
	 * Generate common classes. Generate only if no exists.
	 *
	 * @param array $table Table array definition
	 * @param string $suffix Extends class.
	 * @return void
	 */
	private function _generateCommon($table, $suffix)
	{
		$className = $table['className'] . $suffix;
		$path = BASE_DIR . self::PATH_COMMON . '/' . $className . '.php';

		if ($this->isFileExists($path)) {
			// File was generated before. Skip.
			$this->_log($path . ' was generated before. Skip.');
			return;
		}

		// Create new php file
		$file = new Zend_CodeGenerator_Php_File();
		$file->setFilename($path);
		$file->setRequiredFiles(array("Base/$className.php"));

		// Create new class and put in into file
		$class = $this->_getClass($className);
		$class->setExtendedClass('Base_' . $className);
		if (isset($table['comment'])) {
			$class->getDocblock()->setLongDescription("Table comment:" . PHP_EOL . $table['comment']);
		}
		$file->setClass($class);

		$generatedContent = $file->generate();
		$file->write($generatedContent);

		$this->_log($path . " generated");
	}

	/**
	 * Check for file really exists at path.
	 *
	 * @return boolean
	 */
	private function isFileExists($path)
	{
		return file_exists($path);
	}

	/**
	 * Create new Class
	 *
	 * @param string $name OPTIONAL for set class name
	 * @return Zend_CodeGenerator_Php_Class
	 */
	private function _getClass($name = null)
	{
		$class = new Zend_CodeGenerator_Php_Class();
		if ($name) {
			$class->setName($name);
		}

		// Set docblock for class
		$docBlock = new Zend_CodeGenerator_Php_Docblock();
		$docBlock->setShortDescription("Generated Model class.");
		$class->setDocblock($docBlock);

		return $class;
	}

	/**
	 * Create new method
	 *
	 * @param string $name OPTIONAL for set method name
	 * @param Zend_CodeGenerator_Php_Class OPTIONAL $class for set method
	 * @return Zend_CodeGenerator_Php_Method
	 */
	private function _getMethod($name = '', $class = null)
	{
		$method = new Zend_CodeGenerator_Php_Method();
		if ($name) {
			$method->setName($name);
		}

		if ($class instanceof Zend_CodeGenerator_Php_Class) {
			$class->setMethod($method);
		}

		return $method;
	}

	/**
	 * Create new property
	 *
	 * @param string $name OPTIONAL for set property name
	 * @param Zend_CodeGenerator_Php_Class OPTIONAL $class for set property
	 * @return Zend_CodeGenerator_Php_Property
	 */
	private function _getProperty($name = '', $class = null)
	{
		$property = new Zend_CodeGenerator_Php_Property();
		if ($name) {
			$property->setName($name);
		}

		if ($class instanceof Zend_CodeGenerator_Php_Class) {
			$class->setProperty($property);
		}

		return $property;
	}

	/**
	 * Get logger for write process information.
	 *
	 * @return Zend_Log
	 */
	private function _getLogger()
	{
		if ($this->_logger instanceof Zend_Log) {
			return $this->_logger;
		}

		$logger = new Zend_Log();

		// Create Writer stream
		$writer = new Zend_Log_Writer_Stream('php://output');
		$logger->addWriter($writer);

		// Create format for Zend_Log
		$format = '%priorityName% : %message%' . PHP_EOL;
		$formatter = new Zend_Log_Formatter_Simple($format);

		// Set writer format
		$writer->setFormatter($formatter);

		$this->_logger = $logger;
		return $this->_logger;
	}

	/**
	 * Wrap for _getLogger->log('message', Zend_Log::INFO);
	 *
	 * @return void
	 */
	private function _log($message)
	{
		$this->_getLogger()->log($message, Zend_Log::INFO);
	}

	/**
	 * Set string to camel case. Also remove "_"
	 * @return string
	 */
	private static function _camelCase($string)
	{
		$string = str_replace('_', ' ', $string);
		$string = ucwords($string);
		$string = str_replace(' ', '', $string);
		return $string;
	}
	
    private function _generateAdapterClass($schema)
    {
        $className = self::ADAPTER_NAME;
        $class = $this->_getClass('Db_' . $className);
        $adapter = Config::getInstance()->codegenerator->extended_adapter;
        $adapterClass = 'Zend_Db_Adapter_' . $adapter;
        if (class_exists($adapterClass)) {
            $class->setExtendedClass($adapterClass);
        }
        
        foreach ($schema as $table) {
            // generate getter method for peer
            $peerName = $table['className'] . 'Peer';
            $methodName = 'get' . $peerName;
            $method = $this->_getMethod($methodName, $class);
            $docblock = new Zend_CodeGenerator_Php_Docblock();

            $docblock->setShortDescription("Gets the instance of $peerName");
            $docblock->setTag(array('name' => 'return', 'description' => $peerName));
            $method->setDocblock($docblock);

            $body = "return $peerName::getInstance();";
            $method->setBody($body);
            
        }
        
        $file = new Zend_CodeGenerator_Php_File(array('classes' => array($class)));
        $path = BASE_DIR . self::ADAPTER_PATH . '/' . 
$className . '.php';
        $file->setFilename($path);
        $file->write();
        
    }

}
