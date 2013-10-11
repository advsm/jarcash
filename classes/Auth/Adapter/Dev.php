<?php

class Auth_Adapter_Dev extends Auth_Adapter_Cookie implements Zend_Auth_Adapter_Interface {
	
	const DEV_AUTH = 'dev_auth';
	/**
	 * Username from User table for auth
	 *
	 * @var string
	 */
	private $_username;

	/**
	 * Password from User table for auth
	 *
	 * @var string
	 */
	private $_password;

	private $_max_try = 0;
	/**
     * Sets username and password for authentication
     *
     * @param string $username, login
     * @param string Unhashed password
     * @return void
     */
    public function __construct($username, $password, $params = array())
    {
        $this->_username = $username ? $username : null;
        $this->_password = $password ? $password : null;
        $this->_max_try = isset($params['max_try']) ? $params['max_try'] : 0;
    }

    /**
     * Performs an authentication attempt
     *
     * @throws Zend_Auth_Adapter_Exception If authentication cannot be performed
     * @return Zend_Auth_Result
     */
    public function authenticate() {
    	
        $code = Zend_Auth_Result::FAILURE;
    	$identity = null;
    	$config = Config::getInstance();
    	
    	$login = trim($this->_username);
    	$password = $this->_password;
    	
    	//проверяем на пустоты в параметрах
    	if (empty($login) || empty($password)) {
    		return new Zend_Auth_Result($login, null, array());
    	}
    	
    	$peer = DevAuthPeer::getInstance();
		$select = $peer->select();
		$select->where(DevAuthPeer::LOGIN.' = ?', $login);
		$rowDevAuth = $peer->fetchRow($select);
    	
    	//проверка пароля на уровне проекта, обычный sha1 без мудрений
    	if ($rowDevAuth instanceof Db_Row) {
    		
    		//первышение лимита. не пускаем но считаем..
			if ((empty($this->_max_try) || $rowDevAuth->getTryCount() <= $this->_max_try) 
				&& $rowDevAuth->getPassword() == $peer->encryptSha1Password($password)) {
	    			$countTry = 0;
	    			$code = Zend_Auth_Result::SUCCESS;
    		} else {
    			$countTry = $rowDevAuth->getTryCount() + 1;
    		}
    		$rowDevAuth->setTryCount($countTry);
    		$rowDevAuth->save();
    	}
    	
    	if (Zend_Auth_Result::SUCCESS == $code) {
    		$identity = $rowDevAuth;
    		$devAuth = $rowDevAuth->toArray();
    		unset($devAuth['password']);
    		OmletSession::set(self::DEV_AUTH, $devAuth); //сохраняем в сессию факт удачного логина

    	}
    	
    	return new Zend_Auth_Result($code, $identity, array());
    }
}