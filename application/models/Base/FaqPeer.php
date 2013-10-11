<?php

/**
 * Generated Model class.
 */
class Base_FaqPeer extends Db_Peer implements ISingleton
{

    const ID = '`faq`.`id`';

    const QUESTION = '`faq`.`question`';

    const ANSWER = '`faq`.`answer`';

    const ORD = '`faq`.`ord`';

    const IS_PUBLISH = '`faq`.`is_publish`';

    protected $_name = 'faq';

    protected $_rowClass = 'FaqRow';

    protected $_dependentTables = array();

    protected $_referenceMap = array();

    private static $_instance = null;

    protected $_metadata = array(
        'id' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'faq',
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
        'question' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'faq',
            'COLUMN_NAME' => 'question',
            'COLUMN_POSITION' => 2,
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
        'answer' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'faq',
            'COLUMN_NAME' => 'answer',
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
        'ord' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'faq',
            'COLUMN_NAME' => 'ord',
            'COLUMN_POSITION' => 4,
            'DATA_TYPE' => 'smallint',
            'DEFAULT' => '0',
            'NULLABLE' => false,
            'LENGTH' => null,
            'SCALE' => null,
            'PRECISION' => null,
            'UNSIGNED' => null,
            'PRIMARY' => false,
            'PRIMARY_POSITION' => null,
            'IDENTITY' => false
            ),
        'is_publish' => array(
            'SCHEMA_NAME' => null,
            'TABLE_NAME' => 'faq',
            'COLUMN_NAME' => 'is_publish',
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
            )
        );

    /**
     * @return FaqPeer
     */
    public static function getInstance()
    {
        if (!self::$_instance) {
        	self::$_instance = new FaqPeer();
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
    public function findByQuestion($question)
    {
        $select = $this->select();
        $select->where('`question` = ?', $question);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByAnswer($answer)
    {
        $select = $this->select();
        $select->where('`answer` = ?', $answer);
        $rowset = $this->fetchAll($select);
        return $rowset;
    }

    /**
     * @return Db_Rowset
     */
    public function findByOrd($ord)
    {
        $select = $this->select();
        $select->where('`ord` = ?', $ord);
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


}

