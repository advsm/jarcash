<?php

/**
 * Generated Model class.
 */
class Base_Midlet2subaccPeer extends Db_Peer implements ISingleton
{

    const ID = '`midlet2subacc`.`id`';

    const SUBACC_ID = '`midlet2subacc`.`subacc_id`';

    const MIDLET_ID = '`midlet2subacc`.`midlet_id`';

    const INTERNAL_JAR = '`midlet2subacc`.`internal_jar`';

    protected $_name = 'midlet2subacc';

    protected $_rowClass = 'Midlet2subaccRow';

    protected $_dependentTables = array();

    protected $_referenceMap = array(
        'SubaccSubaccId' => array(
            'columns' => 'subacc_id',
            'refTableClass' => 'SubaccPeer',
            'refColumns' => 'id'
            ),
        'MidletMidletId' => array(
            'columns' => 'midlet_id',
            'refTableClass' => 'MidletPeer',
            'refColumns' => 'id'
            )
        );

    private static $_instance = null;

    protected $_metadata = array(
        'id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'midlet2subacc',
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
        'subacc_id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'midlet2subacc',
            'COLUMN_NAME' => 'subacc_id',
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
        'midlet_id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'midlet2subacc',
            'COLUMN_NAME' => 'midlet_id',
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
            ),
        'internal_jar' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'midlet2subacc',
            'COLUMN_NAME' => 'internal_jar',
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
            )
        );

    /**
     * @return Midlet2subaccPeer
     */
    public static function getInstance()
    {
        if (!self::$_instance) {
        	self::$_instance = new Midlet2subaccPeer();
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
    public function findByInternalJar($internal_jar)
    {
        $select = $this->select();
        $select->where('`internal_jar` = ?', $internal_jar);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }


}

