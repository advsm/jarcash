<?php

class DwooView extends Dwoo_Adapters_ZendFramework_View
{
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