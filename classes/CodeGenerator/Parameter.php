<?php

class CodeGenerator_Parameter extends Zend_CodeGenerator_Php_Parameter
{
    /**
     * generate()
     *
     * @return string
     */
    public function generate()
    {
        $output = '';

        if ($this->_type) {
            $output .= $this->_type . ' ';
        }

        $output .= '$' . $this->_name;

        if ($this->_defaultValue) {
            $output .= ' = ';
            if ($this->_defaultValue == 'null') {
                $output .= 'null';
            } else if (is_string($this->_defaultValue)) {
                $output .= '\'' . $this->_defaultValue . '\'';
            } else {
            	$output .= $this->_defaultValue;
            }
        }

        return $output;
    }
}