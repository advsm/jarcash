<?php

/**
 * Generated Model class.
 */
class Base_TicketRow extends Db_Row
{

    /**
     * Set new value for ticket.id column in current Row.
     * 
     * @param int $IdFromTicketRow
     * @return void
     */
    public function setId($Id)
    {
        $this->__set("id", $Id);
    }

    /**
     * Return ticket.id column value in current Row.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->__get("id");
    }

    /**
     * Set new value for ticket.profile_id column in current Row.
     * 
     * @param int $ProfileIdFromTicketRow
     * @return void
     */
    public function setProfileId($ProfileId)
    {
        $this->__set("profile_id", $ProfileId);
    }

    /**
     * Return ticket.profile_id column value in current Row.
     * 
     * @return int
     */
    public function getProfileId()
    {
        return $this->__get("profile_id");
    }

    /**
     * Return parent row from table profile where ticket.profile_id = profile.id
     * 
     * @param Db_Select $selectFromProfile
     * @return ProfileRow
     */
    public function getProfileRowByProfileId($select = null)
    {
        return $this->findParentRow('ProfilePeer', null, $select);
    }

    /**
     * Set new value for ticket.datetime column in current Row.
     * 
     * @param timestamp $DatetimeFromTicketRow
     * @return void
     */
    public function setDatetime($Datetime)
    {
        $this->__set("datetime", $Datetime);
    }

    /**
     * Return ticket.datetime column value in current Row.
     * 
     * @return timestamp
     */
    public function getDatetime()
    {
        return $this->__get("datetime");
    }

    /**
     * Set new value for ticket.topic column in current Row.
     * 
     * @param varchar $TopicFromTicketRow
     * @return void
     */
    public function setTopic($Topic)
    {
        $this->__set("topic", $Topic);
    }

    /**
     * Return ticket.topic column value in current Row.
     * 
     * @return varchar
     */
    public function getTopic()
    {
        return $this->__get("topic");
    }

    /**
     * Set new value for ticket.text column in current Row.
     * 
     * @param text $TextFromTicketRow
     * @return void
     */
    public function setText($Text)
    {
        $this->__set("text", $Text);
    }

    /**
     * Return ticket.text column value in current Row.
     * 
     * @return text
     */
    public function getText()
    {
        return $this->__get("text");
    }

    /**
     * Set new value for ticket.status_id column in current Row.
     * 
     * @param int $StatusIdFromTicketRow
     * @return void
     */
    public function setStatusId($StatusId)
    {
        $this->__set("status_id", $StatusId);
    }

    /**
     * Return ticket.status_id column value in current Row.
     * 
     * @return int
     */
    public function getStatusId()
    {
        return $this->__get("status_id");
    }

    /**
     * Return parent row from table ticket_status where ticket.status_id =
     * ticket_status.id
     * 
     * @param Db_Select $selectFromTicketStatus
     * @return TicketStatusRow
     */
    public function getTicketStatusRowByStatusId($select = null)
    {
        return $this->findParentRow('TicketStatusPeer', null, $select);
    }

    /**
     * Return dependent rowset from table TicketMessage where TicketMessage.TicketId
     * reference to ticket table
     * 
     * @param Db_Select $select FromTicketMessage
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getTicketMessageRowsetByTicketId($select = null)
    {
        return $this->findDependentRowset('TicketMessagePeer', null, $select);
    }


}

