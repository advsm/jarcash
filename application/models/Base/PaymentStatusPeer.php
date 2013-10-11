<?php

/**
 * Generated Model class.
 */
class Base_PaymentStatusPeer extends Db_Peer implements ISingleton
{

    const ID = '`payment_status`.`id`';

    const KEY = '`payment_status`.`key`';

    const NAME = '`payment_status`.`name`';

    protected $_name = 'payment_status';

    protected $_rowClass = 'PaymentStatusRow';

    protected $_dependentTables = array('ProfilePaymentPeer');

    protected $_referenceMap = array();

    private static $_instance = null;

    protected $_metadata = array(
        'id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'payment_status',
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
            'TABLE_NAME' => 'payment_status',
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
            'TABLE_NAME' => 'payment_status',
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
     * @return PaymentStatusPeer
     */
    public static function getInstance()
    {
        if (!self::$_instance) {
        	self::$_instance = new PaymentStatusPeer();
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

