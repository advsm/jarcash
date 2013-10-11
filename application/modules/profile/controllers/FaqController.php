<?php 

class Profile_FaqController extends Controller_Site_Profile
{
	public function indexAction()
	{
		$peer = FaqPeer::getInstance();
		$select = $peer->select();
		$select->where('is_publish = ?', 1);
		$select->order('ord desc');
		$rowset = $peer->fetchAll($select);
		
		$this->view->faq = $rowset;
	}
}