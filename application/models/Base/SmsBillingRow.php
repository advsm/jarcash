<?php

/**
 * Generated Model class.
 */
class Base_SmsBillingRow extends Db_Row
{

    /**
     * Set new value for sms_billing.id column in current Row.
     * 
     * @param int $IdFromSmsBillingRow
     * @return void
     */
    public function setId($Id)
    {
        $this->__set("id", $Id);
    }

    /**
     * Return sms_billing.id column value in current Row.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->__get("id");
    }

    /**
     * Set new value for sms_billing.name column in current Row.
     * 
     * @param varchar $NameFromSmsBillingRow
     * @return void
     */
    public function setName($Name)
    {
        $this->__set("name", $Name);
    }

    /**
     * Return sms_billing.name column value in current Row.
     * 
     * @return varchar
     */
    public function getName()
    {
        return $this->__get("name");
    }

    /**
     * Set new value for sms_billing.url column in current Row.
     * 
     * @param varchar $UrlFromSmsBillingRow
     * @return void
     */
    public function setUrl($Url)
    {
        $this->__set("url", $Url);
    }

    /**
     * Return sms_billing.url column value in current Row.
     * 
     * @return varchar
     */
    public function getUrl()
    {
        return $this->__get("url");
    }

    /**
     * Set new value for sms_billing.prefix column in current Row.
     * 
     * @param varchar $PrefixFromSmsBillingRow
     * @return void
     */
    public function setPrefix($Prefix)
    {
        $this->__set("prefix", $Prefix);
    }

    /**
     * Return sms_billing.prefix column value in current Row.
     * 
     * @return varchar
     */
    public function getPrefix()
    {
        return $this->__get("prefix");
    }

    /**
     * Set new value for sms_billing.active column in current Row.
     * 
     * @param tinyint $ActiveFromSmsBillingRow
     * @return void
     */
    public function setActive($Active)
    {
        $this->__set("active", $Active);
    }

    /**
     * Return sms_billing.active column value in current Row.
     * 
     * @return tinyint
     */
    public function getActive()
    {
        return $this->__get("active");
    }

    /**
     * Return dependent rowset from table SmsNumber where SmsNumber.SmsBillingId
     * reference to sms_billing table
     * 
     * @param Db_Select $select FromSmsNumber
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getSmsNumberRowsetBySmsBillingId($select = null)
    {
        return $this->findDependentRowset('SmsNumberPeer', null, $select);
    }


}

