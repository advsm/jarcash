<?php

/**
 * Generated Model class.
 */
class Base_AdminSectionPropertyFilterPeer extends Db_Peer implements ISingleton
{

    const ID = '`admin_section_property_filter`.`id`';

    const PROPERTY_ID = '`admin_section_property_filter`.`property_id`';

    const CLASS_NAME = '`admin_section_property_filter`.`class_name`';

    protected $_name = 'admin_section_property_filter';

    protected $_rowClass = 'AdminSectionPropertyFilterRow';

    protected $_dependentTables = array();

    protected $_referenceMap = array('AdminSectionPropertyPropertyId' => array(
            'columns' => 'property_id',
            'refTableClass' => 'AdminSectionPropertyPeer',
            'refColumns' => 'id'
            ));

    private static $_instance = null;

    protected $_metadata = array(
        'id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_section_property_filter',
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
        'property_id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_section_property_filter',
            'COLUMN_NAME' => 'property_id',
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
        'class_name' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_section_property_filter',
            'COLUMN_NAME' => 'class_name',
            'COLUMN_POSITION' => 3,
            'DATA_TYPE' => 'varchar',
            'DEFAULT' => null,
            'NULLABLE' => false,
            'LENGTH' => '65',
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => null,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            )
        );

    /**
     * @return AdminSectionPropertyFilterPeer
     */
    public static function getInstance()
    {
        if (!self::$_instance) {
        	self::$_instance = new AdminSectionPropertyFilterPeer();
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
    public function findByPropertyId($property_id)
    {
        $select = $this->select();
        $select->where('`property_id` = ?', $property_id);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByClassName($class_name)
    {
        $select = $this->select();
        $select->where('`class_name` = ?', $class_name);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }


}

