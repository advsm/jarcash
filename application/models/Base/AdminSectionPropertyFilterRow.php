<?php

/**
 * Generated Model class.
 */
class Base_AdminSectionPropertyFilterRow extends Db_Row
{

    /**
     * Set new value for admin_section_property_filter.id column in current Row.
     * 
     * @param int $IdFromAdminSectionPropertyFilterRow
     * @return void
     */
    public function setId($Id)
    {
        $this->__set("id", $Id);
    }

    /**
     * Return admin_section_property_filter.id column value in current Row.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->__get("id");
    }

    /**
     * Set new value for admin_section_property_filter.property_id column in current
     * Row.
     * 
     * @param int $PropertyIdFromAdminSectionPropertyFilterRow
     * @return void
     */
    public function setPropertyId($PropertyId)
    {
        $this->__set("property_id", $PropertyId);
    }

    /**
     * Return admin_section_property_filter.property_id column value in current Row.
     * 
     * @return int
     */
    public function getPropertyId()
    {
        return $this->__get("property_id");
    }

    /**
     * Return parent row from table admin_section_property where
     * admin_section_property_filter.property_id = admin_section_property.id
     * 
     * @param Db_Select $selectFromAdminSectionProperty
     * @return AdminSectionPropertyRow
     */
    public function getAdminSectionPropertyRowByPropertyId($select = null)
    {
        return $this->findParentRow('AdminSectionPropertyPeer', null, $select);
    }

    /**
     * Set new value for admin_section_property_filter.class_name column in current
     * Row.
     * 
     * @param varchar $ClassNameFromAdminSectionPropertyFilterRow
     * @return void
     */
    public function setClassName($ClassName)
    {
        $this->__set("class_name", $ClassName);
    }

    /**
     * Return admin_section_property_filter.class_name column value in current Row.
     * 
     * @return varchar
     */
    public function getClassName()
    {
        return $this->__get("class_name");
    }


}

