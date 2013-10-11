<?php

/**
 * Generated Model class.
 */
class Base_AdminSectionPropertyRow extends Db_Row
{

    /**
     * Set new value for admin_section_property.id column in current Row.
     * 
     * @param int $IdFromAdminSectionPropertyRow
     * @return void
     */
    public function setId($Id)
    {
        $this->__set("id", $Id);
    }

    /**
     * Return admin_section_property.id column value in current Row.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->__get("id");
    }

    /**
     * Set new value for admin_section_property.section_id column in current Row.
     * 
     * @param int $SectionIdFromAdminSectionPropertyRow
     * @return void
     */
    public function setSectionId($SectionId)
    {
        $this->__set("section_id", $SectionId);
    }

    /**
     * Return admin_section_property.section_id column value in current Row.
     * 
     * @return int
     */
    public function getSectionId()
    {
        return $this->__get("section_id");
    }

    /**
     * Return parent row from table admin_section where
     * admin_section_property.section_id = admin_section.id
     * 
     * @param Db_Select $selectFromAdminSection
     * @return AdminSectionRow
     */
    public function getAdminSectionRowBySectionId($select = null)
    {
        return $this->findParentRow('AdminSectionPeer', null, $select);
    }

    /**
     * Set new value for admin_section_property.key column in current Row.
     * 
     * @param varchar $KeyFromAdminSectionPropertyRow
     * @return void
     */
    public function setKey($Key)
    {
        $this->__set("key", $Key);
    }

    /**
     * Return admin_section_property.key column value in current Row.
     * 
     * @return varchar
     */
    public function getKey()
    {
        return $this->__get("key");
    }

    /**
     * Set new value for admin_section_property.name column in current Row.
     * 
     * @param varchar $NameFromAdminSectionPropertyRow
     * @return void
     */
    public function setName($Name)
    {
        $this->__set("name", $Name);
    }

    /**
     * Return admin_section_property.name column value in current Row.
     * 
     * @return varchar
     */
    public function getName()
    {
        return $this->__get("name");
    }

    /**
     * Set new value for admin_section_property.show_in_list column in current Row.
     * 
     * @param tinyint $ShowInListFromAdminSectionPropertyRow
     * @return void
     */
    public function setShowInList($ShowInList)
    {
        $this->__set("show_in_list", $ShowInList);
    }

    /**
     * Return admin_section_property.show_in_list column value in current Row.
     * 
     * @return tinyint
     */
    public function getShowInList()
    {
        return $this->__get("show_in_list");
    }

    /**
     * Set new value for admin_section_property.show_in_item column in current Row.
     * 
     * @param tinyint $ShowInItemFromAdminSectionPropertyRow
     * @return void
     */
    public function setShowInItem($ShowInItem)
    {
        $this->__set("show_in_item", $ShowInItem);
    }

    /**
     * Return admin_section_property.show_in_item column value in current Row.
     * 
     * @return tinyint
     */
    public function getShowInItem()
    {
        return $this->__get("show_in_item");
    }

    /**
     * Set new value for admin_section_property.default_value column in current Row.
     * 
     * @param varchar $DefaultValueFromAdminSectionPropertyRow
     * @return void
     */
    public function setDefaultValue($DefaultValue)
    {
        $this->__set("default_value", $DefaultValue);
    }

    /**
     * Return admin_section_property.default_value column value in current Row.
     * 
     * @return varchar
     */
    public function getDefaultValue()
    {
        return $this->__get("default_value");
    }

    /**
     * Set new value for admin_section_property.description column in current Row.
     * 
     * @param varchar $DescriptionFromAdminSectionPropertyRow
     * @return void
     */
    public function setDescription($Description)
    {
        $this->__set("description", $Description);
    }

    /**
     * Return admin_section_property.description column value in current Row.
     * 
     * @return varchar
     */
    public function getDescription()
    {
        return $this->__get("description");
    }

    /**
     * Set new value for admin_section_property.element_class column in current Row.
     * 
     * @param varchar $ElementClassFromAdminSectionPropertyRow
     * @return void
     */
    public function setElementClass($ElementClass)
    {
        $this->__set("element_class", $ElementClass);
    }

    /**
     * Return admin_section_property.element_class column value in current Row.
     * 
     * @return varchar
     */
    public function getElementClass()
    {
        return $this->__get("element_class");
    }

    /**
     * Set new value for admin_section_property.order column in current Row.
     * 
     * @param int $OrderFromAdminSectionPropertyRow
     * @return void
     */
    public function setOrder($Order)
    {
        $this->__set("order", $Order);
    }

    /**
     * Return admin_section_property.order column value in current Row.
     * 
     * @return int
     */
    public function getOrder()
    {
        return $this->__get("order");
    }

    /**
     * Return dependent rowset from table AdminSectionPropertyFilter where
     * AdminSectionPropertyFilter.PropertyId reference to admin_section_property table
     * 
     * @param Db_Select $select FromAdminSectionPropertyFilter
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getAdminSectionPropertyFilterRowsetByPropertyId($select = null)
    {
        return $this->findDependentRowset('AdminSectionPropertyFilterPeer', null, $select);
    }

    /**
     * Return dependent rowset from table AdminSectionPropertyValidator where
     * AdminSectionPropertyValidator.PropertyId reference to admin_section_property
     * table
     * 
     * @param Db_Select $select FromAdminSectionPropertyValidator
     * @return Zend_Db_Table_Rowset_Abstract
     */
    public function getAdminSectionPropertyValidatorRowsetByPropertyId($select = null)
    {
        return $this->findDependentRowset('AdminSectionPropertyValidatorPeer', null, $select);
    }


}

