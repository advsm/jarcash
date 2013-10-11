<?php

/**
 * Generated Model class.
 */
class Base_AdminRoleRow extends Db_Row
{

    /**
     * Set new value for admin_role.id column in current Row.
     * 
     * @param int $IdFromAdminRoleRow
     * @return void
     */
    public function setId($Id)
    {
        $this->__set("id", $Id);
    }

    /**
     * Return admin_role.id column value in current Row.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->__get("id");
    }

    /**
     * Set new value for admin_role.key column in current Row.
     * 
     * @param varchar $KeyFromAdminRoleRow
     * @return void
     */
    public function setKey($Key)
    {
        $this->__set("key", $Key);
    }

    /**
     * Return admin_role.key column value in current Row.
     * 
     * @return varchar
     */
    public function getKey()
    {
        return $this->__get("key");
    }

    /**
     * Set new value for admin_role.name column in current Row.
     * 
     * @param varchar $NameFromAdminRoleRow
     * @return void
     */
    public function setName($Name)
    {
        $this->__set("name", $Name);
    }

    /**
     * Return admin_role.name column value in current Row.
     * 
     * @return varchar
     */
    public function getName()
    {
        return $this->__get("name");
    }

    /**
     * Return dependent rowset from table AdminRole2section where
     * AdminRole2section.RoleId reference to admin_role table
     * 
     * @param Db_Select $select FromAdminRole2section
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getAdminRole2sectionRowsetByRoleId($select = null)
    {
        return $this->findDependentRowset('AdminRole2sectionPeer', null, $select);
    }

    /**
     * Return dependent rowset from table AdminRole2sectionGroup where
     * AdminRole2sectionGroup.RoleId reference to admin_role table
     * 
     * @param Db_Select $select FromAdminRole2sectionGroup
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getAdminRole2sectionGroupRowsetByRoleId($select = null)
    {
        return $this->findDependentRowset('AdminRole2sectionGroupPeer', null, $select);
    }

    /**
     * Return dependent rowset from table AdminUser where AdminUser.RoleId reference to
     * admin_role table
     * 
     * @param Db_Select $select FromAdminUser
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getAdminUserRowsetByRoleId($select = null)
    {
        return $this->findDependentRowset('AdminUserPeer', null, $select);
    }

    /**
     * Return many2many rowset from table AdminSection via AdminRole2section.section_id
     * 
     * @param Db_Select $select From AdminSection
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getAdminSectionRowsetByAdminRole2section($select = null)
    {
        return $this->findManyToManyRowset(AdminSectionPeer::getInstance(), AdminRole2sectionPeer::getInstance(), null, null, $select);
    }

    /**
     * Return many2many rowset from table AdminSectionGroup via
     * AdminRole2sectionGroup.group_id
     * 
     * @param Db_Select $select From AdminSectionGroup
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getAdminSectionGroupRowsetByAdminRole2sectionGroup($select = null)
    {
        return $this->findManyToManyRowset(AdminSectionGroupPeer::getInstance(), AdminRole2sectionGroupPeer::getInstance(), null, null, $select);
    }


}

