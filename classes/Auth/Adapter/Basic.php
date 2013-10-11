<?php

class Auth_Adapter_Basic extends Auth_Adapter_Cookie implements Zend_Auth_Adapter_Interface
{
	const COLUMN_USERNAME = 'email';
	const COLUMN_PASSWORD = 'password';
	
	/**
	 * Username from User table for auth
	 *
	 * @var string
	 */
	protected $_username;

	/**
	 * Password from Profile table for auth
	 *
	 * @var string
	 */
	protected $_password;

	protected $_pass_is_hash;
	
	protected $_forceLogin;
	
	/**
     * Sets username and password for authentication
     *
     * @param string $username Email, login or phone
     * @param string $password Unhashed password
     * @return void
     */
    public function __construct($username, $password, $params = array())
    {
        $this->_username = $username;
        $this->_password = $password;
    	if (isset($params['pass_is_hash']) && $params['pass_is_hash']) {
        	$this->_pass_is_hash = true;
        } else {
        	$this->_pass_is_hash = false;
        }
   		 if (isset($params['force']) && $params['force']) {
        	$this->_forceLogin = true;
        } else {
        	$this->_forceLogin = false;
        }
        
    }

	/**
     * Performs an authentication attempt
     *
     * @throws Zend_Auth_Adapter_Exception If authentication cannot be performed
     * @return Zend_Auth_Result
     */
    public function authenticate()
    {
    	$code = Zend_Auth_Result::FAILURE;
    	$identity = null;
    	
    	$userName = trim($this->_username);
    	$password = $this->_password;
    	//проверяем на пустоты в параметрах
    	if (empty($userName) || empty($password)) {
    		return new Zend_Auth_Result($code, null, array());
    	}
    	
    	$peer = ProfilePeer::getInstance();
		$select = $peer->select();
		
		$condColumn = ProfilePeer::EMAIL;
		$select->where($condColumn .'= ?', $this->_username);
	    $profileRow = $peer->fetchRow($select);
    	if ($profileRow) {
			/**
			 * @todo Вова сказал что Exception кидать плохо. А мне нравится... Оставляю здесь пометку на случай возможных споров.
			 */
			if ($profileRow->getActivated() != 1) {
				return new Zend_Auth_Result(Zend_Auth_Result::FAILURE, null, array());
			}
    		$basePasswd = $profileRow->getPassword();
    		$givenPassword = Filter_Password::filter($password);
    		//проверям правильность паролей
    		if ($basePasswd === $givenPassword) {
    			$code = Zend_Auth_Result::SUCCESS;
    		}
    		if ($this->_forceLogin) {
    			$code = Zend_Auth_Result::SUCCESS; 
    		}
    		
    	} else {
    		$code = Zend_Auth_Result::FAILURE_IDENTITY_NOT_FOUND;
    	}
    	
    	if (Zend_Auth_Result::SUCCESS == $code) {
    		$identity = $this->getIdentityByProfile($profileRow);
			$this->_saveInCookie($profileRow);
    	}
	    
    	return new Zend_Auth_Result($code, $identity, array());
    }
    
    public static function getIdentityByProfile(ProfileRow $row) {
    	return $row->getId();
    }
}