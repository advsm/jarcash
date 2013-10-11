<?php

/**
 * Generated Model class.
 */
class Base_MidletTypePeer extends Db_Peer implements ISingleton
{

    const ID = '`midlet_type`.`id`';

    const KEY = '`midlet_type`.`key`';

    const VERSION = '`midlet_type`.`version`';

    const NAME = '`midlet_type`.`name`';

    const DESCRIPTION = '`midlet_type`.`description`';

    protected $_name = 'midlet_type';

    protected $_rowClass = 'MidletTypeRow';

    protected $_dependentTables = array('MidletPeer');

    protected $_referenceMap = array();

    private static $_instance = null;

    protected $_metadata = array(
        'id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'midlet_type',
            'COLUMN_NAME' => 'id',
            'COLUMN_POSITION' => 1,
            'DATA_TYPE' => 'int',
            'DEFAULT' => null,
            'NULLABLE' => false,
            'LENGTH' => null,
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => null,
            'PRIMARY' => true,
            'PRIMARY_POSITION' => 1,
            'IDENTITY' => true
            ),
        'key' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'midlet_type',
            'COLUMN_NAME' => 'key',
            'COLUMN_POSITION' => 2,
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
        'version' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'midlet_type',
            'COLUMN_NAME' => 'version',
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
        'name' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'midlet_type',
            'COLUMN_NAME' => 'name',
            'COLUMN_POSITION' => 4,
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
        'description' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'midlet_type',
            'COLUMN_NAME' => 'description',
            'COLUMN_POSITION' => 5,
            'DATA_TYPE' => 'text',
            'DEFAULT' => null,
            'NULLABLE' => true,
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
     * @return MidletTypePeer
     */
    public static function getInstance()
    {
        if (!self::$_instance) {
        	self::$_instance = new MidletTypePeer();
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
    public function findByVersion($version)
    {
        $select = $this->select();
        $select->where('`version` = ?', $version);
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
    public function findByDescription($description)
    {
        $select = $this->select();
        $select->where('`description` = ?', $description);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }


}

