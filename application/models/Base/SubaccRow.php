<?php

/**
 * Generated Model class.
 */
class Base_SubaccRow extends Db_Row
{

    /**
     * Set new value for subacc.id column in current Row.
     * 
     * @param int $IdFromSubaccRow
     * @return void
     */
    public function setId($Id)
    {
        $this->__set("id", $Id);
    }

    /**
     * Return subacc.id column value in current Row.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->__get("id");
    }

    /**
     * Set new value for subacc.key column in current Row.
     * 
     * @param varchar $KeyFromSubaccRow
     * @return void
     */
    public function setKey($Key)
    {
        $this->__set("key", $Key);
    }

    /**
     * Return subacc.key column value in current Row.
     * 
     * @return varchar
     */
    public function getKey()
    {
        return $this->__get("key");
    }

    /**
     * Set new value for subacc.profile_id column in current Row.
     * 
     * @param int $ProfileIdFromSubaccRow
     * @return void
     */
    public function setProfileId($ProfileId)
    {
        $this->__set("profile_id", $ProfileId);
    }

    /**
     * Return subacc.profile_id column value in current Row.
     * 
     * @return int
     */
    public function getProfileId()
    {
        return $this->__get("profile_id");
    }

    /**
     * Return parent row from table profile where subacc.profile_id = profile.id
     * 
     * @param Db_Select $selectFromProfile
     * @return ProfileRow
     */
    public function getProfileRowByProfileId($select = null)
    {
        return $this->findParentRow('ProfilePeer', null, $select);
    }

    /**
     * Return dependent rowset from table Midlet2subacc where Midlet2subacc.SubaccId
     * reference to subacc table
     * 
     * @param Db_Select $select FromMidlet2subacc
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getMidlet2subaccRowsetBySubaccId($select = null)
    {
        return $this->findDependentRowset('Midlet2subaccPeer', null, $select);
    }

    /**
     * Return dependent rowset from table Profile where Profile.SubaccId reference to
     * subacc table
     * 
     * @param Db_Select $select FromProfile
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getProfileRowsetBySubaccId($select = null)
    {
        return $this->findDependentRowset('ProfilePeer', null, $select);
    }

    /**
     * Return dependent rowset from table StatisticDownload where
     * StatisticDownload.SubaccId reference to subacc table
     * 
     * @param Db_Select $select FromStatisticDownload
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getStatisticDownloadRowsetBySubaccId($select = null)
    {
        return $this->findDependentRowset('StatisticDownloadPeer', null, $select);
    }

    /**
     * Return dependent rowset from table StatisticSms where StatisticSms.SubaccId
     * reference to subacc table
     * 
     * @param Db_Select $select FromStatisticSms
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getStatisticSmsRowsetBySubaccId($select = null)
    {
        return $this->findDependentRowset('StatisticSmsPeer', null, $select);
    }

    /**
     * Return many2many rowset from table Midlet via Midlet2subacc.midlet_id
     * 
     * @param Db_Select $select From Midlet
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getMidletRowsetByMidlet2subacc($select = null)
    {
        return $this->findManyToManyRowset(MidletPeer::getInstance(), Midlet2subaccPeer::getInstance(), null, null, $select);
    }


}

