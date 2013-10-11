<?php

require_once 'Base/ProfileRow.php';

/**
 * Generated Model class.
 */
class ProfileRow extends Base_ProfileRow
{
	public function addPayment() 
	{
		$date = date("Y-m-d");
		$statusRow = PaymentStatusPeer::getInstance()->fetchByKey('in_progress');
		$wmz = $this->getWebmoneyNumber();


		$adapter = Db::getConnection();
		try {
			$walletRow = $this->getProfileWalletRowByWalletId();
			$sum = $walletRow->getAmount();
			
			$adapter->beginTransaction();
			$row = ProfilePaymentPeer::getInstance()->createRow();
			$row->setProfileId($this->getId());
			$row->setAmount($sum);
			$row->setStatusId($statusRow->getId());
			$row->setDestination($wmz);
			$row->save();
			
			$walletRow->setAmount(0);
			$walletRow->save();
			$adapter->commit();
		} catch (Exception $e) {
			$adapter->rollBack();
			throw new Exception("Произошла ошибка при создании платежа. Попробуйте позже");	
		}
		
	}
	

}

