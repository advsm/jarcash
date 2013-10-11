<?php

/**
 * Generated Model class.
 */
class Base_TicketStatusPeer extends Db_Peer implements ISingleton
{

    const ID = '`ticket_status`.`id`';

    const KEY = '`ticket_status`.`key`';

    const NAME = '`ticket_status`.`name`';

    protected $_name = 'ticket_status';

    protected $_rowClass = 'TicketStatusRow';

    protected $_dependentTables = array('TicketPeer');

    protected $_referenceMap = array();

    private static $_instance = null;

    protected $_metadata = array(
        'id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'ticket_status',
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
            'TABLE_NAME' => 'ticket_status',
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
        'name' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'ticket_status',
            'COLUMN_NAME' => 'name',
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
            )
        );

    /**
     * @return TicketStatusPeer
     */
    public static function getInstance()
    {
        if (!self::$_instance) {
        	self::$_instance = new TicketStatusPeer();
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
    public function findByName($name)
    {
        $select = $this->select();
        $select->where('`name` = ?', $name);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }


}

