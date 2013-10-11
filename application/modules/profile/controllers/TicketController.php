<?php

class Profile_TicketController extends Controller_Site_Profile 
{
	public function preDispatch() 
	{
		parent::preDispatch();
	}
	
	public function indexAction() 
	{
		$profileRow = $this->_getProfile();
		$ticketRowset = $profileRow->getTicketRowsetByProfileId();
		$tickets = $ticketRowset->toArray();
		foreach ($tickets as &$ticket) {
			$ticket['status'] = TicketStatusPeer::getInstance()->find($ticket['status_id'])->current();
		}
		$this->view->tickets = $tickets;
	}
	
	public function createAction() 
	{
		if ($this->getRequest()->isPost()) {
			$params = $this->_getAllParams();
			$profileRow = $this->_getProfile();

			if (!isset($params['topic']) || !$params['topic']) {
				$this->view->errors = array('Тема' => "Тема тикета пуста");
				return;
			} else {
				$params['topic']= htmlentities(strip_tags($params['topic']));
			}
			
			if (!isset($params['text']) || !$params['text']) {
				$this->view->errors = array('Текст' => "Текст тикета пуст");
				return;
			} else {
				$params['text']= htmlentities(strip_tags($params['text']));
			}
			
			$statusRow = TicketStatusPeer::getInstance()->findByKey('new')->current();
			$row = TicketPeer::getInstance()->createRow();
			$row->setText($params['text']);
			$row->setTopic($params['topic']);
			$row->setProfileId($profileRow->getId());
			$row->setStatusId($statusRow->getId());
			$row->save();			
			$this->_redirect("/profile/ticket");
		}		
	}
	
	public function viewAction() 
	{
		$ticketId = $this->_getParam('id');
		$ticketRow = TicketPeer::getInstance()->find($ticketId)->current();
		$profileRow = $this->_getProfile();
		if (!$ticketRow || $ticketRow->getProfileId() != $profileRow->getId()) {
			
		}
		$ticketMessages = $ticketRow->getTicketMessageRowsetByTicketId();
		$messages = $ticketMessages->toArray();
		foreach ($messages as &$message) {
			$message['from'] = ProfilePeer::getInstance()->find($message['from_profile_id'])->current();
			$message['to'] = ProfilePeer::getInstance()->find($message['to_profile_id'])->current();
		}
		$this->view->ticket = $ticketRow;
		$this->view->messages = $messages;
	}
	
	public function sendMessageAction() 
	{
		if ($this->getRequest()->isPost()) {
			$params = $this->_getAllParams();
			$profileRow = $this->_getProfile();
			$ticketId = $params['ticket_id'];
			$ticketRow = TicketPeer::getInstance()->find($ticketId)->current();
			if (!$ticketRow) {
				$this->view->errors = array('Тикет' => "Тикета с указанным id не существует");
				$this->_redirect("/profile/ticket/view/id/{$ticketId}");
			}
			if ($ticketRow->getProfileId() != $profileRow->getId()) {
				$this->view->errors = array('Тикет' => "Вы не являетесь создателем данного тикета и не можете оставлять в нем сообщения");
				$this->_redirect("/profile/ticket/view/id/{$ticketId}");
			}
			if (!isset($params['message']) || !$params['message']) {
				$this->view->errors = array('Сообщения' => "Текст сообщения пуст");
				$this->_redirect("/profile/ticket/view/id/{$ticketId}");
			} else {
				$params['message']= htmlentities(strip_tags($params['message']));
			}
			$supportProfile = ProfilePeer::getInstance()->findByLogin('Tech Support')->current();			
			$row = TicketMessagePeer::getInstance()->createRow();
			$row->setText($params['message']);
			$row->setFromProfileId($profileRow->getId());
			$row->setToProfileId($supportProfile->getId());
			$row->setTicketId($ticketId);
			$row->save();			
			$this->_redirect("/profile/ticket/view/id/{$ticketId}");
		}		
	}
}