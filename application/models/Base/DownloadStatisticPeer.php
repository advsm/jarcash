<?php

/**
 * Generated Model class.
 */
class Base_DownloadStatisticPeer extends Db_Peer implements ISingleton
{

    const ID = '`download_statistic`.`id`';

    const MIDLET_ID = '`download_statistic`.`midlet_id`';

    const REFERER = '`download_statistic`.`referer`';

    const DATETIME = '`download_statistic`.`datetime`';

    protected $_name = 'download_statistic';

    protected $_rowClass = 'DownloadStatisticRow';

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
            'TABLE_NAME' => 'download_statistic',
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
        'midlet_id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'download_statistic',
            'COLUMN_NAME' => 'midlet_id',
            'COLUMN_POSITION' => 2,
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
        'referer' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'download_statistic',
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
        'datetime' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'download_statistic',
            'COLUMN_NAME' => 'datetime',
            'COLUMN_POSITION' => 4,
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
     * @return DownloadStatisticPeer
     */
    public static function getInstance()
    {
        if (!self::$_instance) {
        	self::$_instance = new DownloadStatisticPeer();
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
    public function findByDatetime($datetime)
    {
        $select = $this->select();
        $select->where('`datetime` = ?', $datetime);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }


}

