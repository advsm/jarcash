<?php

/**
 * Generated Model class.
 */
class Base_SmsStatisticRow extends Db_Row
{

    /**
     * Set new value for sms_statistic.id column in current Row.
     * 
     * @param int $IdFromSmsStatisticRow
     * @return void
     */
    public function setId($Id)
    {
        $this->__set("id", $Id);
    }

    /**
     * Return sms_statistic.id column value in current Row.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->__get("id");
    }

    /**
     * Set new value for sms_statistic.msisdn column in current Row.
     * 
     * @param varchar $MsisdnFromSmsStatisticRow
     * @return void
     */
    public function setMsisdn($Msisdn)
    {
        $this->__set("msisdn", $Msisdn);
    }

    /**
     * Return sms_statistic.msisdn column value in current Row.
     * 
     * @return varchar
     */
    public function getMsisdn()
    {
        return $this->__get("msisdn");
    }

    /**
     * Set new value for sms_statistic.sms_number column in current Row.
     * 
     * @param varchar $SmsNumberFromSmsStatisticRow
     * @return void
     */
    public function setSmsNumber($SmsNumber)
    {
        $this->__set("sms_number", $SmsNumber);
    }

    /**
     * Return sms_statistic.sms_number column value in current Row.
     * 
     * @return varchar
     */
    public function getSmsNumber()
    {
        return $this->__get("sms_number");
    }

    /**
     * Set new value for sms_statistic.midlet_id column in current Row.
     * 
     * @param int $MidletIdFromSmsStatisticRow
     * @return void
     */
    public function setMidletId($MidletId)
    {
        $this->__set("midlet_id", $MidletId);
    }

    /**
     * Return sms_statistic.midlet_id column value in current Row.
     * 
     * @return int
     */
    public function getMidletId()
    {
        return $this->__get("midlet_id");
    }

    /**
     * Return parent row from table midlet where sms_statistic.midlet_id = midlet.id
     * 
     * @param Db_Select $selectFromMidlet
     * @return MidletRow
     */
    public function getMidletRowByMidletId($select = null)
    {
        return $this->findParentRow('MidletPeer', null, $select);
    }

    /**
     * Set new value for sms_statistic.datetime column in current Row.
     * 
     * @param timestamp $DatetimeFromSmsStatisticRow
     * @return void
     */
    public function setDatetime($Datetime)
    {
        $this->__set("datetime", $Datetime);
    }

    /**
     * Return sms_statistic.datetime column value in current Row.
     * 
     * @return timestamp
     */
    public function getDatetime()
    {
        return $this->__get("datetime");
    }


}

