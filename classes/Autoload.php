<?php

class Autoload
{
	public static function _autoload($className)
	{
		return require_once str_replace('_', '/', $className) . '.php';

	}

	public static function shutdown()
	{

	}
}

spl_autoload_register(array('Autoload', '_autoload'));
register_shutdown_function(array('Autoload', 'shutdown'));