<?php

/**
 * Generated Model class.
 */
class Base_DownloadStatisticRow extends Db_Row
{

    /**
     * Set new value for download_statistic.id column in current Row.
     * 
     * @param int $IdFromDownloadStatisticRow
     * @return void
     */
    public function setId($Id)
    {
        $this->__set("id", $Id);
    }

    /**
     * Return download_statistic.id column value in current Row.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->__get("id");
    }

    /**
     * Set new value for download_statistic.midlet_id column in current Row.
     * 
     * @param int $MidletIdFromDownloadStatisticRow
     * @return void
     */
    public function setMidletId($MidletId)
    {
        $this->__set("midlet_id", $MidletId);
    }

    /**
     * Return download_statistic.midlet_id column value in current Row.
     * 
     * @return int
     */
    public function getMidletId()
    {
        return $this->__get("midlet_id");
    }

    /**
     * Return parent row from table midlet where download_statistic.midlet_id =
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
     * Set new value for download_statistic.referer column in current Row.
     * 
     * @param varchar $RefererFromDownloadStatisticRow
     * @return void
     */
    public function setReferer($Referer)
    {
        $this->__set("referer", $Referer);
    }

    /**
     * Return download_statistic.referer column value in current Row.
     * 
     * @return varchar
     */
    public function getReferer()
    {
        return $this->__get("referer");
    }

    /**
     * Set new value for download_statistic.datetime column in current Row.
     * 
     * @param timestamp $DatetimeFromDownloadStatisticRow
     * @return void
     */
    public function setDatetime($Datetime)
    {
        $this->__set("datetime", $Datetime);
    }

    /**
     * Return download_statistic.datetime column value in current Row.
     * 
     * @return timestamp
     */
    public function getDatetime()
    {
        return $this->__get("datetime");
    }


}

