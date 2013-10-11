<?php

/**
 * Generated Model class.
 */
class Base_FileRow extends Db_Row
{

    /**
     * Set new value for file.id column in current Row.
     * 
     * @param int $IdFromFileRow
     * @return void
     */
    public function setId($Id)
    {
        $this->__set("id", $Id);
    }

    /**
     * Return file.id column value in current Row.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->__get("id");
    }

    /**
     * Set new value for file.path column in current Row.
     * 
     * @param varchar $PathFromFileRow
     * @return void
     */
    public function setPath($Path)
    {
        $this->__set("path", $Path);
    }

    /**
     * Return file.path column value in current Row.
     * 
     * @return varchar
     */
    public function getPath()
    {
        return $this->__get("path");
    }

    /**
     * Return dependent rowset from table Midlet where Midlet.FileId reference to file
     * table
     * 
     * @param Db_Select $select FromMidlet
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getMidletRowsetByFileId($select = null)
    {
        return $this->findDependentRowset('MidletPeer', null, $select);
    }


}

