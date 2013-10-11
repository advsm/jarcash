<?php

class List_Review extends ContentListElement 
{
	private $date;
	private $text;
	/**
	 * @return unknown
	 */
	public function getDate() {
		return $this->date;
	}
	
	/**
	 * @return unknown
	 */
	public function getText() {
		return $this->text;
	}
	
	/**
	 * @param unknown_type $date
	 */
	public function setDate($date) {
		$this->date = $date;
	}
	
	/**
	 * @param unknown_type $text
	 */
	public function setText($text) {
		$this->text = $text;
	}

}