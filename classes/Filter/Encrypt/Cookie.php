<?php

class Filter_Encrypt_Cookie implements Zend_Filter_Encrypt_Interface
{
    /**
     * Encrypts $value with the defined settings
     *
     * @param  string $value Data to encrypt
     * @return string The encrypted data
     */
    public function encrypt($value)
    {
		$chain = new Zend_Filter();

		$subnet = new Filter_Encrypt(new Filter_Encrypt_Environment_Subnet());
		$chain->addFilter($subnet);

		$userAgent = new Filter_Encrypt(new Filter_Encrypt_Environment_UserAgent());
		$chain->addFilter($userAgent);

		$options = Config::getInstance()->crypt;
		$crypt = new Zend_Filter_Encrypt($options->toArray());
		$chain->addFilter($crypt);

		$filtered = $chain->filter($value);
		return base64_encode($filtered);
    }

    /**
     * Decrypts $value with the defined settings
     *
     * @param  string $value Data to decrypt
     * @return string The decrypted data
     */
    public function decrypt($value)
    {
    	$value = base64_decode($value);

		$options = Config::getInstance()->crypt;
		$crypt = new Zend_Filter_Decrypt($options->toArray());
		$chain = new Zend_Filter();
		$chain->addFilter($crypt);

		$userAgent = new Filter_Decrypt(new Filter_Encrypt_Environment_UserAgent());
		$chain->addFilter($userAgent);

		$subnet = new Filter_Decrypt(new Filter_Encrypt_Environment_Subnet());
		$chain->addFilter($subnet);

		$filtered = $chain->filter($value);
		$filtered = trim($filtered);
		return $filtered;
    }
}