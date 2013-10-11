<?php

class Debug_ControllerPlugin_Variables extends ZFDebug_Controller_Plugin_Debug_Plugin_Variables
{
    /**
     * Gets content panel for the Debugbar
     *
     * @return string
     */
    public function getPanel()
    {
        $this->_request = Zend_Controller_Front::getInstance()->getRequest();
        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');
        $viewVars = $viewRenderer->view->getVars();
        $vars = '';
        if ($this->_request->isPost())
        {
            $vars .= '<h4>$_POST</h4>'
                   . '<div id="ZFDebug_post">' . $this->_cleanData($this->_request->getPost()) . '</div>';
        }
        
        if (isset($_SESSION)) {
        	$vars .= '<h4>$_SESSION</h4>'
				. '<div id="ZFDebug_cookie">' . $this->_cleanData($_SESSION) . '</div>';
        }

        $vars .= '<h4>$_COOKIE</h4>'
               . '<div id="ZFDebug_cookie">' . $this->_cleanData($this->_request->getCookie()) . '</div>'
               . '<h4>Request</h4>'
               . '<div id="ZFDebug_requests">' . $this->_cleanData($this->_request->getParams()) . '</div>'
               . '<h4>View vars</h4>'
               . '<div id="ZFDebug_vars">' . $this->_cleanData($viewVars) . '</div>';
        return $vars;
    }
}