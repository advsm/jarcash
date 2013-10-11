<?php

class SmsController extends Controller_Site
{
	private $_allowedIps = array('83.137.50.31', '213.248.32.158', '194.67.81.38', '213.219.251.120', '127.0.0.1');
	
	
	public function indexAction() 
	{
		throw new Exception('Нужно заполнять дату (ask Anti)');
		$ip = $_SERVER['REMOTE_ADDR'];
		if (!in_array($ip, $this->_allowedIps)) {
			// redirect to forbidden
		}
		$this->_disableView();
		$params = $this->_getAllParams();
		$text = $params['txt'];
		$msisdn = $params['phone'];
		$smsNumber = $params['sn'];
		
		$split = explode('_', $text);
		$midletId = $split[0];
		$smsNumber = $split[1];

		$m2sRow = Midlet2subaccPeer::getInstance()->find($midletId)->current();
		if (!$m2sRow) {
			echo "sms=Fail";
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
		echo "sms=$smsText";
	}
	
	public function profitAction() 
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
	
	public function goodBillRuAction() 
	{
		$this->_disableView();
		$key = Config::getInstance()->goodbill->key;
		$s = $this->_getParam('s');
		$p = $this->_getParam('p');
		
		if ( $s != md5($p.$key)) {
			die("Wrong key");
		}

		$params = base64_decode($p);
		$list = explode ('&',$params);
		$params = array();
		foreach($list as $item){
			$pair = explode ('=',$item);
			$params[$pair[0]] = urldecode($pair[1]);
		}

		$text = $params['msg'];
		$msisdn = $params['user_id'];
		$shortNumber = $params['num'];
		
		$split = explode(' ', $text);
		$split = explode('_', $split[1]);
		$midletId = $split[0];
		$smsNumber = $split[1];

		$m2sRow = Midlet2subaccPeer::getInstance()->find($midletId)->current();
		if (!$m2sRow) {
			echo "SMS Fail";
			return;
		}
		
		if ($smsNumber == 1) {
			$midletRow = $m2sRow->getMidletRowByMidletId();
			$smsText = $midletRow->getOriginalUrl();
		} else {
			$smsText = Config::getInstance()->midlet->sms2_answer;
		}
		
		$smsNumberRow = SmsNumberPeer::getInstance()->findByNumber($shortNumber)->current();
		
		$statRow = StatisticSmsPeer::getInstance()->createRow();
		$statRow->setMidletId($m2sRow->getMidletId());
		$statRow->setSubaccId($m2sRow->getSubaccId());
		$statRow->setMsisdn($msisdn);
		$statRow->setSmsNumberId($smsNumberRow->getId());
		$statRow->save();
		echo "SMS $smsText";
	}
}
