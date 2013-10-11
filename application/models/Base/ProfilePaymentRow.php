<?php

/**
 * Generated Model class.
 */
class Base_ProfilePaymentRow extends Db_Row
{

    /**
     * Set new value for profile_payment.id column in current Row.
     * 
     * @param int $IdFromProfilePaymentRow
     * @return void
     */
    public function setId($Id)
    {
        $this->__set("id", $Id);
    }

    /**
     * Return profile_payment.id column value in current Row.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->__get("id");
    }

    /**
     * Set new value for profile_payment.profile_id column in current Row.
     * 
     * @param int $ProfileIdFromProfilePaymentRow
     * @return void
     */
    public function setProfileId($ProfileId)
    {
        $this->__set("profile_id", $ProfileId);
    }

    /**
     * Return profile_payment.profile_id column value in current Row.
     * 
     * @return int
     */
    public function getProfileId()
    {
        return $this->__get("profile_id");
    }

    /**
     * Return parent row from table profile where profile_payment.profile_id =
     * profile.id
     * 
     * @param Db_Select $selectFromProfile
     * @return ProfileRow
     */
    public function getProfileRowByProfileId($select = null)
    {
        return $this->findParentRow('ProfilePeer', null, $select);
    }

    /**
     * Set new value for profile_payment.amount column in current Row.
     * 
     * @param float $AmountFromProfilePaymentRow
     * @return void
     */
    public function setAmount($Amount)
    {
        $this->__set("amount", $Amount);
    }

    /**
     * Return profile_payment.amount column value in current Row.
     * 
     * @return float
     */
    public function getAmount()
    {
        return $this->__get("amount");
    }

    /**
     * Set new value for profile_payment.destination column in current Row.
     * 
     * @param varchar $DestinationFromProfilePaymentRow
     * @return void
     */
    public function setDestination($Destination)
    {
        $this->__set("destination", $Destination);
    }

    /**
     * Return profile_payment.destination column value in current Row.
     * 
     * @return varchar
     */
    public function getDestination()
    {
        return $this->__get("destination");
    }

    /**
     * Set new value for profile_payment.created column in current Row.
     * 
     * @param timestamp $CreatedFromProfilePaymentRow
     * @return void
     */
    public function setCreated($Created)
    {
        $this->__set("created", $Created);
    }

    /**
     * Return profile_payment.created column value in current Row.
     * 
     * @return timestamp
     */
    public function getCreated()
    {
        return $this->__get("created");
    }

    /**
     * Set new value for profile_payment.status_id column in current Row.
     * 
     * @param int $StatusIdFromProfilePaymentRow
     * @return void
     */
    public function setStatusId($StatusId)
    {
        $this->__set("status_id", $StatusId);
    }

    /**
     * Return profile_payment.status_id column value in current Row.
     * 
     * @return int
     */
    public function getStatusId()
    {
        return $this->__get("status_id");
    }

    /**
     * Return parent row from table payment_status where profile_payment.status_id =
     * payment_status.id
     * 
     * @param Db_Select $selectFromPaymentStatus
     * @return PaymentStatusRow
     */
    public function getPaymentStatusRowByStatusId($select = null)
    {
        return $this->findParentRow('PaymentStatusPeer', null, $select);
    }


}

