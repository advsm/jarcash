<?php

class Filter_Encrypt_Environment_UserAgent extends Filter_Encrypt_Environment_Abstract implements Zend_Filter_Encrypt_Interface
{
    /**
     * Return subnet value by REMOTE_ADDR.
     * Return local variable value for encrypt and decrypt with it.
     *
     * @return string
     */
    protected function _getLocal()
    {
    	$userAgent = preg_replace('/[0-9]/', '', $_SERVER['HTTP_USER_AGENT']);
    	return $userAgent;
    }
}