<?php

class Profile_IndexController extends Controller_Site_Profile
{
	public function preDispatch() 
	{
		parent::preDispatch();
	}
	
	public function indexAction()
	{
		$peer = NewsPeer::getInstance();
		$select = $peer->select();
		$select->where('is_publish = ?', 1);
		$select->order('created desc');
		$select->limit(10);
		$rowset = $peer->fetchAll($select);
		
		$this->view->news = $rowset;
	}
	
	public function editAction() 
	{
		
		if ($this->getRequest()->isPost()) {
			$params = $this->_getAllParams();
			$profileRow = $this->_getProfile();	
			if (isset($params['password'])) {
				if ($params['password'] === $params['repeat_password']) {
					$profileRow->setPassword(Filter_Password::filter($params['password']));
				} else {
					$this->view->errors = array('Пароль' => "Введенные пароли не совпадают");
					return;
				}
			}
			$profileRow->setIcq($params['icq']);
			$profileRow->setLogin($params['login']);
			$profileRow->setWebmoneyNumber($params['webmoney_number']);
			$profileRow->save();
			$this->_redirect("/profile/index/success");
		}		
	}
	
	public function successAction() 
	{
		$this->_disableLayout();
	}
	
}