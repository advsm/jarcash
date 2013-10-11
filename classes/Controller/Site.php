<?php

class Controller_Site extends Controller_Action 
{
	public function preDispatch() 
	{
		parent::preDispatch();
	}
	
	/**
	 * @return ProfileRow
	 */
	protected function _getProfile() {
		$profile = Auth::getInstance()->getProfile();
		return $profile;
	}
}
