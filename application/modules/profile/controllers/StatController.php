<?php

class Profile_StatController extends Controller_Site_Profile 
{
	public function indexAction()
	{
		$profile = $this->_getProfile();
		
		$select = VwStatSubaccDailyPeer::getInstance()->select();
		$select->where('profile_id = ?', $profile->getId());
		$rowset = VwStatSubaccDailyPeer::getInstance()->fetchAll($select);
		$this->view->rowset = $rowset;
		
		$midlets = $profile->getMidletRowsetByProfileId();
		$ids = array();
		foreach ($midlets as $midlet) {
			$ids[] = $midlet->getId(); 
		}
		if ($ids) {
			$ids = implode(", ", $ids);
			$select = VwStatMidletDailyPeer::getInstance()->select();
			$select->where("`midlet_id` in ($ids)");
			$rowset = VwStatMidletDailyPeer::getInstance()->fetchAll($select); 
		} else {
			$rowset = array();
		}

		$this->view->midletRowset = $rowset;
	}
	
}