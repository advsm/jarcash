<?php

/**
 * Generated Model class.
 */
class Base_SubaccPeer extends Db_Peer implements ISingleton
{

    const ID = '`subacc`.`id`';

    const KEY = '`subacc`.`key`';

    const PROFILE_ID = '`subacc`.`profile_id`';

    protected $_name = 'subacc';

    protected $_rowClass = 'SubaccRow';

    protected $_dependentTables = array(
        'Midlet2subaccPeer',
        'ProfilePeer',
        'StatisticDownloadPeer',
        'StatisticSmsPeer'
        );

    protected $_referenceMap = array('ProfileProfileId' => array(
            'columns' => 'profile_id',
            'refTableClass' => 'ProfilePeer',
            'refColumns' => 'id'
            ));

    private static $_instance = null;

    protected $_metadata = array(
        'id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'subacc',
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
            'TABLE_NAME' => 'subacc',
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
        'profile_id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'subacc',
            'COLUMN_NAME' => 'profile_id',
            'COLUMN_POSITION' => 3,
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
            )
        );

    /**
     * @return SubaccPeer
     */
    public static function getInstance()
    {
        if (!self::$_instance) {
        	self::$_instance = new SubaccPeer();
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
    public function findByProfileId($profile_id)
    {
        $select = $this->select();
        $select->where('`profile_id` = ?', $profile_id);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }


}

