<?php

/**
 * Generated Model class.
 */
class Base_AdminRole2sectionRow extends Db_Row
{

    /**
     * Set new value for admin_role2section.id column in current Row.
     * 
     * @param int $IdFromAdminRole2sectionRow
     * @return void
     */
    public function setId($Id)
    {
        $this->__set("id", $Id);
    }

    /**
     * Return admin_role2section.id column value in current Row.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->__get("id");
    }

    /**
     * Set new value for admin_role2section.role_id column in current Row.
     * 
     * @param int $RoleIdFromAdminRole2sectionRow
     * @return void
     */
    public function setRoleId($RoleId)
    {
        $this->__set("role_id", $RoleId);
    }

    /**
     * Return admin_role2section.role_id column value in current Row.
     * 
     * @return int
     */
    public function getRoleId()
    {
        return $this->__get("role_id");
    }

    /**
     * Return parent row from table admin_role where admin_role2section.role_id =
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
     * Set new value for admin_role2section.section_id column in current Row.
     * 
     * @param int $SectionIdFromAdminRole2sectionRow
     * @return void
     */
    public function setSectionId($SectionId)
    {
        $this->__set("section_id", $SectionId);
    }

    /**
     * Return admin_role2section.section_id column value in current Row.
     * 
     * @return int
     */
    public function getSectionId()
    {
        return $this->__get("section_id");
    }

    /**
     * Return parent row from table admin_section where admin_role2section.section_id =
     * admin_section.id
     * 
     * @param Db_Select $selectFromAdminSection
     * @return AdminSectionRow
     */
    public function getAdminSectionRowBySectionId($select = null)
    {
        return $this->findParentRow('AdminSectionPeer', null, $select);
    }

    /**
     * Set new value for admin_role2section.permissions column in current Row.
     * 
     * @param varchar $PermissionsFromAdminRole2sectionRow
     * @return void
     */
    public function setPermissions($Permissions)
    {
        $this->__set("permissions", $Permissions);
    }

    /**
     * Return admin_role2section.permissions column value in current Row.
     * 
     * @return varchar
     */
    public function getPermissions()
    {
        return $this->__get("permissions");
    }


}

