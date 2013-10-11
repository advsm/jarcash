<?php

class Controller_Plugin_FormParser extends Zend_Controller_Plugin_Abstract
{
	public function dispatchLoopShutdown()
	{
		if (!$this->getRequest()->isXmlHttpRequest()) {
			// Set HTML_MetaForm and HTML_FormPersister handlers
			$semiParser = new HTML_SemiParser();
			$formPersister = new HTML_FormPersister();
			$semiParser->addObject($formPersister);
			
			// Process content
			$response = $this->getResponse();
			foreach ((array) $response->getBody(true) as $name => $content) {
				$response->setBody($semiParser->process($content), $name);
			}
		}
	}
}