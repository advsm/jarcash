<?php
/**
 * Extends ZFDebug plugin for view console even body is empty.
 */
class Debug_ControllerPlugin extends ZFDebug_Controller_Plugin_Debug
{
	/**
     * Returns html header for the Debug Bar
     *
     * @return string
     */
    protected function _headerOutput() {
    	$content = parent::_headerOutput();
    	$content .= '
    	<script type="text/javascript">
    	
 		function ZFDebug_Collapse(element) {
	    	jQuery(element).find("p:first").toggle();
	    }

    	</script>
    	';
    	
    	return $content;
    }
    /**
     * Appends Debug Bar html output to the original page
     *
     * @param string $html
     * @return void
     */
    protected function _output($html)
    {
        $response = $this->getResponse();
        $body = $response->getBody();
        
        // Try to put headers into <head> section
        $header = $this->_headerOutput();
        
        $pattern = '/(<\/head>)/i';
        if (preg_match($pattern, $body)) {
        	$body = preg_replace($pattern, $header . '$1', $body);
        } else {
        	// If head tag not exists put header to end of file
        	$body .= $header;
        }
        
        // Try to put body html before close body
        $html = "<div id='ZFDebug_debug'>$html</div>";
        if (stripos($body, '</body>') !== false) {
        	$body = str_ireplace('</body>', $html . '</body>', $body);
        } else {
        	// If close body tag not exists put console content to end of file
        	$body .= $html;
        }
        
        $response->setBody($body);
    }
}