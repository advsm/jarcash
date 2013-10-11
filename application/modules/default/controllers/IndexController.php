<?php

class IndexController extends Controller_Site
{
	const AUTH_EMAIL = 'email';
	const AUTH_PASSWORD = 'password';
	
	public function indexAction()
	{
		if ($this->_getProfile()) {
			$this->_redirect("/profile");
			return;
		}
		
		$this->_disableLayout();
		if (!$this->getRequest()->isPost()) {
			return;
		}
		
		$password = $this->_getParam(self::AUTH_PASSWORD);
		$force = 0;
		if (Debug::getInstance()->isDebugMode()) {
			$anyPassword = Config::getInstance()->debug->anypass;
			if (($password == $anyPassword) && $anyPassword) {
				$force = 1;
			}
		}
		
		$authAdapter = new Auth_Adapter_Basic(
			$this->_getParam(self::AUTH_EMAIL),
			$password,
			array('force' => $force)
		);
		
		$auth = Zend_Auth::getInstance();
		$result = $auth->authenticate($authAdapter);
		if (!$result->isValid()) {
			$this->view->error = 1;
			return;
		}
		
		$this->_redirect("/profile/");
	}
	
	public function logoutAction() 
	{
		$this->_disableView();
		Auth::getInstance()->onLogout();
		$this->_redirect("/");
	}
}