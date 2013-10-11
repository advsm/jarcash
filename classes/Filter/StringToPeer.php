<?php

class Filter_StringToPeer implements Zend_Filter_Interface 
{
    /**
     * Trasform string to Peer name.
     * ------
     * Returns the result of filtering $value
     *
     * @param  mixed $value
     * @throws Zend_Filter_Exception If filtering $value is impossible
     * @return mixed
     */
    public function filter($value)
    {
    	$value = ucfirst($value);
    	
    	// To camel case
    	if (false !== strpos($value, '_')) {
	    	$filter = new Zend_Filter_Word_UnderscoreToCamelCase();
	    	$value = $filter->filter($value);
    	}
    	
    	$value .= 'Peer';
    	return $value;
    }
}