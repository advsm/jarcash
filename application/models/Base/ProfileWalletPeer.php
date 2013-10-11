<?php

/**
 * Generated Model class.
 */
class Base_ProfileWalletPeer extends Db_Peer implements ISingleton
{

    const ID = '`profile_wallet`.`id`';

    const AMOUNT = '`profile_wallet`.`amount`';

    const MODIFIED = '`profile_wallet`.`modified`';

    const PROFIT = '`profile_wallet`.`profit`';

    protected $_name = 'profile_wallet';

    protected $_rowClass = 'ProfileWalletRow';

    protected $_dependentTables = array('ProfilePeer');

    protected $_referenceMap = array();

    private static $_instance = null;

    protected $_metadata = array(
        'id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'profile_wallet',
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
        'amount' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'profile_wallet',
            'COLUMN_NAME' => 'amount',
            'COLUMN_POSITION' => 2,
            'DATA_TYPE' => 'float',
            'DEFAULT' => '0.00',
            'NULLABLE' => false,
            'LENGTH' => null,
            'SCALE' => '2',
            'PRECISION' => '9',
            'UNSIGNED' => null,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            ),
        'modified' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'profile_wallet',
            'COLUMN_NAME' => 'modified',
            'COLUMN_POSITION' => 3,
            'DATA_TYPE' => 'timestamp',
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
        'profit' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'profile_wallet',
            'COLUMN_NAME' => 'profit',
            'COLUMN_POSITION' => 4,
            'DATA_TYPE' => 'float',
            'DEFAULT' => '0.00',
            'NULLABLE' => false,
            'LENGTH' => null,
            'SCALE' => '2',
            'PRECISION' => '9',
            'UNSIGNED' => null,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            )
        );

    /**
     * @return ProfileWalletPeer
     */
    public static function getInstance()
    {
        if (!self::$_instance) {
        	self::$_instance = new ProfileWalletPeer();
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
    public function findByModified($modified)
    {
        $select = $this->select();
        $select->where('`modified` = ?', $modified);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByProfit($profit)
    {
        $select = $this->select();
        $select->where('`profit` = ?', $profit);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }


}

