<?php

class Db_Select extends Zend_Db_Table_Select
{
    const SQL_ASC           = ' ASC';
    const SQL_DESC          = ' DESC';
    const SQL_EQUAL         = ' = ?';
    const SQL_NOT_EQUAL     = ' != ?';
    const SQL_GREATER_EQUAL = ' >= ?';
    const SQL_LESS_EQUAL    = ' <= ?';
    const SQL_IN            = ' IN (?)';
    const SQL_NOT_IN        = ' NOT IN (?)';
    const SQL_ISNULL        = ' IS NULL';
    const SQL_ISNOTNULL     = ' IS NOT NULL';


	/**
	 * Needed to check if count mode is already on
	 *
	 * @var string
	 */
	protected $_isCount;

    /**
	 * Set part of sql query manually.
	 * Handle with care!
	 *
	 * @param string $key from $this->_parts
	 * @param array $value
	 * @return void
	 */

 	public function setPart($key, $value)
	{
		$this->_parts[$key] = $value;
	}

	/**
	 * Use only count(*) as columns list for this query anywhere.
	 *
	 * @return void
	 */
	public function count()
	{
		$this->reset('limitcount');
		$this->reset('limitoffset');
		$this->reset('order');
		$this->reset('group');
		$this->_isCount = !$this->_isCount;
		
	}

    /**
     * Converts this object to an SQL SELECT string.
     *
     * @return string This object as a SELECT string.
     */
    public function assemble()
    {
//    	if (Debug::getInstance()->isDebugMode()) {
//	   	    $from = $this->getPart(self::FROM);
//    		$indexes = array();
//    		foreach ($from as $table => $cond) {
//    			echo $table;
//    			$arr = Db::getConnection()->fetchAll("show indexes from `$table`");
//    			foreach ($arr as $index) {
//    				$indexes[$table][] = $index['Column_name'];
//    			}
//    		}    		
//    		
//    		$where = $this->getPart(self::WHERE);
//    		foreach ($where as $cond) {
//    			preg_match('/\`.+\`\.\`(.+)\`/is', $cond, $matches);
//    			$whereColumns[] = $matches[1];
//    			//d($matches);
//    		}
//
//	   		
//    		
//    	}
		if ($this->_isCount) {
			$this->reset('columns');
			if ($this->_parts[self::DISTINCT]) {
				$from = $this->getPart(self::FROM);
				foreach ($from as $cond) {
					if ($cond['joinCondition'] == null) {
						$fromTable = $cond['tableName'];
						break;
					}
				}

				$this->columns(array('count' => "count(distinct `$fromTable`.`id`)"));
			} else {
				$this->columns(array('count' => 'count(*)'));
			}
		}

    	return parent::assemble();
    }

    /**
     * Adds a row order to the query.
     *
     * @param mixed $spec The column(s) and direction to order by.
     * @return Zend_Db_Select This Zend_Db_Select object.
     */
    public function order($spec)
    {
    	if (preg_match('/^`[a-z\_]+\`\.\`[a-z\_]+\`\s+(ASC|DESC)$/i', $spec)) {
    		$spec = str_replace('`', '', $spec);
    		$spec = new Zend_Db_Expr($spec);
    	}

    	return parent::order($spec);
    }

    /**
     * Wrap for function where. Build condition just by column name.
     *
     * ---
     *
     * Adds a WHERE condition to the query by AND.
     *
     * If a value is passed as the second param, it will be quoted
     * and replaced into the condition wherever a question-mark
     * appears. Array values are quoted and comma-separated.
     *
     * <code>
     * // simplest but non-secure
     * $select->where("id = $id");
     *
     * // secure (ID is quoted but matched anyway)
     * $select->where('id = ?', $id);
     *
     * // alternatively, with named binding
     * $select->where('id = :id');
     * </code>
     *
     * Note that it is more correct to use named bindings in your
     * queries for values other than strings. When you use named
     * bindings, don't forget to pass the values when actually
     * making a query:
     *
     * <code>
     * $db->fetchAll($select, array('id' => 5));
     * </code>
     *
     * @param string   $cond  The WHERE condition.
     * @param string   $value OPTIONAL A single value to quote into the condition.
     * @param constant $type  OPTIONAL The type of the given value
     * @return Zend_Db_Select This Zend_Db_Select object.
     */
    public function where($cond, $value = null, $type = null)
    {
		$cond = $this->_buildCondition($cond, $value);
    	parent::where($cond, $value, $type);
        return $this;
    }

    /**
     * Wrap for function where. Build condition just by column name.
     *
     * ---
     *
     * Adds a WHERE condition to the query by OR.
     *
     * Otherwise identical to where().
     *
     * @param string   $cond  The WHERE condition.
     * @param string   $value OPTIONAL A single value to quote into the condition.
     * @param constant $type  OPTIONAL The type of the given value
     * @return Zend_Db_Select This Zend_Db_Select object.
     *
     * @see where()
     */
    public function orWhere($cond, $value = null, $type = null)
    {
		$cond = $this->_buildCondition($cond, $value);
    	parent::orWhere($cond, $value, $type);
        return $this;
    }

    /**
     * Build condition for easy select syntax.
     *
     * @param unknown_type $cond
     * @param unknown_type $value
     * @return unknown
     */
    private function _buildCondition($cond, $value)
    {
        // If condition just string - try to build full condition by column name
    	if (!is_string($cond)) {
    		return $cond;
    	}

    	// If condition is only column name
    	if (!preg_match('/^\`[a-z0-9_]+\`\.\`[a-z0-9_]+\`$/', $cond)) {
    		return $cond;
    	}

    	if ($value === null) {
    		$cond = $cond . self::SQL_ISNULL;
    	} else {
			$cond = $cond . self::SQL_EQUAL;
    	}

    	return $cond;
    }

}