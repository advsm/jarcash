<?php

class Filter_Encrypt extends Zend_Filter_Encrypt
{
	/**
	 * Flag for decypt value when filter apply.
	 *
	 * @var boolean
	 */
	protected $_decrypt = false;

    /**
     * Sets new encryption options
     *
     * @param  string|Zend_Filter_Encrypt_Interface $options (Optional) Encryption options
     * @return Filter_Encrypt
     */
    public function setAdapter($options = null)
    {
		if (!$options instanceof Zend_Filter_Encrypt_Interface) {
			throw new Zend_Filter_Exception('Adapter for encrypt must implements Zend_Filter_Encrypt_Interface');
		}

		$this->_adapter = $options;
		return $this;
    }
}