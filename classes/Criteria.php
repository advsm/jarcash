<?php

class Criteria
{
	protected $order = '';
	protected $orderType = 'desc';
	protected $limit = 0;
	protected $page = 1;
	protected $distinct = false;


	/**
	 * @return unknown
	 */
	public function getLimit() {
		return $this->limit;
	}
	
	/**
	 * @return unknown
	 */
	public function getOrder() {
		return $this->order;
	}
	
	/**
	 * @return unknown
	 */
	public function getOrderType() {
		return $this->orderType;
	}
	
	/**
	 * @return unknown
	 */
	public function getPage() {
		return $this->page;
	}
	
	/**
	 * @param unknown_type $limit
	 */
	public function setLimit($limit) {
		$this->limit = $limit;
	}
	
	/**
	 * @param unknown_type $order
	 */
	public function setOrder($order) {
		$this->order = $order;
	}
	
	/**
	 * @param unknown_type $orderType
	 */
	public function setOrderType($orderType) {
		$this->orderType = $orderType;
	}
	
	/**
	 * @param unknown_type $page
	 */
	public function setPage($page) {
		$this->page = $page;
	}

	public function setDistinct($distinct = true) {
		$this->distinct = $distinct;
	}

	public function getDistinct() {
		return $this->distinct;
	}

	public function __construct($data = null)
	{
		if (!is_array($data)) {
			return;
		}
		foreach ($data as $field => $val) {
			if (isset($this->$field)) {
				$this->$field = $val;
			}
		}
	}
	
}