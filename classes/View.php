<?php

class View extends Zend_View
{
	/**
     * Escapes a value for output in a view script.
     *
     * If escaping mechanism is one of htmlspecialchars or htmlentities, uses
     * {@link $_encoding} setting.
     *
     * @param mixed $var The output to escape.
     * @return mixed The escaped value.
     */
    public function escape($var)
    {
    	if (is_array($var)) {
    		if (count($var) > 1) {
    			return $var;
    		}
    		
    		$var = current($var);
    	}
    	
    	return parent::escape($var);
    }
	
    /**
     * Do not use 'script' path for render templates.
     * Also set layout path.
     * =====
     * Given a base path, add script, helper, and filter paths relative to it
     *
     * Assumes a directory structure of:
     * <code>
     * basePath/
     *     scripts/
     *     helpers/
     *     filters/
     * </code>
     *
     * @param  string $path
     * @param  string $prefix Prefix to use for helper and filter paths
     * @return Zend_View_Abstract
     */
    public function addBasePath($path, $classPrefix = 'Zend_View')
	{
		parent::setBasePath($path, $classPrefix);
		$paths = $this->getScriptPaths();
		if (count($paths) != 1) {
			return $this;
		}
		
		$path = $paths[0];
		if (substr($path, -8) == 'scripts/') {
			$path = substr($path, 0, -8);
			$this->setScriptPath(null);
		}
		
		$layouts = BASE_DIR . '/application/layouts';
		$this->addScriptPath($layouts);
		$this->addScriptPath($path);
		
		return $this;
	}
	
	
}