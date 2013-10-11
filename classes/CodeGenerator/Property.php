<?php

class CodeGenerator_Property extends Zend_CodeGenerator_Php_Property
{
    /**
     * Zend Framework 1.8.3 do not set STATIC status for property. Fix it.
     * generate()
     *
     * @return string
     */
    public function generate()
    {
        $name         = $this->getName();
        $defaultValue = $this->getDefaultValue();
        if ($this->isConst()) {
            $string = '    ' . 'const ' . $name . ' = \'' . $defaultValue . '\';';
        } else {
        	if (substr($defaultValue, 0, 5) !== 'array') {
        		$defaultValue = "'$defaultValue'";
        	}
            $string = '    ' . $this->getVisibility()
            	. ($this->isStatic() ? ' static' : '')
            	. ' $' . $name . ' = ' . ((null !== $defaultValue) ? $defaultValue : 'null') . ';';
        }
        return $string;
    }
}