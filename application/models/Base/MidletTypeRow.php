<?php

/**
 * Generated Model class.
 */
class Base_MidletTypeRow extends Db_Row
{

    /**
     * Set new value for midlet_type.id column in current Row.
     * 
     * @param int $IdFromMidletTypeRow
     * @return void
     */
    public function setId($Id)
    {
        $this->__set("id", $Id);
    }

    /**
     * Return midlet_type.id column value in current Row.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->__get("id");
    }

    /**
     * Set new value for midlet_type.key column in current Row.
     * 
     * @param varchar $KeyFromMidletTypeRow
     * @return void
     */
    public function setKey($Key)
    {
        $this->__set("key", $Key);
    }

    /**
     * Return midlet_type.key column value in current Row.
     * 
     * @return varchar
     */
    public function getKey()
    {
        return $this->__get("key");
    }

    /**
     * Set new value for midlet_type.version column in current Row.
     * 
     * @param varchar $VersionFromMidletTypeRow
     * @return void
     */
    public function setVersion($Version)
    {
        $this->__set("version", $Version);
    }

    /**
     * Return midlet_type.version column value in current Row.
     * 
     * @return varchar
     */
    public function getVersion()
    {
        return $this->__get("version");
    }

    /**
     * Set new value for midlet_type.name column in current Row.
     * 
     * @param varchar $NameFromMidletTypeRow
     * @return void
     */
    public function setName($Name)
    {
        $this->__set("name", $Name);
    }

    /**
     * Return midlet_type.name column value in current Row.
     * 
     * @return varchar
     */
    public function getName()
    {
        return $this->__get("name");
    }

    /**
     * Set new value for midlet_type.description column in current Row.
     * 
     * @param text $DescriptionFromMidletTypeRow
     * @return void
     */
    public function setDescription($Description)
    {
        $this->__set("description", $Description);
    }

    /**
     * Return midlet_type.description column value in current Row.
     * 
     * @return text
     */
    public function getDescription()
    {
        return $this->__get("description");
    }

    /**
     * Return dependent rowset from table Midlet where Midlet.TypeId reference to
     * midlet_type table
     * 
     * @param Db_Select $select FromMidlet
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getMidletRowsetByTypeId($select = null)
    {
        return $this->findDependentRowset('MidletPeer', null, $select);
    }


}

