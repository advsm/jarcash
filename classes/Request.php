<?php

class Request extends Zend_Controller_Request_Http
{
	/**
	 * HTTP_HOST
	 * 
	 * @var string
	 */
	protected $_hostname = null;
	
	/**
	 * Is Ajax request ?
	 * 
	 * @var boolean
	 */
	protected $_isAjax = null;
	
	/**
	 * Return HTTP_HOST
	 * 
	 * @return string
	 */
	public function getHostname()
	{
		if (!is_null($this->_hostname)) {
			return $this->_hostname;
		}
		
		$this->_hostname = $_SERVER['HTTP_HOST'];
		return $this->_hostname;
	}
	
	/**
	 * Is Ajax request ?
	 * 
	 * @return boolean
	 */
	public function isAjax()
	{
		if (!is_null($this->_isAjax)) {
			return !!$this->_isAjax;
		}
		
		$this->_isAjax = $this->isXmlHttpRequest();
		return $this->_isAjax;
	}
	
}