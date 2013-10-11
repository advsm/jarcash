<?php

class Paginator
{
	private $_countPageAll;
	private $_countPageForShow;
	private $_currentPage;
	private $_first = array();
	private $_elements = array();
	private $_last = array();

	public function setCurrentPage($newValue)
	{
		$this->_currentPage = $newValue;
		$this->_make();
	}

	public function getCurrentPage()
	{
		return $this->_currentPage;
	}

	public function setCountPageAll($newValue)
	{
		$this->_currentPage = $newValue;
		$this->_make();
	}

	public function getCountPageAll()
	{
		return $this->_countPageAll;
	}

	public function setCountPageForShow($newValue)
	{
		$this->_currentPage = $newValue;
		$this->_make();
	}

	public function getCountPageForShow()
	{
		return $this->_countPageForShow;
	}

	public function __construct($params)
	{
		$this->_currentPage = intval($params['currentPage'] ? $params['currentPage'] : 1);
		$this->_countPageAll = intval((($params['countItemAll'] - 1) / $params['countItemForShow']) + 1);
		$this->_countPageForShow = intval($params['countPageForShow']);
		$this->_make();
	}

	private function _make()
	{
		$countPageForShow2 = intval($this->_countPageForShow / 2);
		$first = max(1, $this->_currentPage - $countPageForShow2);
		$last = min($this->_countPageAll, $this->_currentPage + $countPageForShow2);
		if ($first == 1) {
			$last = min($this->_countPageForShow, $this->_countPageAll);
		}
		if ($last == $this->_countPageAll) {
			$first = max(1, $this->_countPageAll - $countPageForShow2 * 2);
		}
		if ($first != 1) {
			$this->_first = $this->_addElement(1);
		}
		if ($last != $this->_countPageAll) {
			$this->_last = $this->_addElement($this->_countPageAll);
		}
		for ($i = $first; $i <= $last; $i ++) {
			if ($first != $last) {
				$this->_elements[] = $this->_addElement($i);
			}
		}
	}

	private function _addElement($number)
	{
		return array(
			'number' => $number , 'length' => intval(10 + strlen(strval($number)) * 6) , 'isCurrent' => ($number == $this->_currentPage) ? 1 : 0
		);
	}

	private function _max($a, $b)
	{
		return $a > $b ? $a : $b;
	}

	private function _min($a, $b)
	{
		return $a < $b ? $a : $b;
	}

	public function getArray()
	{
		return array(
			'leftarror' => array(
			'isActual' => $this->_currentPage > 1 ? 1 : 0 , 'number' => $this->_currentPage ? intval($this->_currentPage - 1) : 0
		) , 'first' => $this->_first , 'elements' => $this->_elements , 'last' => $this->_last , 'rightarror' => array(
			'isActual' => $this->_currentPage < $this->_countPageAll ? 1 : 0 , 'number' => $this->_currentPage ? intval($this->_currentPage + 1) : 2
		)
		);
	}
}
