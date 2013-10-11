<?php

/**
 * Generated Model class.
 */
class Base_TicketMessagePeer extends Db_Peer implements ISingleton
{

    const ID = '`ticket_message`.`id`';

    const FROM_PROFILE_ID = '`ticket_message`.`from_profile_id`';

    const TO_PROFILE_ID = '`ticket_message`.`to_profile_id`';

    const DATETIME = '`ticket_message`.`datetime`';

    const TEXT = '`ticket_message`.`text`';

    const TICKET_ID = '`ticket_message`.`ticket_id`';

    protected $_name = 'ticket_message';

    protected $_rowClass = 'TicketMessageRow';

    protected $_dependentTables = array();

    protected $_referenceMap = array(
        'ProfileFromProfileId' => array(
            'columns' => 'from_profile_id',
            'refTableClass' => 'ProfilePeer',
            'refColumns' => 'id'
            ),
        'ProfileToProfileId' => array(
            'columns' => 'to_profile_id',
            'refTableClass' => 'ProfilePeer',
            'refColumns' => 'id'
            ),
        'TicketTicketId' => array(
            'columns' => 'ticket_id',
            'refTableClass' => 'TicketPeer',
            'refColumns' => 'id'
            )
        );

    private static $_instance = null;

    protected $_metadata = array(
        'id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'ticket_message',
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
        'from_profile_id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'ticket_message',
            'COLUMN_NAME' => 'from_profile_id',
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
        'to_profile_id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'ticket_message',
            'COLUMN_NAME' => 'to_profile_id',
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
        'datetime' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'ticket_message',
            'COLUMN_NAME' => 'datetime',
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
        'text' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'ticket_message',
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
        'ticket_id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'ticket_message',
            'COLUMN_NAME' => 'ticket_id',
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
     * @return TicketMessagePeer
     */
    public static function getInstance()
    {
        if (!self::$_instance) {
        	self::$_instance = new TicketMessagePeer();
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
    public function findByFromProfileId($from_profile_id)
    {
        $select = $this->select();
        $select->where('`from_profile_id` = ?', $from_profile_id);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByToProfileId($to_profile_id)
    {
        $select = $this->select();
        $select->where('`to_profile_id` = ?', $to_profile_id);
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
    public function findByTicketId($ticket_id)
    {
        $select = $this->select();
        $select->where('`ticket_id` = ?', $ticket_id);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }


}

