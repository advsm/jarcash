<?php

class Filter_Encrypt_Environment_Subnet extends Filter_Encrypt_Environment_Abstract implements Zend_Filter_Encrypt_Interface
{
    /**
     * Return subnet value by REMOTE_ADDR.
     * Return local variable value for encrypt and decrypt with it.
     *
     * @return string
     */
    protected function _getLocal()
    {
		$matches = array();
		preg_match('/[0-9]{1,3}\.[0-9]{1,3}/', $_SERVER['REMOTE_ADDR'], $matches);
		$subnet = current($matches);
		return $subnet;
    }
}