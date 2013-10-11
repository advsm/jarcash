<?php

class Profile_PaymentController extends Controller_Site_Profile 
{
	public function indexAction()
	{
		$peer = ProfilePaymentPeer::getInstance();
		$select = $peer->select();
		
		$profile = $this->_getProfile();
		$select->where('profile_id = ?', $profile->getId());
		$select->order('created desc');
		$rowset = $peer->fetchAll($select);
		
		$this->view->payments = $rowset;
	}
	
	public function requestPaymentAction() 
	{
		$profile = $this->_getProfile();
		try {
			$profile->addPayment();
		} catch (Exception $e) {
			$message = $e->getMessage();
			// display error
		}
		$this->_redirect("/profile/payment");
	}
}