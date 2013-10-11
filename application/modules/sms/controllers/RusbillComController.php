<?php

class Sms_RusbillComController extends Controller_Action 
{
	public function indexAction()
	{
		// /sms/rusbill-com?from=792077453XX&date=2011-04-04%2012%3A53%3A44&msg=410%2Bjarcash%2028_1&cost=71.25&operator=&operator_id=10&short_number=5111&sms_id=&sign=d8578edf8458ce06fbc5bb76a58c5ca4
		
		$this->_disableView();
		
		$from = $this->_getParam('from');
		$message = $this->_getParam('msg');
		$shortNumber = $this->_getParam('short_number', 0);
		
		$select = SmsNumberPeer::getInstance()->select();
		$select->where('number = ?', $shortNumber);
		$smsNumberRow = SmsNumberPeer::getInstance()->fetchRow($select);
		$cost = $this->_getParam('cost');
		
		// Dont processed
		$date = $this->_getParam('date');
		$operator = $this->_getParam('operator');

		$smsId = $this->_getParam('sms_id');
		$processedSign = md5($smsId . 'qwerty');
		$sign = $this->_getParam('sign');
		if ($sign != $processedSign) {
			throw new Zend_Controller_Action_Exception("Ошибка подписи, $sign vs $processedSign");
		}
		
		if (!$smsNumberRow) {
			throw new Zend_Controller_Exception('Переданного короткого номера нет в БД: ' . $shortNumber);
		}
			
		$message = preg_replace('/.+\s/is', '', $message);
		$message = trim($message);
		
		$smsNumber = substr($message, -1);
		$message = substr($message, 0, -1);
		$message = preg_replace('/[^0-9]/s', '', $message);
		//$message = explode('_', $message);
		$midlet2subaccId = $message;
		$midlet2subacc = Midlet2subaccPeer::getInstance()->find($midlet2subaccId)->current();
		if (!$midlet2subacc) {
			throw new Zend_Controller_Exception('Неверный код пришел в СМС, ID: ' . $smsId);
		}
		
		if ($smsNumber == 1) {
			$midletRow = $midlet2subacc->getMidletRowByMidletId();
			$smsText = $midletRow->getOriginalUrl();
		} else {
			$smsText = Config::getInstance()->midlet->sms2_answer;
		}

		$response = "ok\n"
			. $smsText;		
		
		$statRow = StatisticSmsPeer::getInstance()->createRow();
		$statRow->setMidletId($midlet2subacc->getMidletId());
		$statRow->setSubaccId($midlet2subacc->getSubaccId());
		$statRow->setMsisdn($from);
		$statRow->setDate(date('Y-m-d'));
		$statRow->setSmsNumberId($smsNumberRow->getId());
		$statRow->setCost($cost);
		$statRow->setRequest($_SERVER['REQUEST_URI']);
		$statRow->setResponse($response);
		if ($smsId != '1debug') {
			$statRow->save();
		}
		
		echo $response;
	}
}
