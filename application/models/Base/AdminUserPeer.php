<?php

/**
 * Generated Model class.
 */
class Base_AdminUserPeer extends Db_Peer implements ISingleton
{

    const ID = '`admin_user`.`id`';

    const LOGIN = '`admin_user`.`login`';

    const PASSWORD = '`admin_user`.`password`';

    const EMAIL = '`admin_user`.`email`';

    const NAME = '`admin_user`.`name`';

    const GRANTED_IP = '`admin_user`.`granted_ip`';

    const ROLE_ID = '`admin_user`.`role_id`';

    const CODE = '`admin_user`.`code`';

    protected $_name = 'admin_user';

    protected $_rowClass = 'AdminUserRow';

    protected $_dependentTables = array(
        'AdminLockPeer',
        'AdminLogPeer'
        );

    protected $_referenceMap = array('AdminRoleRoleId' => array(
            'columns' => 'role_id',
            'refTableClass' => 'AdminRolePeer',
            'refColumns' => 'id'
            ));

    private static $_instance = null;

    protected $_metadata = array(
        'id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_user',
            'COLUMN_NAME' => 'id',
            'COLUMN_POSITION' => 1,
            'DATA_TYPE' => 'int',
            'DEFAULT' => null,
            'NULLABLE' => false,
            'LENGTH' => null,
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => true,
            'PRIMARY' => true,
            'PRIMARY_POSITION' => 1,
            'IDENTITY' => true
            ),
        'login' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_user',
            'COLUMN_NAME' => 'login',
            'COLUMN_POSITION' => 2,
            'DATA_TYPE' => 'varchar',
            'DEFAULT' => null,
            'NULLABLE' => false,
            'LENGTH' => '16',
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => null,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            ),
        'password' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_user',
            'COLUMN_NAME' => 'password',
            'COLUMN_POSITION' => 3,
            'DATA_TYPE' => 'varchar',
            'DEFAULT' => null,
            'NULLABLE' => false,
            'LENGTH' => '32',
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => null,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            ),
        'email' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_user',
            'COLUMN_NAME' => 'email',
            'COLUMN_POSITION' => 4,
            'DATA_TYPE' => 'varchar',
            'DEFAULT' => null,
            'NULLABLE' => false,
            'LENGTH' => '64',
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => null,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            ),
        'name' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_user',
            'COLUMN_NAME' => 'name',
            'COLUMN_POSITION' => 5,
            'DATA_TYPE' => 'varchar',
            'DEFAULT' => null,
            'NULLABLE' => true,
            'LENGTH' => '255',
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => null,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            ),
        'granted_ip' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_user',
            'COLUMN_NAME' => 'granted_ip',
            'COLUMN_POSITION' => 6,
            'DATA_TYPE' => 'varchar',
            'DEFAULT' => '*',
            'NULLABLE' => false,
            'LENGTH' => '255',
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => null,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            ),
        'role_id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_user',
            'COLUMN_NAME' => 'role_id',
            'COLUMN_POSITION' => 7,
            'DATA_TYPE' => 'int',
            'DEFAULT' => null,
            'NULLABLE' => false,
            'LENGTH' => null,
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => true,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            ),
        'code' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_user',
            'COLUMN_NAME' => 'code',
            'COLUMN_POSITION' => 8,
            'DATA_TYPE' => 'varchar',
            'DEFAULT' => null,
            'NULLABLE' => true,
            'LENGTH' => '32',
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => null,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            )
        );

    /**
     * @return AdminUserPeer
     */
    public static function getInstance()
    {
        if (!self::$_instance) {
        	self::$_instance = new AdminUserPeer();
        }
        return self::$_instance;
    }

    /**
     * @return Db_Rowset
     */
    public function findById($id)
    {
        $select = $this->select();
        $select->where('`id` = ?', $id);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByLogin($login)
    {
        $select = $this->select();
        $select->where('`login` = ?', $login);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByPassword($password)
    {
        $select = $this->select();
        $select->where('`password` = ?', $password);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByEmail($email)
    {
        $select = $this->select();
        $select->where('`email` = ?', $email);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByName($name)
    {
        $select = $this->select();
        $select->where('`name` = ?', $name);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByGrantedIp($granted_ip)
    {
        $select = $this->select();
        $select->where('`granted_ip` = ?', $granted_ip);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByRoleId($role_id)
    {
        $select = $this->select();
        $select->where('`role_id` = ?', $role_id);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByCode($code)
    {
        $select = $this->select();
        $select->where('`code` = ?', $code);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }


}

