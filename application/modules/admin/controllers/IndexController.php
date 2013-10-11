<?php

class Admin_IndexController extends Controller_Admin
{
	public function indexAction()
	{
		$this->_forward('index', 'crud');
	}
}