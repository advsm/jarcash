<?php

/**
 * Generated Model class.
 */
class Base_TicketPeer extends Db_Peer implements ISingleton
{

    const ID = '`ticket`.`id`';

    const PROFILE_ID = '`ticket`.`profile_id`';

    const DATETIME = '`ticket`.`datetime`';

    const TOPIC = '`ticket`.`topic`';

    const TEXT = '`ticket`.`text`';

    const STATUS_ID = '`ticket`.`status_id`';

    protected $_name = 'ticket';

    protected $_rowClass = 'TicketRow';

    protected $_dependentTables = array('TicketMessagePeer');

    protected $_referenceMap = array(
        'ProfileProfileId' => array(
            'columns' => 'profile_id',
            'refTableClass' => 'ProfilePeer',
            'refColumns' => 'id'
            ),
        'TicketStatusStatusId' => array(
            'columns' => 'status_id',
            'refTableClass' => 'TicketStatusPeer',
            'refColumns' => 'id'
            )
        );

    private static $_instance = null;

    protected $_metadata = array(
        'id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'ticket',
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
            'TABLE_NAME' => 'ticket',
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
        'datetime' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'ticket',
            'COLUMN_NAME' => 'datetime',
            'COLUMN_POSITION' => 3,
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
        'topic' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'ticket',
            'COLUMN_NAME' => 'topic',
            'COLUMN_POSITION' => 4,
            'DATA_TYPE' => 'varchar',
            'DEFAULT' => null,
            'NULLABLE' => false,
            'LENGTH' => '300',
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => null,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            ),
        'text' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'ticket',
            'COLUMN_NAME' => 'text',
            'COLUMN_POSITION' => 5,
            'DATA_TYPE' => 'text',
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
        'status_id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'ticket',
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
     * @return TicketPeer
     */
    public static function getInstance()
    {
        if (!self::$_instance) {
        	self::$_instance = new TicketPeer();
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
    public function findByDatetime($datetime)
    {
        $select = $this->select();
        $select->where('`datetime` = ?', $datetime);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByTopic($topic)
    {
        $select = $this->select();
        $select->where('`topic` = ?', $topic);
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
    public function findByStatusId($status_id)
    {
        $select = $this->select();
        $select->where('`status_id` = ?', $status_id);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }


}

