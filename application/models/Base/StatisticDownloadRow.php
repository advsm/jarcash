<?php

/**
 * Generated Model class.
 */
class Base_StatisticDownloadRow extends Db_Row
{

    /**
     * Set new value for statistic_download.id column in current Row.
     * 
     * @param int $IdFromStatisticDownloadRow
     * @return void
     */
    public function setId($Id)
    {
        $this->__set("id", $Id);
    }

    /**
     * Return statistic_download.id column value in current Row.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->__get("id");
    }

    /**
     * Set new value for statistic_download.ip column in current Row.
     * 
     * @param varchar $IpFromStatisticDownloadRow
     * @return void
     */
    public function setIp($Ip)
    {
        $this->__set("ip", $Ip);
    }

    /**
     * Return statistic_download.ip column value in current Row.
     * 
     * @return varchar
     */
    public function getIp()
    {
        return $this->__get("ip");
    }

    /**
     * Set new value for statistic_download.referer column in current Row.
     * 
     * @param varchar $RefererFromStatisticDownloadRow
     * @return void
     */
    public function setReferer($Referer)
    {
        $this->__set("referer", $Referer);
    }

    /**
     * Return statistic_download.referer column value in current Row.
     * 
     * @return varchar
     */
    public function getReferer()
    {
        return $this->__get("referer");
    }

    /**
     * Set new value for statistic_download.user_agent column in current Row.
     * 
     * @param varchar $UserAgentFromStatisticDownloadRow
     * @return void
     */
    public function setUserAgent($UserAgent)
    {
        $this->__set("user_agent", $UserAgent);
    }

    /**
     * Return statistic_download.user_agent column value in current Row.
     * 
     * @return varchar
     */
    public function getUserAgent()
    {
        return $this->__get("user_agent");
    }

    /**
     * Set new value for statistic_download.profile_id column in current Row.
     * 
     * @param int $ProfileIdFromStatisticDownloadRow
     * @return void
     */
    public function setProfileId($ProfileId)
    {
        $this->__set("profile_id", $ProfileId);
    }

    /**
     * Return statistic_download.profile_id column value in current Row.
     * 
     * @return int
     */
    public function getProfileId()
    {
        return $this->__get("profile_id");
    }

    /**
     * Return parent row from table profile where statistic_download.profile_id =
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
     * Set new value for statistic_download.midlet_id column in current Row.
     * 
     * @param int $MidletIdFromStatisticDownloadRow
     * @return void
     */
    public function setMidletId($MidletId)
    {
        $this->__set("midlet_id", $MidletId);
    }

    /**
     * Return statistic_download.midlet_id column value in current Row.
     * 
     * @return int
     */
    public function getMidletId()
    {
        return $this->__get("midlet_id");
    }

    /**
     * Return parent row from table midlet where statistic_download.midlet_id =
     * midlet.id
     * 
     * @param Db_Select $selectFromMidlet
     * @return MidletRow
     */
    public function getMidletRowByMidletId($select = null)
    {
        return $this->findParentRow('MidletPeer', null, $select);
    }

    /**
     * Set new value for statistic_download.subacc_id column in current Row.
     * 
     * @param int $SubaccIdFromStatisticDownloadRow
     * @return void
     */
    public function setSubaccId($SubaccId)
    {
        $this->__set("subacc_id", $SubaccId);
    }

    /**
     * Return statistic_download.subacc_id column value in current Row.
     * 
     * @return int
     */
    public function getSubaccId()
    {
        return $this->__get("subacc_id");
    }

    /**
     * Return parent row from table subacc where statistic_download.subacc_id =
     * subacc.id
     * 
     * @param Db_Select $selectFromSubacc
     * @return SubaccRow
     */
    public function getSubaccRowBySubaccId($select = null)
    {
        return $this->findParentRow('SubaccPeer', null, $select);
    }

    /**
     * Set new value for statistic_download.date column in current Row.
     * 
     * @param date $DateFromStatisticDownloadRow
     * @return void
     */
    public function setDate($Date)
    {
        $this->__set("date", $Date);
    }

    /**
     * Return statistic_download.date column value in current Row.
     * 
     * @return date
     */
    public function getDate()
    {
        return $this->__get("date");
    }

    /**
     * Set new value for statistic_download.datetime column in current Row.
     * 
     * @param timestamp $DatetimeFromStatisticDownloadRow
     * @return void
     */
    public function setDatetime($Datetime)
    {
        $this->__set("datetime", $Datetime);
    }

    /**
     * Return statistic_download.datetime column value in current Row.
     * 
     * @return timestamp
     */
    public function getDatetime()
    {
        return $this->__get("datetime");
    }


}

