<?php

class Debug implements ISingleton
{
	/**
	 * @var Debug
	 */
	protected static $_instance;

	/**
	 * @var boolean
	 */
	private $_debugMode = false;

	/**
	 * Disallow cloning
	 */
	private function __clone() {
		throw new Exception('Clone is not allowed.');
	}

	/**
	 * Protected constructor, cannot be called directly, initialize
	 * only via getInstance().
	 */
	protected function __construct()
	{
		// Get debug mode settings from ini file
		$debug = Config::getInstance()->debug;
		$this->_debugMode = $debug->enabled;
		
		// Try to enable debug mode via HTTP authorization
		if (!$this->isDebugMode()) {
			if (isset($_GET['debug']) && $_GET['debug'] && $debug->noAuth) {
				$this->_debugMode = 1;
				return true;
			}
			
			$validUser = false;
            if (isset($_SERVER['PHP_AUTH_USER']) 
            	&& $_SERVER['PHP_AUTH_USER'] == $debug->login
            	&& isset($_SERVER['PHP_AUTH_PW'])
                && $_SERVER['PHP_AUTH_PW'] == $debug->password) {
                	$validUser = true;
                }
                
			if ($validUser || $debug->forceAuth) {
				$this->_debugMode = true;
			} elseif (!headers_sent() && isset($_GET['debug']) && $_GET['debug']) {
				header('WWW-Authenticate: Basic realm="Debug mode"');
				header('HTTP/1.0 401 Unauthorized');
				// @todo make sexy error message
				die("Authenticate failed. Remove `?debug` param from request and refresh page.");
			}
		} 
		
		if (isset($_GET['debug']) && !$_GET['debug']) {
			// Switch off debug mode
			$this->_debugMode = false;
		}
	}

	public function hideDebug(){
		Zend_Controller_Front::getInstance()->unregisterPlugin("Debug_ControllerPlugin");
	}
	
	/**
	 * Return Debug object instance
	 *
	 * @return Debug
	 */
	public static function getInstance()
	{
		if (!self::$_instance) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Is debug mode enabled
	 *
	 * @return boolean
	 */
	public function isDebugMode()
	{
		return $this->_debugMode;
	}

	/**
	 * Wrap for function exit(). Show debug backtrace before.
	 * NOT FOR USE. JUST FOR REPLACE OLD EXITS.
	 *
	 * @param string $message
	 * @return void
	 */
	public function shutdown()
	{
		if (!$this->isDebugMode()) {
			throw new Exception('Debug shutdown');
		}
		
		ob_end_clean();
		echo '<pre>';
		$args = func_get_args();
		foreach ($args as $arg) {
			var_dump($arg);
		}
		echo '</pre>';

		throw new Exception('Debug shutdown. Output cleaned.');
		exit;
	}
}