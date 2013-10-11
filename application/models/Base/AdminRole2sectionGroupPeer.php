<?php

/**
 * Generated Model class.
 */
class Base_AdminRole2sectionGroupPeer extends Db_Peer implements ISingleton
{

    const ID = '`admin_role2section_group`.`id`';

    const ROLE_ID = '`admin_role2section_group`.`role_id`';

    const GROUP_ID = '`admin_role2section_group`.`group_id`';

    const PERMISSIONS = '`admin_role2section_group`.`permissions`';

    protected $_name = 'admin_role2section_group';

    protected $_rowClass = 'AdminRole2sectionGroupRow';

    protected $_dependentTables = array();

    protected $_referenceMap = array(
        'AdminRoleRoleId' => array(
            'columns' => 'role_id',
            'refTableClass' => 'AdminRolePeer',
            'refColumns' => 'id'
            ),
        'AdminSectionGroupGroupId' => array(
            'columns' => 'group_id',
            'refTableClass' => 'AdminSectionGroupPeer',
            'refColumns' => 'id'
            )
        );

    private static $_instance = null;

    protected $_metadata = array(
        'id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_role2section_group',
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
        'role_id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_role2section_group',
            'COLUMN_NAME' => 'role_id',
            'COLUMN_POSITION' => 2,
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
        'group_id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_role2section_group',
            'COLUMN_NAME' => 'group_id',
            'COLUMN_POSITION' => 3,
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
        'permissions' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_role2section_group',
            'COLUMN_NAME' => 'permissions',
            'COLUMN_POSITION' => 4,
            'DATA_TYPE' => 'varchar',
            'DEFAULT' => '0000',
            'NULLABLE' => false,
            'LENGTH' => '4',
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => null,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            )
        );

    /**
     * @return AdminRole2sectionGroupPeer
     */
    public static function getInstance()
    {
        if (!self::$_instance) {
        	self::$_instance = new AdminRole2sectionGroupPeer();
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
    public function findByGroupId($group_id)
    {
        $select = $this->select();
        $select->where('`group_id` = ?', $group_id);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByPermissions($permissions)
    {
        $select = $this->select();
        $select->where('`permissions` = ?', $permissions);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }


}

