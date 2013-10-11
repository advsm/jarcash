<?php

/**
 * Generated Model class.
 */
class Base_MidletPeer extends Db_Peer implements ISingleton
{

    const ID = '`midlet`.`id`';

    const NAME = '`midlet`.`name`';

    const DESCRIPTION = '`midlet`.`description`';

    const TYPE_ID = '`midlet`.`type_id`';

    const ORIGINAL_URL = '`midlet`.`original_url`';

    const ICON = '`midlet`.`icon`';

    const PROFILE_ID = '`midlet`.`profile_id`';

    const SMS_NUMBER_ID = '`midlet`.`sms_number_id`';

    const SMS_COUNT = '`midlet`.`sms_count`';

    const SMS_WAIT1 = '`midlet`.`sms_wait1`';

    const SMS_WAIT2 = '`midlet`.`sms_wait2`';

    const KEY = '`midlet`.`key`';

    const HELLO_MESSAGE = '`midlet`.`hello_message`';

    const BYE_MESSAGE = '`midlet`.`bye_message`';

    const DELETED = '`midlet`.`deleted`';

    protected $_name = 'midlet';

    protected $_rowClass = 'MidletRow';

    protected $_dependentTables = array(
        'Midlet2subaccPeer',
        'StatisticDownloadPeer',
        'StatisticSmsPeer'
        );

    protected $_referenceMap = array(
        'MidletTypeTypeId' => array(
            'columns' => 'type_id',
            'refTableClass' => 'MidletTypePeer',
            'refColumns' => 'id'
            ),
        'ProfileProfileId' => array(
            'columns' => 'profile_id',
            'refTableClass' => 'ProfilePeer',
            'refColumns' => 'id'
            ),
        'SmsNumberSmsNumberId' => array(
            'columns' => 'sms_number_id',
            'refTableClass' => 'SmsNumberPeer',
            'refColumns' => 'id'
            )
        );

    private static $_instance = null;

    protected $_metadata = array(
        'id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'midlet',
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
            'TABLE_NAME' => 'midlet',
            'COLUMN_NAME' => 'name',
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
        'description' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'midlet',
            'COLUMN_NAME' => 'description',
            'COLUMN_POSITION' => 3,
            'DATA_TYPE' => 'varchar',
            'DEFAULT' => null,
            'NULLABLE' => true,
            'LENGTH' => '300',
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => null,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            ),
        'type_id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'midlet',
            'COLUMN_NAME' => 'type_id',
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
        'original_url' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'midlet',
            'COLUMN_NAME' => 'original_url',
            'COLUMN_POSITION' => 5,
            'DATA_TYPE' => 'varchar',
            'DEFAULT' => null,
            'NULLABLE' => false,
            'LENGTH' => '255',
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => null,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            ),
        'icon' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'midlet',
            'COLUMN_NAME' => 'icon',
            'COLUMN_POSITION' => 6,
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
            'TABLE_NAME' => 'midlet',
            'COLUMN_NAME' => 'profile_id',
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
        'sms_number_id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'midlet',
            'COLUMN_NAME' => 'sms_number_id',
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
        'sms_count' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'midlet',
            'COLUMN_NAME' => 'sms_count',
            'COLUMN_POSITION' => 9,
            'DATA_TYPE' => 'tinyint',
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
        'sms_wait1' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'midlet',
            'COLUMN_NAME' => 'sms_wait1',
            'COLUMN_POSITION' => 10,
            'DATA_TYPE' => 'smallint',
            'DEFAULT' => null,
            'NULLABLE' => false,
            'LENGTH' => null,
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => true,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            ),
        'sms_wait2' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'midlet',
            'COLUMN_NAME' => 'sms_wait2',
            'COLUMN_POSITION' => 11,
            'DATA_TYPE' => 'smallint',
            'DEFAULT' => null,
            'NULLABLE' => false,
            'LENGTH' => null,
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => true,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            ),
        'key' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'midlet',
            'COLUMN_NAME' => 'key',
            'COLUMN_POSITION' => 12,
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
        'hello_message' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'midlet',
            'COLUMN_NAME' => 'hello_message',
            'COLUMN_POSITION' => 13,
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
            ),
        'bye_message' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'midlet',
            'COLUMN_NAME' => 'bye_message',
            'COLUMN_POSITION' => 14,
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
            ),
        'deleted' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'midlet',
            'COLUMN_NAME' => 'deleted',
            'COLUMN_POSITION' => 15,
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
     * @return MidletPeer
     */
    public static function getInstance()
    {
        if (!self::$_instance) {
        	self::$_instance = new MidletPeer();
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
    public function findByDescription($description)
    {
        $select = $this->select();
        $select->where('`description` = ?', $description);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByTypeId($type_id)
    {
        $select = $this->select();
        $select->where('`type_id` = ?', $type_id);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByOriginalUrl($original_url)
    {
        $select = $this->select();
        $select->where('`original_url` = ?', $original_url);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByIcon($icon)
    {
        $select = $this->select();
        $select->where('`icon` = ?', $icon);
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
    public function findBySmsCount($sms_count)
    {
        $select = $this->select();
        $select->where('`sms_count` = ?', $sms_count);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findBySmsWait1($sms_wait1)
    {
        $select = $this->select();
        $select->where('`sms_wait1` = ?', $sms_wait1);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findBySmsWait2($sms_wait2)
    {
        $select = $this->select();
        $select->where('`sms_wait2` = ?', $sms_wait2);
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
    public function findByHelloMessage($hello_message)
    {
        $select = $this->select();
        $select->where('`hello_message` = ?', $hello_message);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByByeMessage($bye_message)
    {
        $select = $this->select();
        $select->where('`bye_message` = ?', $bye_message);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByDeleted($deleted)
    {
        $select = $this->select();
        $select->where('`deleted` = ?', $deleted);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }


}

