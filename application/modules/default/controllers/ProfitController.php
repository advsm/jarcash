<?php

class ProfitController extends Controller_Action 
{
	
	
	public function indexAction() 
	{
		$id = $this->_getParam('id');
		$key = $this->_getParam('key');
		$pk = Config::getInstance()->profitbill->key;
		if ($key !== md5($pk . $id)) {
			die('hacking attempt');
		}
		
		$this->_disableView();
		$params = $this->_getAllParams();
		$text = $params['message'];
		$msisdn = $params['from'];
		$smsNumber = $params['short_number'];
		
		$split = explode('_', $text);
		$midletId = $split[0];
		$smsNumber = $split[1];

		$m2sRow = Midlet2subaccPeer::getInstance()->find($midletId)->current();
		if (!$m2sRow) {
			echo "reply \n Fail";
			return;
		}
		
		
		if ($smsNumber == 1) {
			$midletRow = $m2sRow->getMidletRowByMidletId();
			$smsText = $midletRow->getOriginalUrl();
		} else {
			$smsText = Config::getInstance()->midlet->sms2_answer;
		}
		
		$statRow = StatisticSmsPeer::getInstance()->createRow();
		$statRow->setMidletId($m2sRow->getMidletId());
		$statRow->setSubaccId($m2sRow->getSubaccId());
		$statRow->setMsisdn($msisdn);
		$statRow->setSmsNumber($smsNumber);
		$statRow->save();
		echo "reply \n $smsText";
	}
}