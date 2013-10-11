<?php

/**
 * Generated Model class.
 */
class Base_NewsRow extends Db_Row
{

    /**
     * Set new value for news.id column in current Row.
     * 
     * @param int $IdFromNewsRow
     * @return void
     */
    public function setId($Id)
    {
        $this->__set("id", $Id);
    }

    /**
     * Return news.id column value in current Row.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->__get("id");
    }

    /**
     * Set new value for news.name column in current Row.
     * 
     * @param varchar $NameFromNewsRow
     * @return void
     */
    public function setName($Name)
    {
        $this->__set("name", $Name);
    }

    /**
     * Return news.name column value in current Row.
     * 
     * @return varchar
     */
    public function getName()
    {
        return $this->__get("name");
    }

    /**
     * Set new value for news.text column in current Row.
     * 
     * @param varchar $TextFromNewsRow
     * @return void
     */
    public function setText($Text)
    {
        $this->__set("text", $Text);
    }

    /**
     * Return news.text column value in current Row.
     * 
     * @return varchar
     */
    public function getText()
    {
        return $this->__get("text");
    }

    /**
     * Set new value for news.is_publish column in current Row.
     * 
     * @param tinyint $IsPublishFromNewsRow
     * @return void
     */
    public function setIsPublish($IsPublish)
    {
        $this->__set("is_publish", $IsPublish);
    }

    /**
     * Return news.is_publish column value in current Row.
     * 
     * @return tinyint
     */
    public function getIsPublish()
    {
        return $this->__get("is_publish");
    }

    /**
     * Set new value for news.created column in current Row.
     * 
     * @param timestamp $CreatedFromNewsRow
     * @return void
     */
    public function setCreated($Created)
    {
        $this->__set("created", $Created);
    }

    /**
     * Return news.created column value in current Row.
     * 
     * @return timestamp
     */
    public function getCreated()
    {
        return $this->__get("created");
    }


}

