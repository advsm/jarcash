<?php

/**
 * Generated Model class.
 */
class Base_SmsNumberPeer extends Db_Peer implements ISingleton
{

    const ID = '`sms_number`.`id`';

    const NUMBER = '`sms_number`.`number`';

    const NAME = '`sms_number`.`name`';

    const AGREEMENT = '`sms_number`.`agreement`';

    const COST = '`sms_number`.`cost`';

    const SMS_BILLING_ID = '`sms_number`.`sms_billing_id`';

    const ACTIVE = '`sms_number`.`active`';

    protected $_name = 'sms_number';

    protected $_rowClass = 'SmsNumberRow';

    protected $_dependentTables = array('MidletPeer');

    protected $_referenceMap = array('SmsBillingSmsBillingId' => array(
            'columns' => 'sms_billing_id',
            'refTableClass' => 'SmsBillingPeer',
            'refColumns' => 'id'
            ));

    private static $_instance = null;

    protected $_metadata = array(
        'id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'sms_number',
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
        'number' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'sms_number',
            'COLUMN_NAME' => 'number',
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
        'name' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'sms_number',
            'COLUMN_NAME' => 'name',
            'COLUMN_POSITION' => 3,
            'DATA_TYPE' => 'varchar',
            'DEFAULT' => null,
            'NULLABLE' => false,
            'LENGTH' => '12',
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => null,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            ),
        'agreement' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'sms_number',
            'COLUMN_NAME' => 'agreement',
            'COLUMN_POSITION' => 4,
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
            ),
        'cost' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'sms_number',
            'COLUMN_NAME' => 'cost',
            'COLUMN_POSITION' => 5,
            'DATA_TYPE' => 'float',
            'DEFAULT' => null,
            'NULLABLE' => false,
            'LENGTH' => null,
            'SCALE' => '2',
            'PRECISION' => '5',
            'UNSIGNED' => null,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            ),
        'sms_billing_id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'sms_number',
            'COLUMN_NAME' => 'sms_billing_id',
            'COLUMN_POSITION' => 6,
            'DATA_TYPE' => 'int',
            'DEFAULT' => null,
            'NULLABLE' => true,
            'LENGTH' => null,
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => null,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            ),
        'active' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'sms_number',
            'COLUMN_NAME' => 'active',
            'COLUMN_POSITION' => 7,
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
     * @return SmsNumberPeer
     */
    public static function getInstance()
    {
        if (!self::$_instance) {
        	self::$_instance = new SmsNumberPeer();
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
    public function findByNumber($number)
    {
        $select = $this->select();
        $select->where('`number` = ?', $number);
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
    public function findByAgreement($agreement)
    {
        $select = $this->select();
        $select->where('`agreement` = ?', $agreement);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByCost($cost)
    {
        $select = $this->select();
        $select->where('`cost` = ?', $cost);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findBySmsBillingId($sms_billing_id)
    {
        $select = $this->select();
        $select->where('`sms_billing_id` = ?', $sms_billing_id);
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

