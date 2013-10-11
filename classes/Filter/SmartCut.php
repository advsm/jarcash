<?php

class Filter_SmartCut implements Zend_Filter_Interface
{
	/**
	 * 
	 * @var int
	 */
	protected $_length;
	
	/**
	 * 
	 * @var bool
	 */
	protected $_cut;
	
	public function __construct($length, $cut = false) {
		$this->_length = (int)$length;
		$this->_cut = $cut;
	}
	
    /**
     *
     * Cuts the content $value with the defined settings
     *
     * @param  string $value Content to cut
     * @return string The cut content
     */
    public function filter($value)
    {
        return StringFunctions::wordSplit((string)$value, $this->_length, $this->_cut);
    }
}