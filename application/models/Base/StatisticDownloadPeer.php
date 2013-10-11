<?php

/**
 * Generated Model class.
 */
class Base_StatisticDownloadPeer extends Db_Peer implements ISingleton
{

    const ID = '`statistic_download`.`id`';

    const IP = '`statistic_download`.`ip`';

    const REFERER = '`statistic_download`.`referer`';

    const USER_AGENT = '`statistic_download`.`user_agent`';

    const PROFILE_ID = '`statistic_download`.`profile_id`';

    const MIDLET_ID = '`statistic_download`.`midlet_id`';

    const SUBACC_ID = '`statistic_download`.`subacc_id`';

    const DATE = '`statistic_download`.`date`';

    const DATETIME = '`statistic_download`.`datetime`';

    protected $_name = 'statistic_download';

    protected $_rowClass = 'StatisticDownloadRow';

    protected $_dependentTables = array();

    protected $_referenceMap = array(
        'ProfileProfileId' => array(
            'columns' => 'profile_id',
            'refTableClass' => 'ProfilePeer',
            'refColumns' => 'id'
            ),
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
            'TABLE_NAME' => 'statistic_download',
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
        'ip' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'statistic_download',
            'COLUMN_NAME' => 'ip',
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
        'referer' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'statistic_download',
            'COLUMN_NAME' => 'referer',
            'COLUMN_POSITION' => 3,
            'DATA_TYPE' => 'varchar',
            'DEFAULT' => null,
            'NULLABLE' => true,
            'LENGTH' => '256',
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => null,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            ),
        'user_agent' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'statistic_download',
            'COLUMN_NAME' => 'user_agent',
            'COLUMN_POSITION' => 4,
            'DATA_TYPE' => 'varchar',
            'DEFAULT' => null,
            'NULLABLE' => true,
            'LENGTH' => '256',
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => null,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            ),
        'profile_id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'statistic_download',
            'COLUMN_NAME' => 'profile_id',
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
        'midlet_id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'statistic_download',
            'COLUMN_NAME' => 'midlet_id',
            'COLUMN_POSITION' => 6,
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
        'subacc_id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'statistic_download',
            'COLUMN_NAME' => 'subacc_id',
            'COLUMN_POSITION' => 7,
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
            'TABLE_NAME' => 'statistic_download',
            'COLUMN_NAME' => 'date',
            'COLUMN_POSITION' => 8,
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
            'TABLE_NAME' => 'statistic_download',
            'COLUMN_NAME' => 'datetime',
            'COLUMN_POSITION' => 9,
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
     * @return StatisticDownloadPeer
     */
    public static function getInstance()
    {
        if (!self::$_instance) {
        	self::$_instance = new StatisticDownloadPeer();
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
    public function findByIp($ip)
    {
        $select = $this->select();
        $select->where('`ip` = ?', $ip);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByReferer($referer)
    {
        $select = $this->select();
        $select->where('`referer` = ?', $referer);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByUserAgent($user_agent)
    {
        $select = $this->select();
        $select->where('`user_agent` = ?', $user_agent);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByProfileId($profile_id)
    {
        $select = $this->select();
        $select->where('`profile_id` = ?', $profile_id);
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


}

