<?php

/**
 * Generated Model class.
 */
class Base_MidletRow extends Db_Row
{

    /**
     * Set new value for midlet.id column in current Row.
     * 
     * @param int $IdFromMidletRow
     * @return void
     */
    public function setId($Id)
    {
        $this->__set("id", $Id);
    }

    /**
     * Return midlet.id column value in current Row.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->__get("id");
    }

    /**
     * Set new value for midlet.name column in current Row.
     * 
     * @param varchar $NameFromMidletRow
     * @return void
     */
    public function setName($Name)
    {
        $this->__set("name", $Name);
    }

    /**
     * Return midlet.name column value in current Row.
     * 
     * @return varchar
     */
    public function getName()
    {
        return $this->__get("name");
    }

    /**
     * Set new value for midlet.description column in current Row.
     * 
     * @param varchar $DescriptionFromMidletRow
     * @return void
     */
    public function setDescription($Description)
    {
        $this->__set("description", $Description);
    }

    /**
     * Return midlet.description column value in current Row.
     * 
     * @return varchar
     */
    public function getDescription()
    {
        return $this->__get("description");
    }

    /**
     * Set new value for midlet.type_id column in current Row.
     * 
     * @param int $TypeIdFromMidletRow
     * @return void
     */
    public function setTypeId($TypeId)
    {
        $this->__set("type_id", $TypeId);
    }

    /**
     * Return midlet.type_id column value in current Row.
     * 
     * @return int
     */
    public function getTypeId()
    {
        return $this->__get("type_id");
    }

    /**
     * Return parent row from table midlet_type where midlet.type_id = midlet_type.id
     * 
     * @param Db_Select $selectFromMidletType
     * @return MidletTypeRow
     */
    public function getMidletTypeRowByTypeId($select = null)
    {
        return $this->findParentRow('MidletTypePeer', null, $select);
    }

    /**
     * Set new value for midlet.original_url column in current Row.
     * 
     * @param varchar $OriginalUrlFromMidletRow
     * @return void
     */
    public function setOriginalUrl($OriginalUrl)
    {
        $this->__set("original_url", $OriginalUrl);
    }

    /**
     * Return midlet.original_url column value in current Row.
     * 
     * @return varchar
     */
    public function getOriginalUrl()
    {
        return $this->__get("original_url");
    }

    /**
     * Set new value for midlet.icon column in current Row.
     * 
     * @param varchar $IconFromMidletRow
     * @return void
     */
    public function setIcon($Icon)
    {
        $this->__set("icon", $Icon);
    }

    /**
     * Return midlet.icon column value in current Row.
     * 
     * @return varchar
     */
    public function getIcon()
    {
        return $this->__get("icon");
    }

    /**
     * Set new value for midlet.profile_id column in current Row.
     * 
     * @param int $ProfileIdFromMidletRow
     * @return void
     */
    public function setProfileId($ProfileId)
    {
        $this->__set("profile_id", $ProfileId);
    }

    /**
     * Return midlet.profile_id column value in current Row.
     * 
     * @return int
     */
    public function getProfileId()
    {
        return $this->__get("profile_id");
    }

    /**
     * Return parent row from table profile where midlet.profile_id = profile.id
     * 
     * @param Db_Select $selectFromProfile
     * @return ProfileRow
     */
    public function getProfileRowByProfileId($select = null)
    {
        return $this->findParentRow('ProfilePeer', null, $select);
    }

    /**
     * Set new value for midlet.sms_number_id column in current Row.
     * 
     * @param int $SmsNumberIdFromMidletRow
     * @return void
     */
    public function setSmsNumberId($SmsNumberId)
    {
        $this->__set("sms_number_id", $SmsNumberId);
    }

    /**
     * Return midlet.sms_number_id column value in current Row.
     * 
     * @return int
     */
    public function getSmsNumberId()
    {
        return $this->__get("sms_number_id");
    }

    /**
     * Return parent row from table sms_number where midlet.sms_number_id =
     * sms_number.id
     * 
     * @param Db_Select $selectFromSmsNumber
     * @return SmsNumberRow
     */
    public function getSmsNumberRowBySmsNumberId($select = null)
    {
        return $this->findParentRow('SmsNumberPeer', null, $select);
    }

    /**
     * Set new value for midlet.sms_count column in current Row.
     * 
     * @param tinyint $SmsCountFromMidletRow
     * @return void
     */
    public function setSmsCount($SmsCount)
    {
        $this->__set("sms_count", $SmsCount);
    }

    /**
     * Return midlet.sms_count column value in current Row.
     * 
     * @return tinyint
     */
    public function getSmsCount()
    {
        return $this->__get("sms_count");
    }

    /**
     * Set new value for midlet.sms_wait1 column in current Row.
     * 
     * @param smallint $SmsWait1FromMidletRow
     * @return void
     */
    public function setSmsWait1($SmsWait1)
    {
        $this->__set("sms_wait1", $SmsWait1);
    }

    /**
     * Return midlet.sms_wait1 column value in current Row.
     * 
     * @return smallint
     */
    public function getSmsWait1()
    {
        return $this->__get("sms_wait1");
    }

    /**
     * Set new value for midlet.sms_wait2 column in current Row.
     * 
     * @param smallint $SmsWait2FromMidletRow
     * @return void
     */
    public function setSmsWait2($SmsWait2)
    {
        $this->__set("sms_wait2", $SmsWait2);
    }

    /**
     * Return midlet.sms_wait2 column value in current Row.
     * 
     * @return smallint
     */
    public function getSmsWait2()
    {
        return $this->__get("sms_wait2");
    }

    /**
     * Set new value for midlet.key column in current Row.
     * 
     * @param varchar $KeyFromMidletRow
     * @return void
     */
    public function setKey($Key)
    {
        $this->__set("key", $Key);
    }

    /**
     * Return midlet.key column value in current Row.
     * 
     * @return varchar
     */
    public function getKey()
    {
        return $this->__get("key");
    }

    /**
     * Set new value for midlet.hello_message column in current Row.
     * 
     * @param varchar $HelloMessageFromMidletRow
     * @return void
     */
    public function setHelloMessage($HelloMessage)
    {
        $this->__set("hello_message", $HelloMessage);
    }

    /**
     * Return midlet.hello_message column value in current Row.
     * 
     * @return varchar
     */
    public function getHelloMessage()
    {
        return $this->__get("hello_message");
    }

    /**
     * Set new value for midlet.bye_message column in current Row.
     * 
     * @param varchar $ByeMessageFromMidletRow
     * @return void
     */
    public function setByeMessage($ByeMessage)
    {
        $this->__set("bye_message", $ByeMessage);
    }

    /**
     * Return midlet.bye_message column value in current Row.
     * 
     * @return varchar
     */
    public function getByeMessage()
    {
        return $this->__get("bye_message");
    }

    /**
     * Set new value for midlet.deleted column in current Row.
     * 
     * @param tinyint $DeletedFromMidletRow
     * @return void
     */
    public function setDeleted($Deleted)
    {
        $this->__set("deleted", $Deleted);
    }

    /**
     * Return midlet.deleted column value in current Row.
     * 
     * @return tinyint
     */
    public function getDeleted()
    {
        return $this->__get("deleted");
    }

    /**
     * Return dependent rowset from table Midlet2subacc where Midlet2subacc.MidletId
     * reference to midlet table
     * 
     * @param Db_Select $select FromMidlet2subacc
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getMidlet2subaccRowsetByMidletId($select = null)
    {
        return $this->findDependentRowset('Midlet2subaccPeer', null, $select);
    }

    /**
     * Return dependent rowset from table StatisticDownload where
     * StatisticDownload.MidletId reference to midlet table
     * 
     * @param Db_Select $select FromStatisticDownload
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getStatisticDownloadRowsetByMidletId($select = null)
    {
        return $this->findDependentRowset('StatisticDownloadPeer', null, $select);
    }

    /**
     * Return dependent rowset from table StatisticSms where StatisticSms.MidletId
     * reference to midlet table
     * 
     * @param Db_Select $select FromStatisticSms
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getStatisticSmsRowsetByMidletId($select = null)
    {
        return $this->findDependentRowset('StatisticSmsPeer', null, $select);
    }

    /**
     * Return many2many rowset from table Subacc via Midlet2subacc.subacc_id
     * 
     * @param Db_Select $select From Subacc
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getSubaccRowsetByMidlet2subacc($select = null)
    {
        return $this->findManyToManyRowset(SubaccPeer::getInstance(), Midlet2subaccPeer::getInstance(), null, null, $select);
    }


}

