<?php

/**
 * Fast debug EXIT function.
 * Wrap for Debug::getInstance()->shutdown()
 *
 * @param string $message Exit message.
 * @return void
 */
function d()
{
	$args = func_get_args();
	$debug = Debug::getInstance();
	call_user_func_array(array($debug, 'shutdown'), $args);
	//Debug::getInstance()->shutdown($args);
}

/**
 * Wrap for Zend_Controller_Router_Rewrite::assemble
 * Generates an url given the name of a route.
 *
 * @access public
 *
 * @param  array $urlOptions Options passed to the assemble method of the Route object.
 * @param  mixed $name The name of a Route to use. If null it will use the current Route
 * @param  bool $reset Whether or not to reset the route defaults with those provided
 * @return string Url for the link href attribute.
 */
function u(array $urlOptions = array(), $name = null, $reset = false, $encode = true)
{
	$router = Zend_Controller_Front::getInstance()->getRouter();
	return $router->assemble($urlOptions, $name, $reset, $encode);
}
