<?php

/**
 * Generated Model class.
 */
class Base_AdminSectionRow extends Db_Row
{

    /**
     * Set new value for admin_section.id column in current Row.
     * 
     * @param int $IdFromAdminSectionRow
     * @return void
     */
    public function setId($Id)
    {
        $this->__set("id", $Id);
    }

    /**
     * Return admin_section.id column value in current Row.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->__get("id");
    }

    /**
     * Set new value for admin_section.key column in current Row.
     * 
     * @param varchar $KeyFromAdminSectionRow
     * @return void
     */
    public function setKey($Key)
    {
        $this->__set("key", $Key);
    }

    /**
     * Return admin_section.key column value in current Row.
     * 
     * @return varchar
     */
    public function getKey()
    {
        return $this->__get("key");
    }

    /**
     * Set new value for admin_section.table_name column in current Row.
     * 
     * @param varchar $TableNameFromAdminSectionRow
     * @return void
     */
    public function setTableName($TableName)
    {
        $this->__set("table_name", $TableName);
    }

    /**
     * Return admin_section.table_name column value in current Row.
     * 
     * @return varchar
     */
    public function getTableName()
    {
        return $this->__get("table_name");
    }

    /**
     * Set new value for admin_section.action_name column in current Row.
     * 
     * @param varchar $ActionNameFromAdminSectionRow
     * @return void
     */
    public function setActionName($ActionName)
    {
        $this->__set("action_name", $ActionName);
    }

    /**
     * Return admin_section.action_name column value in current Row.
     * 
     * @return varchar
     */
    public function getActionName()
    {
        return $this->__get("action_name");
    }

    /**
     * Set new value for admin_section.name column in current Row.
     * 
     * @param varchar $NameFromAdminSectionRow
     * @return void
     */
    public function setName($Name)
    {
        $this->__set("name", $Name);
    }

    /**
     * Return admin_section.name column value in current Row.
     * 
     * @return varchar
     */
    public function getName()
    {
        return $this->__get("name");
    }

    /**
     * Set new value for admin_section.group_id column in current Row.
     * 
     * @param int $GroupIdFromAdminSectionRow
     * @return void
     */
    public function setGroupId($GroupId)
    {
        $this->__set("group_id", $GroupId);
    }

    /**
     * Return admin_section.group_id column value in current Row.
     * 
     * @return int
     */
    public function getGroupId()
    {
        return $this->__get("group_id");
    }

    /**
     * Return parent row from table admin_section_group where admin_section.group_id =
     * admin_section_group.id
     * 
     * @param Db_Select $selectFromAdminSectionGroup
     * @return AdminSectionGroupRow
     */
    public function getAdminSectionGroupRowByGroupId($select = null)
    {
        return $this->findParentRow('AdminSectionGroupPeer', null, $select);
    }

    /**
     * Set new value for admin_section.main_property column in current Row.
     * 
     * @param varchar $MainPropertyFromAdminSectionRow
     * @return void
     */
    public function setMainProperty($MainProperty)
    {
        $this->__set("main_property", $MainProperty);
    }

    /**
     * Return admin_section.main_property column value in current Row.
     * 
     * @return varchar
     */
    public function getMainProperty()
    {
        return $this->__get("main_property");
    }

    /**
     * Set new value for admin_section.view_script column in current Row.
     * 
     * @param varchar $ViewScriptFromAdminSectionRow
     * @return void
     */
    public function setViewScript($ViewScript)
    {
        $this->__set("view_script", $ViewScript);
    }

    /**
     * Return admin_section.view_script column value in current Row.
     * 
     * @return varchar
     */
    public function getViewScript()
    {
        return $this->__get("view_script");
    }

    /**
     * Set new value for admin_section.list_view_script column in current Row.
     * 
     * @param varchar $ListViewScriptFromAdminSectionRow
     * @return void
     */
    public function setListViewScript($ListViewScript)
    {
        $this->__set("list_view_script", $ListViewScript);
    }

    /**
     * Return admin_section.list_view_script column value in current Row.
     * 
     * @return varchar
     */
    public function getListViewScript()
    {
        return $this->__get("list_view_script");
    }

    /**
     * Set new value for admin_section.order column in current Row.
     * 
     * @param int $OrderFromAdminSectionRow
     * @return void
     */
    public function setOrder($Order)
    {
        $this->__set("order", $Order);
    }

    /**
     * Return admin_section.order column value in current Row.
     * 
     * @return int
     */
    public function getOrder()
    {
        return $this->__get("order");
    }

    /**
     * Return dependent rowset from table AdminLock where AdminLock.SectionId reference
     * to admin_section table
     * 
     * @param Db_Select $select FromAdminLock
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getAdminLockRowsetBySectionId($select = null)
    {
        return $this->findDependentRowset('AdminLockPeer', null, $select);
    }

    /**
     * Return dependent rowset from table AdminRole2section where
     * AdminRole2section.SectionId reference to admin_section table
     * 
     * @param Db_Select $select FromAdminRole2section
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getAdminRole2sectionRowsetBySectionId($select = null)
    {
        return $this->findDependentRowset('AdminRole2sectionPeer', null, $select);
    }

    /**
     * Return dependent rowset from table AdminSectionHandler where
     * AdminSectionHandler.SectionId reference to admin_section table
     * 
     * @param Db_Select $select FromAdminSectionHandler
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getAdminSectionHandlerRowsetBySectionId($select = null)
    {
        return $this->findDependentRowset('AdminSectionHandlerPeer', null, $select);
    }

    /**
     * Return dependent rowset from table AdminSectionProperty where
     * AdminSectionProperty.SectionId reference to admin_section table
     * 
     * @param Db_Select $select FromAdminSectionProperty
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getAdminSectionPropertyRowsetBySectionId($select = null)
    {
        return $this->findDependentRowset('AdminSectionPropertyPeer', null, $select);
    }

    /**
     * Return many2many rowset from table AdminRole via AdminRole2section.role_id
     * 
     * @param Db_Select $select From AdminRole
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getAdminRoleRowsetByAdminRole2section($select = null)
    {
        return $this->findManyToManyRowset(AdminRolePeer::getInstance(), AdminRole2sectionPeer::getInstance(), null, null, $select);
    }


}

