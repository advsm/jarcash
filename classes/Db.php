<?php

class Db implements ISingleton
{
	/**
	 * Database default adapter
	 * @var array of Zend_Db_Adapter_Abstract
	 */
	private static $_adapter;

	/**
	 * @var Db
	 */
	private static $_instance;

	/**
	 * @var array
	 */
	private $_lastQuery;

	/**
	 * Disallow cloning
	 */
	private function __clone() {
		throw new Exception('Clone is not allowed.');
	}

	/**
	 * @return Db
	 */
	private function __construct()
	{
		$dbConnections = Config::getInstance()->db;
		foreach ($dbConnections as $connection) {
			if ($connection->enabled) {
				$connections[] = $connection;
			}
		}
		self::$_adapter = Zend_Db::factory($connections[rand(0,count($connections)-1)]);
		Zend_Db_Table_Abstract::setDefaultAdapter(self::$_adapter);
	}

	/**
	 * @return Db
	 */
	public static function getInstance()
	{
		if (!self::$_instance) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Return adapter from config.ini
	 *
	 * @return Zend_Db_Adapter_Pdo_Mysql
	 */
	public static function getConnection()
	{
		return self::getAdapter();
	}

	
	private static function getAdapter() 
	{
		if (!self::$_adapter) {
			self::getInstance();
		}
		
		return self::$_adapter;
	}

	/**
	 * Set last query as string (for debugging)
	 *
	 * @param array $query
	 * @return void
	 */
	public function setLastQuery($query)
	{
		$this->_lastQuery = $query;
	}

	/**
	 * Return last query as string
	 *
	 * @return array ('query' => Query as string, 'params' => Query params)
	 */
	public function getLastQuery()
	{
		return $this->_lastQuery;
	}

}