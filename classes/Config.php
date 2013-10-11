<?php
/**
 * Singleton system config class.
 *
 * This class is a proxy for Zend_Config. It limits its features.
 */
class Config implements ISingleton
{
	protected $_path = '/config/config.ini';
	
	/**
	 * @return Config
	 */
	public static function getInstance()
	{
		if (!self::$_instance) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}
	
	/**
	 * Loaded configuration.
	 *
	 * @var Config_Ini
	 */
	protected $_config;

	/**
	 * @var Config
	 */
	protected static $_instance;


	protected function __construct()
	{
		// Calculate path to config file.
		$configFile = BASE_DIR . $this->_path;
		
		// Create config by parsing ini file.
		$config = new Config_Ini($configFile, null, true);
		$config->setReadOnly();
		
		// Set config to private var for future access.
		$this->_config = $config;
	}

	/**
	 * Handles parameters reading magically.
	 *
	 * @param string $name  Property name.
	 * @return mixed
	 */
	public function __get($name)
	{
		return $this->_config->__get($name);
	}

	/**
	 * Config modifications is not allowed.
	 * Always throws an exception.
	 *
	 * @param string $name
	 * @param mixed $value
	 * @return void
	 */
	public function __set($name, $value)
	{
		// Multi-level assignment is denied by Zend_Config itself.
		throw new Exception('Config is read-only.');
	}
}
