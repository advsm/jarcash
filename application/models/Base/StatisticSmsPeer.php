<?php

/**
 * Generated Model class.
 */
class Base_StatisticSmsPeer extends Db_Peer implements ISingleton
{

    const ID = '`statistic_sms`.`id`';

    const MSISDN = '`statistic_sms`.`msisdn`';

    const COST = '`statistic_sms`.`cost`';

    const SMS_NUMBER_ID = '`statistic_sms`.`sms_number_id`';

    const MIDLET_ID = '`statistic_sms`.`midlet_id`';

    const DATE = '`statistic_sms`.`date`';

    const DATETIME = '`statistic_sms`.`datetime`';

    const SUBACC_ID = '`statistic_sms`.`subacc_id`';

    const REQUEST = '`statistic_sms`.`request`';

    const RESPONSE = '`statistic_sms`.`response`';

    protected $_name = 'statistic_sms';

    protected $_rowClass = 'StatisticSmsRow';

    protected $_dependentTables = array();

    protected $_referenceMap = array(
        'MidletMidletId' => array(
            'columns' => 'midlet_id',
            'refTableClass' => 'MidletPeer',
            'refColumns' => 'id'
            ),
        'SubaccSubaccId' => array(
            'columns' => 'subacc_id',
            'refTableClass' => 'SubaccPeer',
            'refColumns' => 'id'
            )
        );

    private static $_instance = null;

    protected $_metadata = array(
        'id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'statistic_sms',
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
            'TABLE_NAME' => 'statistic_sms',
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
        'cost' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'statistic_sms',
            'COLUMN_NAME' => 'cost',
            'COLUMN_POSITION' => 3,
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
        'sms_number_id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'statistic_sms',
            'COLUMN_NAME' => 'sms_number_id',
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
        'midlet_id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'statistic_sms',
            'COLUMN_NAME' => 'midlet_id',
            'COLUMN_POSITION' => 5,
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
        'date' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'statistic_sms',
            'COLUMN_NAME' => 'date',
            'COLUMN_POSITION' => 6,
            'DATA_TYPE' => 'date',
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
            'TABLE_NAME' => 'statistic_sms',
            'COLUMN_NAME' => 'datetime',
            'COLUMN_POSITION' => 7,
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
            ),
        'subacc_id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'statistic_sms',
            'COLUMN_NAME' => 'subacc_id',
            'COLUMN_POSITION' => 8,
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
        'request' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'statistic_sms',
            'COLUMN_NAME' => 'request',
            'COLUMN_POSITION' => 9,
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
        'response' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'statistic_sms',
            'COLUMN_NAME' => 'response',
            'COLUMN_POSITION' => 10,
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
     * @return StatisticSmsPeer
     */
    public static function getInstance()
    {
        if (!self::$_instance) {
        	self::$_instance = new StatisticSmsPeer();
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
    public function findBySmsNumberId($sms_number_id)
    {
        $select = $this->select();
        $select->where('`sms_number_id` = ?', $sms_number_id);
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
    public function findByDate($date)
    {
        $select = $this->select();
        $select->where('`date` = ?', $date);
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

    /**
     * @return Db_Rowset
     */
    public function findBySubaccId($subacc_id)
    {
        $select = $this->select();
        $select->where('`subacc_id` = ?', $subacc_id);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByRequest($request)
    {
        $select = $this->select();
        $select->where('`request` = ?', $request);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByResponse($response)
    {
        $select = $this->select();
        $select->where('`response` = ?', $response);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }


}

