<?php

abstract class Auth_Adapter_Cookie implements Zend_Auth_Adapter_Interface
{
	
	const COOKIE_NAME = 'myauth';
	/**
	 * Enable cookie auth storage flag.
	 *
	 * @var boolean
	 */
	protected $_remember;

    /**
     * Save auth information in cookie.
     * Only when remember flag is true.
     *
     * @param ProfileRow $profile Object with user information
     * @throws Auth_Exception If authentication cannot be performed
     * @return void
     */
	protected function _saveInCookie($profile) 
	{
		if (!$this->_remember) {
			return ;
		}
		
		$password = $profile->getPassword();
		$identity = $profile->getEmail() . ':' . $password;

		$filter = new Filter_Encrypt_Cookie();
		$encrypted = $filter->encrypt($identity);

    	// Expired in 2 years
	    $expire = strtotime("+2 years");
	    $path = '/';
	    setcookie(self::COOKIE_NAME, $encrypted, $expire, $path);
	}

	/**
	 * Switch enable/disable cookie storage.
	 *
	 * @param boolean $flag
	 * @return void
	 */
	public function setRemember($flag = true)
	{
		$this->_remember = (boolean)$flag;
	}
}