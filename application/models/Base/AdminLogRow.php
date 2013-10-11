<?php

/**
 * Generated Model class.
 */
class Base_AdminLogRow extends Db_Row
{

    /**
     * Set new value for admin_log.id column in current Row.
     * 
     * @param int $IdFromAdminLogRow
     * @return void
     */
    public function setId($Id)
    {
        $this->__set("id", $Id);
    }

    /**
     * Return admin_log.id column value in current Row.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->__get("id");
    }

    /**
     * Set new value for admin_log.user_id column in current Row.
     * 
     * @param int $UserIdFromAdminLogRow
     * @return void
     */
    public function setUserId($UserId)
    {
        $this->__set("user_id", $UserId);
    }

    /**
     * Return admin_log.user_id column value in current Row.
     * 
     * @return int
     */
    public function getUserId()
    {
        return $this->__get("user_id");
    }

    /**
     * Return parent row from table admin_user where admin_log.user_id = admin_user.id
     * 
     * @param Db_Select $selectFromAdminUser
     * @return AdminUserRow
     */
    public function getAdminUserRowByUserId($select = null)
    {
        return $this->findParentRow('AdminUserPeer', null, $select);
    }

    /**
     * Set new value for admin_log.log column in current Row.
     * 
     * @param varchar $LogFromAdminLogRow
     * @return void
     */
    public function setLog($Log)
    {
        $this->__set("log", $Log);
    }

    /**
     * Return admin_log.log column value in current Row.
     * 
     * @return varchar
     */
    public function getLog()
    {
        return $this->__get("log");
    }

    /**
     * Set new value for admin_log.created column in current Row.
     * 
     * @param timestamp $CreatedFromAdminLogRow
     * @return void
     */
    public function setCreated($Created)
    {
        $this->__set("created", $Created);
    }

    /**
     * Return admin_log.created column value in current Row.
     * 
     * @return timestamp
     */
    public function getCreated()
    {
        return $this->__get("created");
    }

    /**
     * Set new value for admin_log.changed_table column in current Row.
     * 
     * @param varchar $ChangedTableFromAdminLogRow
     * @return void
     */
    public function setChangedTable($ChangedTable)
    {
        $this->__set("changed_table", $ChangedTable);
    }

    /**
     * Return admin_log.changed_table column value in current Row.
     * 
     * @return varchar
     */
    public function getChangedTable()
    {
        return $this->__get("changed_table");
    }

    /**
     * Set new value for admin_log.changed_columns column in current Row.
     * 
     * @param varchar $ChangedColumnsFromAdminLogRow
     * @return void
     */
    public function setChangedColumns($ChangedColumns)
    {
        $this->__set("changed_columns", $ChangedColumns);
    }

    /**
     * Return admin_log.changed_columns column value in current Row.
     * 
     * @return varchar
     */
    public function getChangedColumns()
    {
        return $this->__get("changed_columns");
    }

    /**
     * Set new value for admin_log.changed_row column in current Row.
     * 
     * @param int $ChangedRowFromAdminLogRow
     * @return void
     */
    public function setChangedRow($ChangedRow)
    {
        $this->__set("changed_row", $ChangedRow);
    }

    /**
     * Return admin_log.changed_row column value in current Row.
     * 
     * @return int
     */
    public function getChangedRow()
    {
        return $this->__get("changed_row");
    }


}

