<?php

/**
 * Generated Model class.
 */
class Base_SmsStatisticPeer extends Db_Peer implements ISingleton
{

    const ID = '`sms_statistic`.`id`';

    const MSISDN = '`sms_statistic`.`msisdn`';

    const SMS_NUMBER = '`sms_statistic`.`sms_number`';

    const MIDLET_ID = '`sms_statistic`.`midlet_id`';

    const DATETIME = '`sms_statistic`.`datetime`';

    protected $_name = 'sms_statistic';

    protected $_rowClass = 'SmsStatisticRow';

    protected $_dependentTables = array();

    protected $_referenceMap = array('MidletMidletId' => array(
            'columns' => 'midlet_id',
            'refTableClass' => 'MidletPeer',
            'refColumns' => 'id'
            ));

    private static $_instance = null;

    protected $_metadata = array(
        'id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'sms_statistic',
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
        'msisdn' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'sms_statistic',
            'COLUMN_NAME' => 'msisdn',
            'COLUMN_POSITION' => 2,
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
        'sms_number' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'sms_statistic',
            'COLUMN_NAME' => 'sms_number',
            'COLUMN_POSITION' => 3,
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
        'midlet_id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'sms_statistic',
            'COLUMN_NAME' => 'midlet_id',
            'COLUMN_POSITION' => 4,
            'DATA_TYPE' => 'int',
            'DEFAULT' => null,
            'NULLABLE' => false,
            'LENGTH' => null,
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => null,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            ),
        'datetime' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'sms_statistic',
            'COLUMN_NAME' => 'datetime',
            'COLUMN_POSITION' => 5,
            'DATA_TYPE' => 'timestamp',
            'DEFAULT' => 'CURRENT_TIMESTAMP',
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
     * @return SmsStatisticPeer
     */
    public static function getInstance()
    {
        if (!self::$_instance) {
        	self::$_instance = new SmsStatisticPeer();
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
    public function findByMsisdn($msisdn)
    {
        $select = $this->select();
        $select->where('`msisdn` = ?', $msisdn);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findBySmsNumber($sms_number)
    {
        $select = $this->select();
        $select->where('`sms_number` = ?', $sms_number);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByMidletId($midlet_id)
    {
        $select = $this->select();
        $select->where('`midlet_id` = ?', $midlet_id);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByDatetime($datetime)
    {
        $select = $this->select();
        $select->where('`datetime` = ?', $datetime);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }


}

