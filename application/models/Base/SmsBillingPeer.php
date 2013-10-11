<?php

/**
 * Generated Model class.
 */
class Base_SmsBillingPeer extends Db_Peer implements ISingleton
{

    const ID = '`sms_billing`.`id`';

    const NAME = '`sms_billing`.`name`';

    const URL = '`sms_billing`.`url`';

    const PREFIX = '`sms_billing`.`prefix`';

    const ACTIVE = '`sms_billing`.`active`';

    protected $_name = 'sms_billing';

    protected $_rowClass = 'SmsBillingRow';

    protected $_dependentTables = array('SmsNumberPeer');

    protected $_referenceMap = array();

    private static $_instance = null;

    protected $_metadata = array(
        'id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'sms_billing',
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
        'name' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'sms_billing',
            'COLUMN_NAME' => 'name',
            'COLUMN_POSITION' => 2,
            'DATA_TYPE' => 'varchar',
            'DEFAULT' => null,
            'NULLABLE' => false,
            'LENGTH' => '11',
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => null,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            ),
        'url' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'sms_billing',
            'COLUMN_NAME' => 'url',
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
        'prefix' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'sms_billing',
            'COLUMN_NAME' => 'prefix',
            'COLUMN_POSITION' => 4,
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
        'active' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'sms_billing',
            'COLUMN_NAME' => 'active',
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
            )
        );

    /**
     * @return SmsBillingPeer
     */
    public static function getInstance()
    {
        if (!self::$_instance) {
        	self::$_instance = new SmsBillingPeer();
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
    public function findByUrl($url)
    {
        $select = $this->select();
        $select->where('`url` = ?', $url);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByPrefix($prefix)
    {
        $select = $this->select();
        $select->where('`prefix` = ?', $prefix);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByActive($active)
    {
        $select = $this->select();
        $select->where('`active` = ?', $active);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }


}

