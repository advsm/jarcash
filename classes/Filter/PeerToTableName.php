<?php

class Filter_PeerToTableName implements Zend_Filter_Interface 
{
    /**
     * Trasform Peer name to table name.
     * ------
     * Returns the result of filtering $value
     *
     * @param  mixed $value
     * @throws Zend_Filter_Exception If filtering $value is impossible
     * @return mixed
     */
    public function filter($value)
    {
    	$value[0] = strtolower($value[0]);
    	$value = preg_replace("/Peer$/", '', $value);
    	
    	$filter = new Zend_Filter_Word_CamelCaseToUnderscore();
    	$value = $filter->filter($value);

    	return $value;
    }
}