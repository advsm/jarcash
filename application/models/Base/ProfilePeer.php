<?php

/**
 * Generated Model class.
 */
class Base_ProfilePeer extends Db_Peer implements ISingleton
{

    const ID = '`profile`.`id`';

    const LOGIN = '`profile`.`login`';

    const EMAIL = '`profile`.`email`';

    const PASSWORD = '`profile`.`password`';

    const ACTIVATED = '`profile`.`activated`';

    const PERCENT = '`profile`.`percent`';

    const ICQ = '`profile`.`icq`';

    const WALLET_ID = '`profile`.`wallet_id`';

    const SUBACC_ID = '`profile`.`subacc_id`';

    const WEBMONEY_NUMBER = '`profile`.`webmoney_number`';

    protected $_name = 'profile';

    protected $_rowClass = 'ProfileRow';

    protected $_dependentTables = array(
        'MidletPeer',
        'ProfilePaymentPeer',
        'StatisticDownloadPeer',
        'SubaccPeer',
        'TicketPeer',
        'TicketMessagePeer',
        'TicketMessagePeer'
        );

    protected $_referenceMap = array(
        'ProfileWalletWalletId' => array(
            'columns' => 'wallet_id',
            'refTableClass' => 'ProfileWalletPeer',
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
            'TABLE_NAME' => 'profile',
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
        'login' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'profile',
            'COLUMN_NAME' => 'login',
            'COLUMN_POSITION' => 2,
            'DATA_TYPE' => 'varchar',
            'DEFAULT' => null,
            'NULLABLE' => false,
            'LENGTH' => '64',
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => null,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            ),
        'email' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'profile',
            'COLUMN_NAME' => 'email',
            'COLUMN_POSITION' => 3,
            'DATA_TYPE' => 'varchar',
            'DEFAULT' => null,
            'NULLABLE' => false,
            'LENGTH' => '64',
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => null,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            ),
        'password' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'profile',
            'COLUMN_NAME' => 'password',
            'COLUMN_POSITION' => 4,
            'DATA_TYPE' => 'varchar',
            'DEFAULT' => null,
            'NULLABLE' => false,
            'LENGTH' => '64',
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => null,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            ),
        'activated' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'profile',
            'COLUMN_NAME' => 'activated',
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
            ),
        'percent' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'profile',
            'COLUMN_NAME' => 'percent',
            'COLUMN_POSITION' => 6,
            'DATA_TYPE' => 'tinyint',
            'DEFAULT' => '80',
            'NULLABLE' => false,
            'LENGTH' => null,
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => null,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            ),
        'icq' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'profile',
            'COLUMN_NAME' => 'icq',
            'COLUMN_POSITION' => 7,
            'DATA_TYPE' => 'varchar',
            'DEFAULT' => null,
            'NULLABLE' => true,
            'LENGTH' => '12',
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => null,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            ),
        'wallet_id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'profile',
            'COLUMN_NAME' => 'wallet_id',
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
        'subacc_id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'profile',
            'COLUMN_NAME' => 'subacc_id',
            'COLUMN_POSITION' => 9,
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
        'webmoney_number' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'profile',
            'COLUMN_NAME' => 'webmoney_number',
            'COLUMN_POSITION' => 10,
            'DATA_TYPE' => 'varchar',
            'DEFAULT' => null,
            'NULLABLE' => true,
            'LENGTH' => '32',
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => null,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            )
        );

    /**
     * @return ProfilePeer
     */
    public static function getInstance()
    {
        if (!self::$_instance) {
        	self::$_instance = new ProfilePeer();
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
    public function findByLogin($login)
    {
        $select = $this->select();
        $select->where('`login` = ?', $login);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByEmail($email)
    {
        $select = $this->select();
        $select->where('`email` = ?', $email);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByPassword($password)
    {
        $select = $this->select();
        $select->where('`password` = ?', $password);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByActivated($activated)
    {
        $select = $this->select();
        $select->where('`activated` = ?', $activated);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByPercent($percent)
    {
        $select = $this->select();
        $select->where('`percent` = ?', $percent);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByIcq($icq)
    {
        $select = $this->select();
        $select->where('`icq` = ?', $icq);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByWalletId($wallet_id)
    {
        $select = $this->select();
        $select->where('`wallet_id` = ?', $wallet_id);
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
    public function findByWebmoneyNumber($webmoney_number)
    {
        $select = $this->select();
        $select->where('`webmoney_number` = ?', $webmoney_number);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }


}

