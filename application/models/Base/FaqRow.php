<?php

/**
 * Generated Model class.
 */
class Base_FaqRow extends Db_Row
{

    /**
     * Set new value for faq.id column in current Row.
     * 
     * @param int $IdFromFaqRow
     * @return void
     */
    public function setId($Id)
    {
        $this->__set("id", $Id);
    }

    /**
     * Return faq.id column value in current Row.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->__get("id");
    }

    /**
     * Set new value for faq.question column in current Row.
     * 
     * @param varchar $QuestionFromFaqRow
     * @return void
     */
    public function setQuestion($Question)
    {
        $this->__set("question", $Question);
    }

    /**
     * Return faq.question column value in current Row.
     * 
     * @return varchar
     */
    public function getQuestion()
    {
        return $this->__get("question");
    }

    /**
     * Set new value for faq.answer column in current Row.
     * 
     * @param varchar $AnswerFromFaqRow
     * @return void
     */
    public function setAnswer($Answer)
    {
        $this->__set("answer", $Answer);
    }

    /**
     * Return faq.answer column value in current Row.
     * 
     * @return varchar
     */
    public function getAnswer()
    {
        return $this->__get("answer");
    }

    /**
     * Set new value for faq.ord column in current Row.
     * 
     * @param smallint $OrdFromFaqRow
     * @return void
     */
    public function setOrd($Ord)
    {
        $this->__set("ord", $Ord);
    }

    /**
     * Return faq.ord column value in current Row.
     * 
     * @return smallint
     */
    public function getOrd()
    {
        return $this->__get("ord");
    }

    /**
     * Set new value for faq.is_publish column in current Row.
     * 
     * @param tinyint $IsPublishFromFaqRow
     * @return void
     */
    public function setIsPublish($IsPublish)
    {
        $this->__set("is_publish", $IsPublish);
    }

    /**
     * Return faq.is_publish column value in current Row.
     * 
     * @return tinyint
     */
    public function getIsPublish()
    {
        return $this->__get("is_publish");
    }


}

