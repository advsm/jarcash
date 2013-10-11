<?php

/**
 * Generated Model class.
 */
class Base_AdminUserRow extends Db_Row
{

    /**
     * Set new value for admin_user.id column in current Row.
     * 
     * @param int $IdFromAdminUserRow
     * @return void
     */
    public function setId($Id)
    {
        $this->__set("id", $Id);
    }

    /**
     * Return admin_user.id column value in current Row.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->__get("id");
    }

    /**
     * Set new value for admin_user.login column in current Row.
     * 
     * @param varchar $LoginFromAdminUserRow
     * @return void
     */
    public function setLogin($Login)
    {
        $this->__set("login", $Login);
    }

    /**
     * Return admin_user.login column value in current Row.
     * 
     * @return varchar
     */
    public function getLogin()
    {
        return $this->__get("login");
    }

    /**
     * Set new value for admin_user.password column in current Row.
     * 
     * @param varchar $PasswordFromAdminUserRow
     * @return void
     */
    public function setPassword($Password)
    {
        $this->__set("password", $Password);
    }

    /**
     * Return admin_user.password column value in current Row.
     * 
     * @return varchar
     */
    public function getPassword()
    {
        return $this->__get("password");
    }

    /**
     * Set new value for admin_user.email column in current Row.
     * 
     * @param varchar $EmailFromAdminUserRow
     * @return void
     */
    public function setEmail($Email)
    {
        $this->__set("email", $Email);
    }

    /**
     * Return admin_user.email column value in current Row.
     * 
     * @return varchar
     */
    public function getEmail()
    {
        return $this->__get("email");
    }

    /**
     * Set new value for admin_user.name column in current Row.
     * 
     * @param varchar $NameFromAdminUserRow
     * @return void
     */
    public function setName($Name)
    {
        $this->__set("name", $Name);
    }

    /**
     * Return admin_user.name column value in current Row.
     * 
     * @return varchar
     */
    public function getName()
    {
        return $this->__get("name");
    }

    /**
     * Set new value for admin_user.granted_ip column in current Row.
     * 
     * @param varchar $GrantedIpFromAdminUserRow
     * @return void
     */
    public function setGrantedIp($GrantedIp)
    {
        $this->__set("granted_ip", $GrantedIp);
    }

    /**
     * Return admin_user.granted_ip column value in current Row.
     * 
     * @return varchar
     */
    public function getGrantedIp()
    {
        return $this->__get("granted_ip");
    }

    /**
     * Set new value for admin_user.role_id column in current Row.
     * 
     * @param int $RoleIdFromAdminUserRow
     * @return void
     */
    public function setRoleId($RoleId)
    {
        $this->__set("role_id", $RoleId);
    }

    /**
     * Return admin_user.role_id column value in current Row.
     * 
     * @return int
     */
    public function getRoleId()
    {
        return $this->__get("role_id");
    }

    /**
     * Return parent row from table admin_role where admin_user.role_id = admin_role.id
     * 
     * @param Db_Select $selectFromAdminRole
     * @return AdminRoleRow
     */
    public function getAdminRoleRowByRoleId($select = null)
    {
        return $this->findParentRow('AdminRolePeer', null, $select);
    }

    /**
     * Set new value for admin_user.code column in current Row.
     * 
     * @param varchar $CodeFromAdminUserRow
     * @return void
     */
    public function setCode($Code)
    {
        $this->__set("code", $Code);
    }

    /**
     * Return admin_user.code column value in current Row.
     * 
     * @return varchar
     */
    public function getCode()
    {
        return $this->__get("code");
    }

    /**
     * Return dependent rowset from table AdminLock where AdminLock.AdminUserId
     * reference to admin_user table
     * 
     * @param Db_Select $select FromAdminLock
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getAdminLockRowsetByAdminUserId($select = null)
    {
        return $this->findDependentRowset('AdminLockPeer', null, $select);
    }

    /**
     * Return dependent rowset from table AdminLog where AdminLog.UserId reference to
     * admin_user table
     * 
     * @param Db_Select $select FromAdminLog
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getAdminLogRowsetByUserId($select = null)
    {
        return $this->findDependentRowset('AdminLogPeer', null, $select);
    }


}

