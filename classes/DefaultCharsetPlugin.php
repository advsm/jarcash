<?php

class DefaultCharsetPlugin extends Zend_Controller_Plugin_Abstract
{
    public function dispatchLoopShutdown()
    {
        $response = $this->getResponse();
    	$headers = $response->getHeaders();
		$contentType = null;
		foreach ($headers as $h) {
			if (strtolower($h['name']) == 'content-type') {
				$contentType = $h['value'];
			}
		}
		if (!$contentType) {
			$contentType = "text/html";
		}
		if (!preg_match('/;\s+charset=/s', $contentType)) {
			$charset = Config::getInstance()->default->charset;
			$contentType .= "; charset={$charset}";
		}        
        $response->setHeader("Content-Type", $contentType, true);
    }
}