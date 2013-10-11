<?php

class Filter_Password implements Zend_Filter_Interface
{
    /**
     * Hash profile password.
     * Returns the result of filtering $value
     *
     * @param  mixed $value
     * @throws Zend_Filter_Exception If filtering $value is impossible
     * @return mixed
     */
    public function filter($value)
    {
    	if ($value == '') return $value;
    	$value = base64_encode($value);
    	$value = sha1($value);
    	$value = md5($value);
    	return $value;
    }
}