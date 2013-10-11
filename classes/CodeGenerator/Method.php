<?php

class CodeGenerator_Method extends Zend_CodeGenerator_Php_Method
{
    /**
     * Zend_Framework 1.8.3 not set status static for method. Fix it.
     * generate()
     *
     * @return string
     */
    public function generate()
    {
        $output = '    ';

        if (null !== ($docblock = $this->getDocblock())) {
            $docblock->setIndentation('    ');
            $output .= $docblock->generate();
            $output .= '    ';
        }

        if ($this->isAbstract()) {
            $output .= 'abstract ';
        }

        $output .= $this->getVisibility();

        if ($this->isStatic()) {
        	$output .= ' static';
        }

        $output .= ' function ' . $this->getName() . '(';

        $parameters = $this->getParameters();
        if (!empty($parameters)) {
            foreach ($parameters as $parameter) {
                $parameterOuput[] = $parameter->generate();
            }

            $output .= implode(', ', $parameterOuput);
        }

        $output .= ')' . PHP_EOL . '    {' . PHP_EOL;

        if ($this->_body) {
            $output .= '        '
                    .  str_replace(PHP_EOL, PHP_EOL . '        ', trim($this->_body))
                    .  PHP_EOL;
        }

        $output .= '    }' . PHP_EOL;

        return $output;
    }
}