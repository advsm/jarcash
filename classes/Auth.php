<?php

class Auth extends Zend_Auth implements ISingleton
{
	/**
	 * Authenticate cookie name.
	 *
	 * @var string
	 */
	const COOKIE_NAME = 'myauth';
	const PASSPORT_SESSION = 'passport_session';
	const COOKIE_SIGN = 'sign';
	
	const SPLITTER = ':';
	
    /**
     * @var Auth
     */
    protected static $_instance = null;

    /**
     * Current authenticate profile row.
     *
     * @var ProfileRow
     */
	protected $_currentProfile;

    /**
     * @return Auth
     */
    protected function __construct() {}

    /**
     * Returns an instance of Auth
     *
     * Singleton pattern implementation
     *
     * @return Auth Provides a fluent interface
     */
    public static function getInstance()
    {
        if (null === self::$_instance) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    /**
     * Return current loginned Profile object
     *
     * @return ProfileRow
     * @throws Auth_Exception
     */
    public function getProfile()
    {
    	if ($this->_currentProfile instanceof ProfileRow) {
    		return $this->_currentProfile;
    	}

    	// Get identity from session
    	$identity = $this->getIdentity();
    	if (!$identity) {
    		// If identity not exists we try to set identity with cookie
    		$result = $this->_getProfileByCookie();
    		if (!$result) {
    			return null;
    		}

    		$identity = $this->getIdentity();
    	}
		
    	$currentProfile = ProfilePeer::getInstance()->find($identity)->current();
    	if (!$currentProfile) {
    		Auth::clearIdentity();
    		throw new Auth_Exception('Profile not found');
    	}

    	$this->_currentProfile = $currentProfile;
    	return $this->_currentProfile;
    }

    /**
     * Try to Auth user by cookie value.
     *
     * @return ProfileRow
     * @throws Auth_Exception
     */
    protected function _getProfileByCookie()
    {
    	// If cookie not exists return
		if (!isset($_COOKIE[self::COOKIE_NAME]) || !$cookie = $_COOKIE[self::COOKIE_NAME]) {
			return null;
		}

		// Dectypt cookie value for get identity
		try {
			$filter = new Filter_Encrypt_Cookie();
			$identity = $filter->decrypt($cookie);
		} catch (Auth_Exception $e) {
			$this->onLogout();
			return false;
		}

		// Explode identity for check login and password
		$identity = explode(':', $identity);
    	$username = $identity[0];
    	$password = $identity[1];

    	$result = $this->AuthByLoginAndHash($username, $password);
    	return $result->isValid();
    }

    /**
     * Clear identity and cookie.
     *
     * @return void
     */
    public function onLogout()
    {
    	$this->clearIdentity();
    	setcookie(self::COOKIE_NAME, null, null, '/');
    	setcookie(self::COOKIE_SIGN, null, null, '/');
    	//@todo для чего эти куки?? в каком проекте?
 		setcookie('lingck', 1, time()+8600000000, '/');
 		setcookie("is18", "", time() - 3600, '/');
    }
    
    /**
     * удостоверимся в том что это действительно наш пользователь а не воришка куков
     * @param object $profile
     * 
     * @return boolean
     */
    public function checkSign($profile) {

		if (!isset($_COOKIE[self::COOKIE_SIGN]) ||
			 empty($_COOKIE[self::COOKIE_SIGN]) || 
			!$profile instanceof ProfileRow) {
			return null;
		}

		$cookie = $_COOKIE[self::COOKIE_SIGN];
		// расшифровываем подпись в куке
		try {
			$filter = new Filter_Encrypt_Cookie();
			$identity = $filter->decrypt($cookie);
		} catch (Auth_Exception $e) {
			return false;
		}

		// получаем имя пользователя и пароль
		$identity = explode(self::SPLITTER, $identity);
    	$username = $identity[0];
    	$password = $identity[1];
    	
    	if ($profile->getName() == $username && $profile->getPasswd() == $password) {
    		return true;
    	}
    	
    	return false;
    }
    
    public function AuthByLoginAndHash($username, $password, $remember = false) {
    	$adapter = new Auth_Adapter_Basic($username, $password, null, array('pass_is_hash' => true));
    	$adapter->setRemember($remember);
    	return $this->authenticate($adapter);
    }
  
    /**
     * авторизация пользователя по профилю (ИСПОЛЬЗОВАТЬ ОСТОРОЖНО)
     * @param $row
     */
    public function authByProfile(ProfileRow $row) {
    	$this->getStorage()->clear();
    	$this->getStorage()->write(Auth_Adapter_Basic::getIdentityByProfile($row));
    }
}