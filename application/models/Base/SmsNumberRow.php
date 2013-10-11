<?php

/**
 * Generated Model class.
 */
class Base_SmsNumberRow extends Db_Row
{

    /**
     * Set new value for sms_number.id column in current Row.
     * 
     * @param int $IdFromSmsNumberRow
     * @return void
     */
    public function setId($Id)
    {
        $this->__set("id", $Id);
    }

    /**
     * Return sms_number.id column value in current Row.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->__get("id");
    }

    /**
     * Set new value for sms_number.number column in current Row.
     * 
     * @param varchar $NumberFromSmsNumberRow
     * @return void
     */
    public function setNumber($Number)
    {
        $this->__set("number", $Number);
    }

    /**
     * Return sms_number.number column value in current Row.
     * 
     * @return varchar
     */
    public function getNumber()
    {
        return $this->__get("number");
    }

    /**
     * Set new value for sms_number.name column in current Row.
     * 
     * @param varchar $NameFromSmsNumberRow
     * @return void
     */
    public function setName($Name)
    {
        $this->__set("name", $Name);
    }

    /**
     * Return sms_number.name column value in current Row.
     * 
     * @return varchar
     */
    public function getName()
    {
        return $this->__get("name");
    }

    /**
     * Set new value for sms_number.agreement column in current Row.
     * 
     * @param text $AgreementFromSmsNumberRow
     * @return void
     */
    public function setAgreement($Agreement)
    {
        $this->__set("agreement", $Agreement);
    }

    /**
     * Return sms_number.agreement column value in current Row.
     * 
     * @return text
     */
    public function getAgreement()
    {
        return $this->__get("agreement");
    }

    /**
     * Set new value for sms_number.cost column in current Row.
     * 
     * @param float $CostFromSmsNumberRow
     * @return void
     */
    public function setCost($Cost)
    {
        $this->__set("cost", $Cost);
    }

    /**
     * Return sms_number.cost column value in current Row.
     * 
     * @return float
     */
    public function getCost()
    {
        return $this->__get("cost");
    }

    /**
     * Set new value for sms_number.sms_billing_id column in current Row.
     * 
     * @param int $SmsBillingIdFromSmsNumberRow
     * @return void
     */
    public function setSmsBillingId($SmsBillingId)
    {
        $this->__set("sms_billing_id", $SmsBillingId);
    }

    /**
     * Return sms_number.sms_billing_id column value in current Row.
     * 
     * @return int
     */
    public function getSmsBillingId()
    {
        return $this->__get("sms_billing_id");
    }

    /**
     * Return parent row from table sms_billing where sms_number.sms_billing_id =
     * sms_billing.id
     * 
     * @param Db_Select $selectFromSmsBilling
     * @return SmsBillingRow
     */
    public function getSmsBillingRowBySmsBillingId($select = null)
    {
        return $this->findParentRow('SmsBillingPeer', null, $select);
    }

    /**
     * Set new value for sms_number.active column in current Row.
     * 
     * @param tinyint $ActiveFromSmsNumberRow
     * @return void
     */
    public function setActive($Active)
    {
        $this->__set("active", $Active);
    }

    /**
     * Return sms_number.active column value in current Row.
     * 
     * @return tinyint
     */
    public function getActive()
    {
        return $this->__get("active");
    }

    /**
     * Return dependent rowset from table Midlet where Midlet.SmsNumberId reference to
     * sms_number table
     * 
     * @param Db_Select $select FromMidlet
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getMidletRowsetBySmsNumberId($select = null)
    {
        return $this->findDependentRowset('MidletPeer', null, $select);
    }


}

