<?php

/**
 * Generated Model class.
 */
class Base_AdminLockRow extends Db_Row
{

    /**
     * Set new value for admin_lock.id column in current Row.
     * 
     * @param int $IdFromAdminLockRow
     * @return void
     */
    public function setId($Id)
    {
        $this->__set("id", $Id);
    }

    /**
     * Return admin_lock.id column value in current Row.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->__get("id");
    }

    /**
     * Set new value for admin_lock.section_id column in current Row.
     * 
     * @param int $SectionIdFromAdminLockRow
     * @return void
     */
    public function setSectionId($SectionId)
    {
        $this->__set("section_id", $SectionId);
    }

    /**
     * Return admin_lock.section_id column value in current Row.
     * 
     * @return int
     */
    public function getSectionId()
    {
        return $this->__get("section_id");
    }

    /**
     * Return parent row from table admin_section where admin_lock.section_id =
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
     * Set new value for admin_lock.row_id column in current Row.
     * 
     * @param int $RowIdFromAdminLockRow
     * @return void
     */
    public function setRowId($RowId)
    {
        $this->__set("row_id", $RowId);
    }

    /**
     * Return admin_lock.row_id column value in current Row.
     * 
     * @return int
     */
    public function getRowId()
    {
        return $this->__get("row_id");
    }

    /**
     * Set new value for admin_lock.admin_user_id column in current Row.
     * 
     * @param int $AdminUserIdFromAdminLockRow
     * @return void
     */
    public function setAdminUserId($AdminUserId)
    {
        $this->__set("admin_user_id", $AdminUserId);
    }

    /**
     * Return admin_lock.admin_user_id column value in current Row.
     * 
     * @return int
     */
    public function getAdminUserId()
    {
        return $this->__get("admin_user_id");
    }

    /**
     * Return parent row from table admin_user where admin_lock.admin_user_id =
     * admin_user.id
     * 
     * @param Db_Select $selectFromAdminUser
     * @return AdminUserRow
     */
    public function getAdminUserRowByAdminUserId($select = null)
    {
        return $this->findParentRow('AdminUserPeer', null, $select);
    }

    /**
     * Set new value for admin_lock.created column in current Row.
     * 
     * @param timestamp $CreatedFromAdminLockRow
     * @return void
     */
    public function setCreated($Created)
    {
        $this->__set("created", $Created);
    }

    /**
     * Return admin_lock.created column value in current Row.
     * 
     * @return timestamp
     */
    public function getCreated()
    {
        return $this->__get("created");
    }


}

