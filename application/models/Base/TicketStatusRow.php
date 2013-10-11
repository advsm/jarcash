<?php

/**
 * Generated Model class.
 */
class Base_TicketStatusRow extends Db_Row
{

    /**
     * Set new value for ticket_status.id column in current Row.
     * 
     * @param int $IdFromTicketStatusRow
     * @return void
     */
    public function setId($Id)
    {
        $this->__set("id", $Id);
    }

    /**
     * Return ticket_status.id column value in current Row.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->__get("id");
    }

    /**
     * Set new value for ticket_status.key column in current Row.
     * 
     * @param varchar $KeyFromTicketStatusRow
     * @return void
     */
    public function setKey($Key)
    {
        $this->__set("key", $Key);
    }

    /**
     * Return ticket_status.key column value in current Row.
     * 
     * @return varchar
     */
    public function getKey()
    {
        return $this->__get("key");
    }

    /**
     * Set new value for ticket_status.name column in current Row.
     * 
     * @param varchar $NameFromTicketStatusRow
     * @return void
     */
    public function setName($Name)
    {
        $this->__set("name", $Name);
    }

    /**
     * Return ticket_status.name column value in current Row.
     * 
     * @return varchar
     */
    public function getName()
    {
        return $this->__get("name");
    }

    /**
     * Return dependent rowset from table Ticket where Ticket.StatusId reference to
     * ticket_status table
     * 
     * @param Db_Select $select FromTicket
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getTicketRowsetByStatusId($select = null)
    {
        return $this->findDependentRowset('TicketPeer', null, $select);
    }


}

