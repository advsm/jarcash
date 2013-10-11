<?php

/**
 * Generated Model class.
 */
class Base_AdminLockPeer extends Db_Peer implements ISingleton
{

    const ID = '`admin_lock`.`id`';

    const SECTION_ID = '`admin_lock`.`section_id`';

    const ROW_ID = '`admin_lock`.`row_id`';

    const ADMIN_USER_ID = '`admin_lock`.`admin_user_id`';

    const CREATED = '`admin_lock`.`created`';

    protected $_name = 'admin_lock';

    protected $_rowClass = 'AdminLockRow';

    protected $_dependentTables = array();

    protected $_referenceMap = array(
        'AdminSectionSectionId' => array(
            'columns' => 'section_id',
            'refTableClass' => 'AdminSectionPeer',
            'refColumns' => 'id'
            ),
        'AdminUserAdminUserId' => array(
            'columns' => 'admin_user_id',
            'refTableClass' => 'AdminUserPeer',
            'refColumns' => 'id'
            )
        );

    private static $_instance = null;

    protected $_metadata = array(
        'id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_lock',
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
        'section_id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_lock',
            'COLUMN_NAME' => 'section_id',
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
        'row_id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_lock',
            'COLUMN_NAME' => 'row_id',
            'COLUMN_POSITION' => 3,
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
        'admin_user_id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_lock',
            'COLUMN_NAME' => 'admin_user_id',
            'COLUMN_POSITION' => 4,
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
        'created' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'admin_lock',
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
            )
        );

    /**
     * @return AdminLockPeer
     */
    public static function getInstance()
    {
        if (!self::$_instance) {
        	self::$_instance = new AdminLockPeer();
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
    public function findBySectionId($section_id)
    {
        $select = $this->select();
        $select->where('`section_id` = ?', $section_id);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByRowId($row_id)
    {
        $select = $this->select();
        $select->where('`row_id` = ?', $row_id);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByAdminUserId($admin_user_id)
    {
        $select = $this->select();
        $select->where('`admin_user_id` = ?', $admin_user_id);
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


}

