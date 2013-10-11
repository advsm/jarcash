<?php

/**
 * Generated Model class.
 */
class Base_AdminSectionPropertyPeer extends Db_Peer implements ISingleton
{

    const ID = '`admin_section_property`.`id`';

    const SECTION_ID = '`admin_section_property`.`section_id`';

    const KEY = '`admin_section_property`.`key`';

    const NAME = '`admin_section_property`.`name`';

    const SHOW_IN_LIST = '`admin_section_property`.`show_in_list`';

    const SHOW_IN_ITEM = '`admin_section_property`.`show_in_item`';

    const DEFAULT_VALUE = '`admin_section_property`.`default_value`';

    const DESCRIPTION = '`admin_section_property`.`description`';

    const ELEMENT_CLASS = '`admin_section_property`.`element_class`';

    const ORDER = '`admin_section_property`.`order`';

    protected $_name = 'admin_section_property';

    protected $_rowClass = 'AdminSectionPropertyRow';

    protected $_dependentTables = array(
        'AdminSectionPropertyFilterPeer',
        'AdminSectionPropertyValidatorPeer'
        );

    protected $_referenceMap = array('AdminSectionSectionId' => array(
            'columns' => 'section_id',
            'refTableClass' => 'AdminSectionPeer',
            'refColumns' => 'id'
            ));

    private static $_instance = null;

    protected $_metadata = array(
        'id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_section_property',
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
        'section_id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_section_property',
            'COLUMN_NAME' => 'section_id',
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
        'key' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_section_property',
            'COLUMN_NAME' => 'key',
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
        'name' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_section_property',
            'COLUMN_NAME' => 'name',
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
        'show_in_list' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_section_property',
            'COLUMN_NAME' => 'show_in_list',
            'COLUMN_POSITION' => 5,
            'DATA_TYPE' => 'tinyint',
            'DEFAULT' => '0',
            'NULLABLE' => false,
            'LENGTH' => null,
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => true,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            ),
        'show_in_item' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_section_property',
            'COLUMN_NAME' => 'show_in_item',
            'COLUMN_POSITION' => 6,
            'DATA_TYPE' => 'tinyint',
            'DEFAULT' => '0',
            'NULLABLE' => false,
            'LENGTH' => null,
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => true,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            ),
        'default_value' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_section_property',
            'COLUMN_NAME' => 'default_value',
            'COLUMN_POSITION' => 7,
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
        'description' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_section_property',
            'COLUMN_NAME' => 'description',
            'COLUMN_POSITION' => 8,
            'DATA_TYPE' => 'varchar',
            'DEFAULT' => null,
            'NULLABLE' => true,
            'LENGTH' => '1024',
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => null,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            ),
        'element_class' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_section_property',
            'COLUMN_NAME' => 'element_class',
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
            'TABLE_NAME' => 'admin_section_property',
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
     * @return AdminSectionPropertyPeer
     */
    public static function getInstance()
    {
        if (!self::$_instance) {
        	self::$_instance = new AdminSectionPropertyPeer();
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
    public function findByShowInList($show_in_list)
    {
        $select = $this->select();
        $select->where('`show_in_list` = ?', $show_in_list);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByShowInItem($show_in_item)
    {
        $select = $this->select();
        $select->where('`show_in_item` = ?', $show_in_item);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByDefaultValue($default_value)
    {
        $select = $this->select();
        $select->where('`default_value` = ?', $default_value);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByDescription($description)
    {
        $select = $this->select();
        $select->where('`description` = ?', $description);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByElementClass($element_class)
    {
        $select = $this->select();
        $select->where('`element_class` = ?', $element_class);
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

