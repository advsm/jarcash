<?php

class Controller_Site_Profile extends Controller_Site
{
	public function preDispatch() 
	{
		parent::preDispatch();
		$profile = $this->_getProfile();
		if (!$profile instanceof ProfileRow ) {
			$this->_redirect("/");
		}
		
		$this->_initMenu();
	}
	
	protected function _initMenu()
	{
		$menu = array(
			'index' => array('name' => 'Новости', 'width' => 105),
			'stat' => array('name' => 'Статистика', 'width' => 150),
			'midlet' => array('name' => 'Мидлеты', 'width' => 110),
			'payment' => array('name' => 'Выплаты', 'width' => 110),
			'ticket' => array('name' => 'Обратная связь', 'width' => 160),
			'top' => array('name' => 'Топ', 'width' => 80),
		);
		
		foreach ($menu as $controller => &$values) {
			if ($controller == $this->_getParam('controller')) {
				$values['active'] = 1;
			}
		}
		
		$this->view->menu = $menu;
		
	}
}