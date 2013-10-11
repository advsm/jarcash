<?php

/**
 * Generated Model class.
 */
class Base_ProfilePaymentPeer extends Db_Peer implements ISingleton
{

    const ID = '`profile_payment`.`id`';

    const PROFILE_ID = '`profile_payment`.`profile_id`';

    const AMOUNT = '`profile_payment`.`amount`';

    const DESTINATION = '`profile_payment`.`destination`';

    const CREATED = '`profile_payment`.`created`';

    const STATUS_ID = '`profile_payment`.`status_id`';

    protected $_name = 'profile_payment';

    protected $_rowClass = 'ProfilePaymentRow';

    protected $_dependentTables = array();

    protected $_referenceMap = array(
        'ProfileProfileId' => array(
            'columns' => 'profile_id',
            'refTableClass' => 'ProfilePeer',
            'refColumns' => 'id'
            ),
        'PaymentStatusStatusId' => array(
            'columns' => 'status_id',
            'refTableClass' => 'PaymentStatusPeer',
            'refColumns' => 'id'
            )
        );

    private static $_instance = null;

    protected $_metadata = array(
        'id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'profile_payment',
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
        'profile_id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'profile_payment',
            'COLUMN_NAME' => 'profile_id',
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
        'amount' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'profile_payment',
            'COLUMN_NAME' => 'amount',
            'COLUMN_POSITION' => 3,
            'DATA_TYPE' => 'float',
            'DEFAULT' => null,
            'NULLABLE' => false,
            'LENGTH' => null,
            'SCALE' => '2',
            'PRECISION' => '9',
            'UNSIGNED' => null,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            ),
        'destination' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'profile_payment',
            'COLUMN_NAME' => 'destination',
            'COLUMN_POSITION' => 4,
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
        'created' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'profile_payment',
            'COLUMN_NAME' => 'created',
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
            ),
        'status_id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'profile_payment',
            'COLUMN_NAME' => 'status_id',
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
            )
        );

    /**
     * @return ProfilePaymentPeer
     */
    public static function getInstance()
    {
        if (!self::$_instance) {
        	self::$_instance = new ProfilePaymentPeer();
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
    public function findByAmount($amount)
    {
        $select = $this->select();
        $select->where('`amount` = ?', $amount);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByDestination($destination)
    {
        $select = $this->select();
        $select->where('`destination` = ?', $destination);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByCreated($created)
    {
        $select = $this->select();
        $select->where('`created` = ?', $created);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByStatusId($status_id)
    {
        $select = $this->select();
        $select->where('`status_id` = ?', $status_id);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }


}

