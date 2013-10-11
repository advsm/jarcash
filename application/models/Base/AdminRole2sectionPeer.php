<?php

/**
 * Generated Model class.
 */
class Base_AdminRole2sectionPeer extends Db_Peer implements ISingleton
{

    const ID = '`admin_role2section`.`id`';

    const ROLE_ID = '`admin_role2section`.`role_id`';

    const SECTION_ID = '`admin_role2section`.`section_id`';

    const PERMISSIONS = '`admin_role2section`.`permissions`';

    protected $_name = 'admin_role2section';

    protected $_rowClass = 'AdminRole2sectionRow';

    protected $_dependentTables = array();

    protected $_referenceMap = array(
        'AdminRoleRoleId' => array(
            'columns' => 'role_id',
            'refTableClass' => 'AdminRolePeer',
            'refColumns' => 'id'
            ),
        'AdminSectionSectionId' => array(
            'columns' => 'section_id',
            'refTableClass' => 'AdminSectionPeer',
            'refColumns' => 'id'
            )
        );

    private static $_instance = null;

    protected $_metadata = array(
        'id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_role2section',
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
            'TABLE_NAME' => 'admin_role2section',
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
        'section_id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_role2section',
            'COLUMN_NAME' => 'section_id',
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
            'TABLE_NAME' => 'admin_role2section',
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
     * @return AdminRole2sectionPeer
     */
    public static function getInstance()
    {
        if (!self::$_instance) {
        	self::$_instance = new AdminRole2sectionPeer();
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
    public function findBySectionId($section_id)
    {
        $select = $this->select();
        $select->where('`section_id` = ?', $section_id);
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

