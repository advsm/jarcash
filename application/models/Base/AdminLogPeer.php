<?php

/**
 * Generated Model class.
 */
class Base_AdminLogPeer extends Db_Peer implements ISingleton
{

    const ID = '`admin_log`.`id`';

    const USER_ID = '`admin_log`.`user_id`';

    const LOG = '`admin_log`.`log`';

    const CREATED = '`admin_log`.`created`';

    const CHANGED_TABLE = '`admin_log`.`changed_table`';

    const CHANGED_COLUMNS = '`admin_log`.`changed_columns`';

    const CHANGED_ROW = '`admin_log`.`changed_row`';

    protected $_name = 'admin_log';

    protected $_rowClass = 'AdminLogRow';

    protected $_dependentTables = array();

    protected $_referenceMap = array('AdminUserUserId' => array(
            'columns' => 'user_id',
            'refTableClass' => 'AdminUserPeer',
            'refColumns' => 'id'
            ));

    private static $_instance = null;

    protected $_metadata = array(
        'id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_log',
            'COLUMN_NAME' => 'id',
            'COLUMN_POSITION' => 1,
            'DATA_TYPE' => 'int',
            'DEFAULT' => null,
            'NULLABLE' => false,
            'LENGTH' => null,
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => true,
            'PRIMARY' => true,
            'PRIMARY_POSITION' => 1,
            'IDENTITY' => true
            ),
        'user_id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_log',
            'COLUMN_NAME' => 'user_id',
            'COLUMN_POSITION' => 2,
            'DATA_TYPE' => 'int',
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
        'log' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_log',
            'COLUMN_NAME' => 'log',
            'COLUMN_POSITION' => 3,
            'DATA_TYPE' => 'varchar',
            'DEFAULT' => null,
            'NULLABLE' => false,
            'LENGTH' => '512',
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => null,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            ),
        'created' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_log',
            'COLUMN_NAME' => 'created',
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
            ),
        'changed_table' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_log',
            'COLUMN_NAME' => 'changed_table',
            'COLUMN_POSITION' => 5,
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
        'changed_columns' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_log',
            'COLUMN_NAME' => 'changed_columns',
            'COLUMN_POSITION' => 6,
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
        'changed_row' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_log',
            'COLUMN_NAME' => 'changed_row',
            'COLUMN_POSITION' => 7,
            'DATA_TYPE' => 'int',
            'DEFAULT' => null,
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
     * @return AdminLogPeer
     */
    public static function getInstance()
    {
        if (!self::$_instance) {
        	self::$_instance = new AdminLogPeer();
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
    public function findByUserId($user_id)
    {
        $select = $this->select();
        $select->where('`user_id` = ?', $user_id);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByLog($log)
    {
        $select = $this->select();
        $select->where('`log` = ?', $log);
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
    public function findByChangedTable($changed_table)
    {
        $select = $this->select();
        $select->where('`changed_table` = ?', $changed_table);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByChangedColumns($changed_columns)
    {
        $select = $this->select();
        $select->where('`changed_columns` = ?', $changed_columns);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByChangedRow($changed_row)
    {
        $select = $this->select();
        $select->where('`changed_row` = ?', $changed_row);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }


}

