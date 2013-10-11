<?php

/**
 * Generated Model class.
 */
class Base_AdminRole2sectionGroupRow extends Db_Row
{

    /**
     * Set new value for admin_role2section_group.id column in current Row.
     * 
     * @param int $IdFromAdminRole2sectionGroupRow
     * @return void
     */
    public function setId($Id)
    {
        $this->__set("id", $Id);
    }

    /**
     * Return admin_role2section_group.id column value in current Row.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->__get("id");
    }

    /**
     * Set new value for admin_role2section_group.role_id column in current Row.
     * 
     * @param int $RoleIdFromAdminRole2sectionGroupRow
     * @return void
     */
    public function setRoleId($RoleId)
    {
        $this->__set("role_id", $RoleId);
    }

    /**
     * Return admin_role2section_group.role_id column value in current Row.
     * 
     * @return int
     */
    public function getRoleId()
    {
        return $this->__get("role_id");
    }

    /**
     * Return parent row from table admin_role where admin_role2section_group.role_id =
     * admin_role.id
     * 
     * @param Db_Select $selectFromAdminRole
     * @return AdminRoleRow
     */
    public function getAdminRoleRowByRoleId($select = null)
    {
        return $this->findParentRow('AdminRolePeer', null, $select);
    }

    /**
     * Set new value for admin_role2section_group.group_id column in current Row.
     * 
     * @param int $GroupIdFromAdminRole2sectionGroupRow
     * @return void
     */
    public function setGroupId($GroupId)
    {
        $this->__set("group_id", $GroupId);
    }

    /**
     * Return admin_role2section_group.group_id column value in current Row.
     * 
     * @return int
     */
    public function getGroupId()
    {
        return $this->__get("group_id");
    }

    /**
     * Return parent row from table admin_section_group where
     * admin_role2section_group.group_id = admin_section_group.id
     * 
     * @param Db_Select $selectFromAdminSectionGroup
     * @return AdminSectionGroupRow
     */
    public function getAdminSectionGroupRowByGroupId($select = null)
    {
        return $this->findParentRow('AdminSectionGroupPeer', null, $select);
    }

    /**
     * Set new value for admin_role2section_group.permissions column in current Row.
     * 
     * @param varchar $PermissionsFromAdminRole2sectionGroupRow
     * @return void
     */
    public function setPermissions($Permissions)
    {
        $this->__set("permissions", $Permissions);
    }

    /**
     * Return admin_role2section_group.permissions column value in current Row.
     * 
     * @return varchar
     */
    public function getPermissions()
    {
        return $this->__get("permissions");
    }


}

