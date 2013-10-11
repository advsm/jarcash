<?php

class Debug_ControllerPlugin_Time extends ZFDebug_Controller_Plugin_Debug_Plugin_Time
{
    /**
     * Fix notice with _timer['preDispatch'] and _timer['postDispath']
     * Gets content panel for the Debugbar
     * 
     *
     * @return string
     */
    public function getPanel()
    {
    	$this->_timer['postDispatch'] = isset($this->_timer['postDispatch']) ? 
    		$this->_timer['postDispatch'] : '';
    	$this->_timer['preDispatch'] = isset($this->_timer['preDispatch']) ? 
    		$this->_timer['preDispatch'] : '';
    		
    	return parent::getPanel();
    }
    
    public function __construct()
    {
    	
    }
}