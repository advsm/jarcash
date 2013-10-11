<?php

/**
 * Generated Model class.
 */
class Base_AdminSectionHandlerRow extends Db_Row
{

    /**
     * Set new value for admin_section_handler.id column in current Row.
     * 
     * @param int $IdFromAdminSectionHandlerRow
     * @return void
     */
    public function setId($Id)
    {
        $this->__set("id", $Id);
    }

    /**
     * Return admin_section_handler.id column value in current Row.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->__get("id");
    }

    /**
     * Set new value for admin_section_handler.section_id column in current Row.
     * 
     * @param int $SectionIdFromAdminSectionHandlerRow
     * @return void
     */
    public function setSectionId($SectionId)
    {
        $this->__set("section_id", $SectionId);
    }

    /**
     * Return admin_section_handler.section_id column value in current Row.
     * 
     * @return int
     */
    public function getSectionId()
    {
        return $this->__get("section_id");
    }

    /**
     * Return parent row from table admin_section where
     * admin_section_handler.section_id = admin_section.id
     * 
     * @param Db_Select $selectFromAdminSection
     * @return AdminSectionRow
     */
    public function getAdminSectionRowBySectionId($select = null)
    {
        return $this->findParentRow('AdminSectionPeer', null, $select);
    }

    /**
     * Set new value for admin_section_handler.class_name column in current Row.
     * 
     * @param varchar $ClassNameFromAdminSectionHandlerRow
     * @return void
     */
    public function setClassName($ClassName)
    {
        $this->__set("class_name", $ClassName);
    }

    /**
     * Return admin_section_handler.class_name column value in current Row.
     * 
     * @return varchar
     */
    public function getClassName()
    {
        return $this->__get("class_name");
    }


}

