<?php

class Debug_ControllerPlugin_Exception extends ZFDebug_Controller_Plugin_Debug_Plugin_Exception
{
    /**
     * Debug Bar php error handler
     *
     * @param string $level
     * @param string $message
     * @param string $file
     * @param string $line
     * @return bool
     */
    public static function errorHandler ($level, $message, $file, $line)
    {
        if (! ($level & error_reporting()))
            return false;
        switch ($level) {
            case E_NOTICE:
            case E_USER_NOTICE:
                $type = 'Notice';
                break;
            case E_WARNING:
            case E_USER_WARNING:
                $type = 'Warning';
                break;
            case E_ERROR:
            case E_USER_ERROR:
                $type = 'Fatal Error';
                break;
            default:
                $type = 'Unknown, ' . $level;
                break;
        }

        $stacks = Debug_TraceHelper::getShortStacktrace(debug_backtrace());
        
        self::$errors[] = array(
        	'type' => $type , 
        	'message' => $message , 
        	'file' => $file, 
        	'line' => $line,
        	'trace' => $stacks,
        );
        
        if (ini_get('log_errors'))
            error_log(sprintf("%s: %s in %s on line %d", $type, $message, $file, $line));
        return true;
    }
    
    /**
     * Gets content panel for the Debugbar
     *
     * @return string
     */
    public function getPanel ()
    {
        $response = Zend_Controller_Front::getInstance()->getResponse();
        $errorCount = count(self::$errors);
        if (! $response->isException() && ! $errorCount)
            return '';
        $html = '';

        foreach ($response->getException() as $e) {
            $html .= '<h4>' . get_class($e) . ': ' . $e->getMessage() . '</h4><p>thrown in ' . $e->getFile() . ' on line ' . $e->getLine() . '</p>';
            $html .= '<h4>Call Stack</h4><ol>';
            foreach ($e->getTrace() as $t) {
                $func = $t['function'] . '()';
                if (isset($t['class']))
                    $func = $t['class'] . $t['type'] . $func;
                if (! isset($t['file']))
                    $t['file'] = 'unknown';
                if (! isset($t['line']))
                    $t['line'] = 'n/a';
                $html .= '<li>' . $func . '<br>in ' . str_replace($_SERVER['DOCUMENT_ROOT'], '', $t['file']) . ' on line ' . $t['line'] . '</li>';
            }
            $html .= '</ol>';
        }

        if ($errorCount) {
            $html .= '<h4>Errors</h4><ol>';
            foreach (self::$errors as $error) {
                $html .= '<li class="clickable" onClick="ZFDebug_Collapse(this)">' . sprintf("%s: %s in %s on line %d", $error['type'], $error['message'], str_replace($_SERVER['DOCUMENT_ROOT'], '', $error['file']), $error['line']) . '<br />';
            	
                $html .= "<p style='display:none;'>";
                foreach ($error['trace'] as $trace) {
                	$trace = htmlspecialchars($trace);
                	$html .= " <b>[+] </b> $trace<br />";
            	}
            	$html .= '</p></li>';
            }
            $html .= '</ol>';
        }
        return $html;
    }
}