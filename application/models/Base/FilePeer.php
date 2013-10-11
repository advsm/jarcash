<?php

/**
 * Generated Model class.
 */
class Base_FilePeer extends Db_Peer implements ISingleton
{

    const ID = '`file`.`id`';

    const PATH = '`file`.`path`';

    protected $_name = 'file';

    protected $_rowClass = 'FileRow';

    protected $_dependentTables = array('MidletPeer');

    protected $_referenceMap = array();

    private static $_instance = null;

    protected $_metadata = array(
        'id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'file',
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
        'path' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'file',
            'COLUMN_NAME' => 'path',
            'COLUMN_POSITION' => 2,
            'DATA_TYPE' => 'varchar',
            'DEFAULT' => null,
            'NULLABLE' => false,
            'LENGTH' => '128',
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => null,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            )
        );

    /**
     * @return FilePeer
     */
    public static function getInstance()
    {
        if (!self::$_instance) {
        	self::$_instance = new FilePeer();
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
    public function findByPath($path)
    {
        $select = $this->select();
        $select->where('`path` = ?', $path);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }


}

