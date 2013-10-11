<?php

abstract class Filter_Encrypt_Environment_Abstract implements Zend_Filter_Encrypt_Interface
{
	const SEPARATOR = '___';

    /**
     * Cut crypt local variable from $value and throw exception if it different than local.
     * Decrypts $value with the defined settings
     *
     * @param  string $value Data to decrypt
     * @return string The decrypted data
     */
    public function decrypt($value)
    {
    	$matches = array();
    	$separator = self::SEPARATOR;
    	$regexp = "/(.+)$separator(.+)/";
		preg_match($regexp, $value, $matches);

		$identity = isset($matches[1]) ? $matches[1] : null;
		$variable = isset($matches[2]) ? trim($matches[2]) : null;

		if ($variable != $this->_getLocal()) {
			setcookie('auth', "");
			// throw new Filter_Encrypt_Environment_Exception('Cant decode value. Environment variable different with stored.');
		}

		return $identity;
    }

    /**
     * Encrypts $value with subnet value. Cant decrypt with different REMOTE_ADDR.
     * Encrypts $value with the defined settings
     *
     * @param  string $value Data to encrypt
     * @return string The encrypted data
     */
    public function encrypt($value)
    {
		$local = $this->_getLocal();
		$encrypted = $value . self::SEPARATOR . $local;
		return $encrypted;
    }

    /**
     * Return local variable value for encrypt and decrypt with it.
     *
     * @return string
     */
    abstract protected function _getLocal();
}