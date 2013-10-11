<?php

class PaginatorSelectAdapter extends Zend_Paginator_Adapter_DbSelect {
	
	/**
	 * 
	 * @var Db_Peer
	 */
	protected $_peer;
	
	/**
	 * 
	 * @param Zend_Db_Select $select
	 * @param Db_Peer $peer
	 */
	public function __construct(Zend_Db_Select $select, Db_Peer $peer) {
		$this->_peer = $peer;
		parent::__construct($select);
	}
	
    /**
     * Returns Db_Rowset of items for a page.
     *
     * @param  integer $offset Page offset
     * @param  integer $itemCountPerPage Number of items per page
     * @return Db_Rowset
     */
    public function getItems($offset, $itemCountPerPage)
    {
        $this->_select->limit($itemCountPerPage, $offset);

        return $this->_peer->fetchAll($this->_select);
    }
    
}