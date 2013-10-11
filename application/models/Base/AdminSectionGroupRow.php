<?php

/**
 * Generated Model class.
 */
class Base_AdminSectionGroupRow extends Db_Row
{

    /**
     * Set new value for admin_section_group.id column in current Row.
     * 
     * @param int $IdFromAdminSectionGroupRow
     * @return void
     */
    public function setId($Id)
    {
        $this->__set("id", $Id);
    }

    /**
     * Return admin_section_group.id column value in current Row.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->__get("id");
    }

    /**
     * Set new value for admin_section_group.key column in current Row.
     * 
     * @param varchar $KeyFromAdminSectionGroupRow
     * @return void
     */
    public function setKey($Key)
    {
        $this->__set("key", $Key);
    }

    /**
     * Return admin_section_group.key column value in current Row.
     * 
     * @return varchar
     */
    public function getKey()
    {
        return $this->__get("key");
    }

    /**
     * Set new value for admin_section_group.name column in current Row.
     * 
     * @param varchar $NameFromAdminSectionGroupRow
     * @return void
     */
    public function setName($Name)
    {
        $this->__set("name", $Name);
    }

    /**
     * Return admin_section_group.name column value in current Row.
     * 
     * @return varchar
     */
    public function getName()
    {
        return $this->__get("name");
    }

    /**
     * Set new value for admin_section_group.order column in current Row.
     * 
     * @param int $OrderFromAdminSectionGroupRow
     * @return void
     */
    public function setOrder($Order)
    {
        $this->__set("order", $Order);
    }

    /**
     * Return admin_section_group.order column value in current Row.
     * 
     * @return int
     */
    public function getOrder()
    {
        return $this->__get("order");
    }

    /**
     * Return dependent rowset from table AdminRole2sectionGroup where
     * AdminRole2sectionGroup.GroupId reference to admin_section_group table
     * 
     * @param Db_Select $select FromAdminRole2sectionGroup
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getAdminRole2sectionGroupRowsetByGroupId($select = null)
    {
        return $this->findDependentRowset('AdminRole2sectionGroupPeer', null, $select);
    }

    /**
     * Return dependent rowset from table AdminSection where AdminSection.GroupId
     * reference to admin_section_group table
     * 
     * @param Db_Select $select FromAdminSection
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getAdminSectionRowsetByGroupId($select = null)
    {
        return $this->findDependentRowset('AdminSectionPeer', null, $select);
    }

    /**
     * Return many2many rowset from table AdminRole via AdminRole2sectionGroup.role_id
     * 
     * @param Db_Select $select From AdminRole
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getAdminRoleRowsetByAdminRole2sectionGroup($select = null)
    {
        return $this->findManyToManyRowset(AdminRolePeer::getInstance(), AdminRole2sectionGroupPeer::getInstance(), null, null, $select);
    }


}

