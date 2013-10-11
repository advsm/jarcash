<?php

/**
 * Generated Model class.
 */
class Base_NewsPeer extends Db_Peer implements ISingleton
{

    const ID = '`news`.`id`';

    const NAME = '`news`.`name`';

    const TEXT = '`news`.`text`';

    const IS_PUBLISH = '`news`.`is_publish`';

    const CREATED = '`news`.`created`';

    protected $_name = 'news';

    protected $_rowClass = 'NewsRow';

    protected $_dependentTables = array();

    protected $_referenceMap = array();

    private static $_instance = null;

    protected $_metadata = array(
        'id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'news',
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
            'TABLE_NAME' => 'news',
            'COLUMN_NAME' => 'name',
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
        'text' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'news',
            'COLUMN_NAME' => 'text',
            'COLUMN_POSITION' => 3,
            'DATA_TYPE' => 'varchar',
            'DEFAULT' => null,
            'NULLABLE' => false,
            'LENGTH' => '2056',
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => null,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            ),
        'is_publish' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'news',
            'COLUMN_NAME' => 'is_publish',
            'COLUMN_POSITION' => 4,
            'DATA_TYPE' => 'tinyint',
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
            'TABLE_NAME' => 'news',
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
     * @return NewsPeer
     */
    public static function getInstance()
    {
        if (!self::$_instance) {
        	self::$_instance = new NewsPeer();
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
    public function findByText($text)
    {
        $select = $this->select();
        $select->where('`text` = ?', $text);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByIsPublish($is_publish)
    {
        $select = $this->select();
        $select->where('`is_publish` = ?', $is_publish);
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

