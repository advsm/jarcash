<?php

/**
 * Generated Model class.
 */
class Base_PaymentStatusRow extends Db_Row
{

    /**
     * Set new value for payment_status.id column in current Row.
     * 
     * @param int $IdFromPaymentStatusRow
     * @return void
     */
    public function setId($Id)
    {
        $this->__set("id", $Id);
    }

    /**
     * Return payment_status.id column value in current Row.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->__get("id");
    }

    /**
     * Set new value for payment_status.key column in current Row.
     * 
     * @param varchar $KeyFromPaymentStatusRow
     * @return void
     */
    public function setKey($Key)
    {
        $this->__set("key", $Key);
    }

    /**
     * Return payment_status.key column value in current Row.
     * 
     * @return varchar
     */
    public function getKey()
    {
        return $this->__get("key");
    }

    /**
     * Set new value for payment_status.name column in current Row.
     * 
     * @param varchar $NameFromPaymentStatusRow
     * @return void
     */
    public function setName($Name)
    {
        $this->__set("name", $Name);
    }

    /**
     * Return payment_status.name column value in current Row.
     * 
     * @return varchar
     */
    public function getName()
    {
        return $this->__get("name");
    }

    /**
     * Return dependent rowset from table ProfilePayment where ProfilePayment.StatusId
     * reference to payment_status table
     * 
     * @param Db_Select $select FromProfilePayment
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getProfilePaymentRowsetByStatusId($select = null)
    {
        return $this->findDependentRowset('ProfilePaymentPeer', null, $select);
    }


}

