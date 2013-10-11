<?php

/**
 * Description of List_ProductAttributeValue_Card
 *
 * @author a.novikov
 */
class List_ProductAttributeValue_Card extends List_ProductAttributeValue_Base {

	protected $name;
	protected $value;
	
	protected static $attributes = array();

	/**
	 *
	 * @param PhotoRow $var
	 * @return List_ProductAttributeValue_Card
	 */
	public static function factory($var) {
		if ($var instanceof Product2productAttributeRow) {
			return self::fromProduct2productAttributeRow($var);
		}
		else {
			throw new InvalidArgumentException('Cannot create object, invalid argument type');
		}
	}

	/**
	 *
	 * @param PhotoRow $row
	 * @return List_ProductAttributeValue_Card
	 */
	public static function fromProduct2productAttributeRow(Product2productAttributeRow $row) {
		$element = new self();

		$element->_setFields($row);

		return $element;
	}
	
	public function setName(Product2productAttributeRow $row) {
		$attributeId = $row->getAttributeId();
		
		if ( !array_key_exists($attributeId, self::$attributes) ) {
			$attributeRow = $row->getProductAttributeRowByAttributeId();
			self::$attributes[$attributeId] = $attributeRow->getName();
		}
		
		$this->name = self::$attributes[$attributeId];
	}

	public function setValue(Product2productAttributeRow $row) {
		$this->value = $row->getAttributeValue();
	}

	public static function prepareCommonData($list) {
		if ( !($list instanceof Db_Rowset) ) {
			throw new Exception('Invalid argument type');
		}
		$rowset = $list;
		
		$attributesRowset = Product2productAttributePeer::getInstance()->findParentRowsetGood($rowset, 'attribute_id');
		
		self::$attributes += $attributesRowset->normalize('id', 'name');
	}
}