<?php

/**
 * Generated Model class.
 */
class Base_AdminSectionPeer extends Db_Peer implements ISingleton
{

    const ID = '`admin_section`.`id`';

    const KEY = '`admin_section`.`key`';

    const TABLE_NAME = '`admin_section`.`table_name`';

    const ACTION_NAME = '`admin_section`.`action_name`';

    const NAME = '`admin_section`.`name`';

    const GROUP_ID = '`admin_section`.`group_id`';

    const MAIN_PROPERTY = '`admin_section`.`main_property`';

    const VIEW_SCRIPT = '`admin_section`.`view_script`';

    const LIST_VIEW_SCRIPT = '`admin_section`.`list_view_script`';

    const ORDER = '`admin_section`.`order`';

    protected $_name = 'admin_section';

    protected $_rowClass = 'AdminSectionRow';

    protected $_dependentTables = array(
        'AdminLockPeer',
        'AdminRole2sectionPeer',
        'AdminSectionHandlerPeer',
        'AdminSectionPropertyPeer'
        );

    protected $_referenceMap = array('AdminSectionGroupGroupId' => array(
            'columns' => 'group_id',
            'refTableClass' => 'AdminSectionGroupPeer',
            'refColumns' => 'id'
            ));

    private static $_instance = null;

    protected $_metadata = array(
        'id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_section',
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
        'key' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_section',
            'COLUMN_NAME' => 'key',
            'COLUMN_POSITION' => 2,
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
        'table_name' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_section',
            'COLUMN_NAME' => 'table_name',
            'COLUMN_POSITION' => 3,
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
        'action_name' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_section',
            'COLUMN_NAME' => 'action_name',
            'COLUMN_POSITION' => 4,
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
            ),
        'name' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_section',
            'COLUMN_NAME' => 'name',
            'COLUMN_POSITION' => 5,
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
        'group_id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_section',
            'COLUMN_NAME' => 'group_id',
            'COLUMN_POSITION' => 6,
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
        'main_property' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_section',
            'COLUMN_NAME' => 'main_property',
            'COLUMN_POSITION' => 7,
            'DATA_TYPE' => 'varchar',
            'DEFAULT' => null,
            'NULLABLE' => true,
            'LENGTH' => '64',
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => null,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            ),
        'view_script' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_section',
            'COLUMN_NAME' => 'view_script',
            'COLUMN_POSITION' => 8,
            'DATA_TYPE' => 'varchar',
            'DEFAULT' => null,
            'NULLABLE' => true,
            'LENGTH' => '64',
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => null,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            ),
        'list_view_script' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_section',
            'COLUMN_NAME' => 'list_view_script',
            'COLUMN_POSITION' => 9,
            'DATA_TYPE' => 'varchar',
            'DEFAULT' => null,
            'NULLABLE' => true,
            'LENGTH' => '64',
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => null,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            ),
        'order' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_section',
            'COLUMN_NAME' => 'order',
            'COLUMN_POSITION' => 10,
            'DATA_TYPE' => 'int',
            'DEFAULT' => '0',
            'NULLABLE' => false,
            'LENGTH' => null,
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => null,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            )
        );

    /**
     * @return AdminSectionPeer
     */
    public static function getInstance()
    {
        if (!self::$_instance) {
        	self::$_instance = new AdminSectionPeer();
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
    public function findByKey($key)
    {
        $select = $this->select();
        $select->where('`key` = ?', $key);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByTableName($table_name)
    {
        $select = $this->select();
        $select->where('`table_name` = ?', $table_name);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByActionName($action_name)
    {
        $select = $this->select();
        $select->where('`action_name` = ?', $action_name);
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
    public function findByMainProperty($main_property)
    {
        $select = $this->select();
        $select->where('`main_property` = ?', $main_property);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByViewScript($view_script)
    {
        $select = $this->select();
        $select->where('`view_script` = ?', $view_script);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByListViewScript($list_view_script)
    {
        $select = $this->select();
        $select->where('`list_view_script` = ?', $list_view_script);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByOrder($order)
    {
        $select = $this->select();
        $select->where('`order` = ?', $order);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }


}

