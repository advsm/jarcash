<?php

/**
 * Generated Model class.
 */
class Base_StatisticSmsRow extends Db_Row
{

    /**
     * Set new value for statistic_sms.id column in current Row.
     * 
     * @param int $IdFromStatisticSmsRow
     * @return void
     */
    public function setId($Id)
    {
        $this->__set("id", $Id);
    }

    /**
     * Return statistic_sms.id column value in current Row.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->__get("id");
    }

    /**
     * Set new value for statistic_sms.msisdn column in current Row.
     * 
     * @param varchar $MsisdnFromStatisticSmsRow
     * @return void
     */
    public function setMsisdn($Msisdn)
    {
        $this->__set("msisdn", $Msisdn);
    }

    /**
     * Return statistic_sms.msisdn column value in current Row.
     * 
     * @return varchar
     */
    public function getMsisdn()
    {
        return $this->__get("msisdn");
    }

    /**
     * Set new value for statistic_sms.cost column in current Row.
     * 
     * @param float $CostFromStatisticSmsRow
     * @return void
     */
    public function setCost($Cost)
    {
        $this->__set("cost", $Cost);
    }

    /**
     * Return statistic_sms.cost column value in current Row.
     * 
     * @return float
     */
    public function getCost()
    {
        return $this->__get("cost");
    }

    /**
     * Set new value for statistic_sms.sms_number_id column in current Row.
     * 
     * @param int $SmsNumberIdFromStatisticSmsRow
     * @return void
     */
    public function setSmsNumberId($SmsNumberId)
    {
        $this->__set("sms_number_id", $SmsNumberId);
    }

    /**
     * Return statistic_sms.sms_number_id column value in current Row.
     * 
     * @return int
     */
    public function getSmsNumberId()
    {
        return $this->__get("sms_number_id");
    }

    /**
     * Set new value for statistic_sms.midlet_id column in current Row.
     * 
     * @param int $MidletIdFromStatisticSmsRow
     * @return void
     */
    public function setMidletId($MidletId)
    {
        $this->__set("midlet_id", $MidletId);
    }

    /**
     * Return statistic_sms.midlet_id column value in current Row.
     * 
     * @return int
     */
    public function getMidletId()
    {
        return $this->__get("midlet_id");
    }

    /**
     * Return parent row from table midlet where statistic_sms.midlet_id = midlet.id
     * 
     * @param Db_Select $selectFromMidlet
     * @return MidletRow
     */
    public function getMidletRowByMidletId($select = null)
    {
        return $this->findParentRow('MidletPeer', null, $select);
    }

    /**
     * Set new value for statistic_sms.date column in current Row.
     * 
     * @param date $DateFromStatisticSmsRow
     * @return void
     */
    public function setDate($Date)
    {
        $this->__set("date", $Date);
    }

    /**
     * Return statistic_sms.date column value in current Row.
     * 
     * @return date
     */
    public function getDate()
    {
        return $this->__get("date");
    }

    /**
     * Set new value for statistic_sms.datetime column in current Row.
     * 
     * @param timestamp $DatetimeFromStatisticSmsRow
     * @return void
     */
    public function setDatetime($Datetime)
    {
        $this->__set("datetime", $Datetime);
    }

    /**
     * Return statistic_sms.datetime column value in current Row.
     * 
     * @return timestamp
     */
    public function getDatetime()
    {
        return $this->__get("datetime");
    }

    /**
     * Set new value for statistic_sms.subacc_id column in current Row.
     * 
     * @param int $SubaccIdFromStatisticSmsRow
     * @return void
     */
    public function setSubaccId($SubaccId)
    {
        $this->__set("subacc_id", $SubaccId);
    }

    /**
     * Return statistic_sms.subacc_id column value in current Row.
     * 
     * @return int
     */
    public function getSubaccId()
    {
        return $this->__get("subacc_id");
    }

    /**
     * Return parent row from table subacc where statistic_sms.subacc_id = subacc.id
     * 
     * @param Db_Select $selectFromSubacc
     * @return SubaccRow
     */
    public function getSubaccRowBySubaccId($select = null)
    {
        return $this->findParentRow('SubaccPeer', null, $select);
    }

    /**
     * Set new value for statistic_sms.request column in current Row.
     * 
     * @param text $RequestFromStatisticSmsRow
     * @return void
     */
    public function setRequest($Request)
    {
        $this->__set("request", $Request);
    }

    /**
     * Return statistic_sms.request column value in current Row.
     * 
     * @return text
     */
    public function getRequest()
    {
        return $this->__get("request");
    }

    /**
     * Set new value for statistic_sms.response column in current Row.
     * 
     * @param text $ResponseFromStatisticSmsRow
     * @return void
     */
    public function setResponse($Response)
    {
        $this->__set("response", $Response);
    }

    /**
     * Return statistic_sms.response column value in current Row.
     * 
     * @return text
     */
    public function getResponse()
    {
        return $this->__get("response");
    }


}

