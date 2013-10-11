<?php

require_once dirname(__FILE__) . '/../classes/Bootstrap.php';

try {
	// Get front controller instance
	$front = Zend_Controller_Front::getInstance();
	// Set modular structure directories
	$front->addModuleDirectory(BASE_DIR . '/application/modules');
	
	// Set front controller router
	$path = BASE_DIR . '/config/routes.ini';
	$routes = new Config_ini($path);
	
	$router = new Zend_Controller_Router_Rewrite();
	$router->addConfig($routes);
	$front->setRouter($router);
	
	$dispatcher = $front->getDispatcher();
	$request = $front->getRequest();
	
	// Register controller plugins
	$front->registerPlugin(new Controller_Plugin_DefaultCharset());
	$front->registerPlugin(new Controller_Plugin_FormParser());

	// Init Zend_Layout
	$layout = Zend_Layout::startMvc();
	
	// Init View Renderer
	// Form /admin/* use Zend_View, for other project use Dwoo
	$renderer = new Zend_Controller_Action_Helper_ViewRenderer();
	Zend_Controller_Action_HelperBroker::addHelper($renderer);
	
	if (preg_match('~^\/admin~i', $_SERVER['REQUEST_URI'])) {
		$view = new View();
	} else {
        $view = new DwooView(array(
			'engine' => array(
				'compileDir' => BASE_DIR . '/tmp/dwoo_templates', // calls the $dwoo->setCompileDir() method
				'cacheDir'   => BASE_DIR . '/tmp/dwoo_cache', // calls the $dwoo->setCacheDir() method
            ),
            'compiler' => array(
                  'autoEscape' => true, // calls $compiler->setAutoEscape()
            )
 		));
 		
        $renderer->setViewSuffix('tpl');
        $layout->setViewSuffix('tpl');
	}
	
	$renderer->setView($view);

	// Switch off error handler plugin
	//$front->setParam('noErrorHandler', true);
	// Throw exceptions in dispatch loop
	$front->throwExceptions(true);

	// Set return response flag
	$front->returnResponse(true);
	
	// Create request object
	$request = new Request();
	
	// Dispatch request
	$response = $front->dispatch($request);
	// Output response
	$response->sendResponse();
} catch (Exception $e) {
	// Show exception
	require 'ErrorLowlevel.php';
}
