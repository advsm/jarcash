<?php

/**
 * Generated Model class.
 */
class Base_TicketMessageRow extends Db_Row
{

    /**
     * Set new value for ticket_message.id column in current Row.
     * 
     * @param int $IdFromTicketMessageRow
     * @return void
     */
    public function setId($Id)
    {
        $this->__set("id", $Id);
    }

    /**
     * Return ticket_message.id column value in current Row.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->__get("id");
    }

    /**
     * Set new value for ticket_message.from_profile_id column in current Row.
     * 
     * @param int $FromProfileIdFromTicketMessageRow
     * @return void
     */
    public function setFromProfileId($FromProfileId)
    {
        $this->__set("from_profile_id", $FromProfileId);
    }

    /**
     * Return ticket_message.from_profile_id column value in current Row.
     * 
     * @return int
     */
    public function getFromProfileId()
    {
        return $this->__get("from_profile_id");
    }

    /**
     * Return parent row from table profile where ticket_message.from_profile_id =
     * profile.id
     * 
     * @param Db_Select $selectFromProfile
     * @return ProfileRow
     */
    public function getProfileRowByFromProfileId($select = null)
    {
        return $this->findParentRow('ProfilePeer', null, $select);
    }

    /**
     * Set new value for ticket_message.to_profile_id column in current Row.
     * 
     * @param int $ToProfileIdFromTicketMessageRow
     * @return void
     */
    public function setToProfileId($ToProfileId)
    {
        $this->__set("to_profile_id", $ToProfileId);
    }

    /**
     * Return ticket_message.to_profile_id column value in current Row.
     * 
     * @return int
     */
    public function getToProfileId()
    {
        return $this->__get("to_profile_id");
    }

    /**
     * Return parent row from table profile where ticket_message.to_profile_id =
     * profile.id
     * 
     * @param Db_Select $selectFromProfile
     * @return ProfileRow
     */
    public function getProfileRowByToProfileId($select = null)
    {
        return $this->findParentRow('ProfilePeer', null, $select);
    }

    /**
     * Set new value for ticket_message.datetime column in current Row.
     * 
     * @param timestamp $DatetimeFromTicketMessageRow
     * @return void
     */
    public function setDatetime($Datetime)
    {
        $this->__set("datetime", $Datetime);
    }

    /**
     * Return ticket_message.datetime column value in current Row.
     * 
     * @return timestamp
     */
    public function getDatetime()
    {
        return $this->__get("datetime");
    }

    /**
     * Set new value for ticket_message.text column in current Row.
     * 
     * @param text $TextFromTicketMessageRow
     * @return void
     */
    public function setText($Text)
    {
        $this->__set("text", $Text);
    }

    /**
     * Return ticket_message.text column value in current Row.
     * 
     * @return text
     */
    public function getText()
    {
        return $this->__get("text");
    }

    /**
     * Set new value for ticket_message.ticket_id column in current Row.
     * 
     * @param int $TicketIdFromTicketMessageRow
     * @return void
     */
    public function setTicketId($TicketId)
    {
        $this->__set("ticket_id", $TicketId);
    }

    /**
     * Return ticket_message.ticket_id column value in current Row.
     * 
     * @return int
     */
    public function getTicketId()
    {
        return $this->__get("ticket_id");
    }

    /**
     * Return parent row from table ticket where ticket_message.ticket_id = ticket.id
     * 
     * @param Db_Select $selectFromTicket
     * @return TicketRow
     */
    public function getTicketRowByTicketId($select = null)
    {
        return $this->findParentRow('TicketPeer', null, $select);
    }


}

