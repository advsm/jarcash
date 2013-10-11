<?php
/**
 * This file has to be included in every PHP script to initialize
 * the execution environment.
 */
class Bootstrap
{
	/**
	 * @var PHP_Exceptionizer
	 */
	private $_exceptionizer;

	public function execute()
	{
		// Initialize library directories.
		$root = dirname(dirname(__FILE__));
		define('BASE_DIR', $root);
		
		set_include_path(implode(PATH_SEPARATOR, array(
			$root . '/library',
			$root . '/application/models',
			$root . '/classes',
			$root . '/classes/FunctionLibrary',
			$root . '/application/services',
			$root . '/application/criteria',
			$root . '/application/objects'
		)));

		require_once 'Autoload.php';
		require_once 'Shortcuts.php';
		
		Config::getInstance();
		Debug::getInstance();
		Db::getInstance();
		Db::getConnection();
		$this->_initIni();
		$this->_initZFDebug();
		$this->_initPHPExceptionizer();
		$this->_initDKlabHackerConsole();
		$this->_initTimezone();
	}

	public function _initTimezone() {
		date_default_timezone_set( Config::getInstance()->default->timezone );
	}

	/**
	 * Initialize php.ini settings
	 *
	 * @return void
	 */
	private function _initIni()
	{
		$phpSettings = Config::getInstance()->php;
		if (!$phpSettings) {
			return ;
		}

		$phpSettings = $phpSettings->toArray();
		foreach ($phpSettings as $key => $value) {
			if (is_array($value)) {
				foreach ($value as $k => $v) {
					ini_set($key . '.' . $k, $v);
				}
			} else {
				ini_set($key, $value);
			}
		}
	}

	/**
	 * Initialize PHP Exceptionizer
	 *
	 * @return void
	 */
	private function _initPHPExceptionizer()
	{
		$this->_exceptionizer = new PHP_Exceptionizer(E_ALL);
	}

	/**
	 * Initialize DKLabHackerConsole
	 *
	 * @return void
	 */
	private function _initDKlabHackerConsole()
	{
		return ;
	}
	
	/**
	 * Turn on ZFDebug on basic application with debug mode
	 *
	 * @return
	 */
	private function _initZFDebug()
	{
		// Do not init in production mode
		if (!Debug::getInstance()->isDebugMode()) {
			return;
		}
		error_reporting(E_ALL);
		// Detect ajax-mode and not use ZFDebug
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])
			&& $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
			$this->_initFirePhp();
			return ;
		}

		// Dont use ZFDebug in CLI Application
		if (empty($_SERVER['DOCUMENT_ROOT'])) {
			return ;
		}

		$options = array(
			'jquery_path' => 'http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js',
		    'plugins' => array(
		    	'Variables',
		        //'Html',
		        'Memory',
				//'Time',
		        //'Registry',
		        //'Cache' => array('backend' => Cache_Manager::getInstance()->getCleanBackend()),
			)
		);

		$debug = new Debug_ControllerPlugin($options);

		// Register custom error handler plugin
		$exception = new Debug_ControllerPlugin_Exception();
		$debug->registerPlugin($exception);

		// Get Db adapter
		$adapter = Db::getConnection();
		// In Debug mode we storage all statement
		$adapter->setStatementClass('Db_Statement');

		// Register custom db logger plugin
		$db = new Debug_ControllerPlugin_Database(array($adapter));
		$debug->registerPlugin($db);

		// Register custom file plugin
		//$file = new Debug_ControllerPlugin_File(array('base_path' => BASE_DIR));
		//$debug->registerPlugin($file);

		// Register custom time plugin
		// Tempolary disable. Work strange.
		// $time = new Debug_ControllerPlugin_Time();
		// $debug->registerPlugin($time);

		// Register debug plugin in FrontController
		$frontController = Zend_Controller_Front::getInstance();
		$frontController->registerPlugin($debug);
	}

	private function _initFirePhp() {
		$profiler = new Zend_Db_Profiler_Firebug('All DB Queries');
		$profiler->setEnabled(true);
		$db = Db::getInstance()->getConnection();
		$db->setProfiler($profiler);
	}
}

$boostrap = new Bootstrap();
$boostrap->execute();
