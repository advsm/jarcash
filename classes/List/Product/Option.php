<?php

/**
 * Description of List_Product_Option
 *
 * @author a.novikov
 */
class List_Product_Option extends List_Product_Base_Subproduct {
	
	protected $id;
	protected $price;
	protected $size;
	protected $count;
	protected $in_basket;

	protected static $sizes = array();
	protected static $sizeId;

	protected static function _getSizeId() {
	 ProductAttributePeer::ADAPTER;
	}

	/**
	 *
	 * @param ProductRow $var
	 * @return List_Product_Option
	 */
	public static function factory($var) {
		if ($var instanceof ProductRow) {
			return self::fromProductRow($var);
		}
		else {
			throw new InvalidArgumentException('Cannot create object, invalid argument type');
		}
	}

	/**
	 *
	 * @param ProductRow $row
	 * @return List_Product_Option
	 */
	public static function  fromProductRow(ProductRow $row) {
		$element = new self();

		$element->_setFields($row);

		return $element;
	}
	
	public function setSize(ProductRow $row) {
//		$rowset = $row->getProduct2productAttributeRowsetByProductId();
		$id = (int)$row->getId();
		if ( array_key_exists($id, self::$sizes ) ) {
			$this->size = self::$sizes[$id];
		}
		else {
			$sizeId = ProductAttributePeer::getInstance()->getSizeId();
			
			$select = Product2productAttributePeer::getInstance()->select();
			
			$select->where( Product2productAttributePeer::ATTRIBUTE_ID.'='.$sizeId );
			
			$rowset = $row->getProduct2productAttributeRowsetByProductId($select);
			
			if ($rowset->count()) {
				$this->size = $rowset->current()->getAttributeValue();
			}
			self::$sizes[$id] = $this->size;
		}
	}

	/**
	 *
	 * @param Db_Rowset $list
	 */
	public static function prepareCommonData($list) {
		if ( !($list instanceof Db_Rowset) ) {
			throw new Exception('Invalid argument type');
		}
		$productsRowset = $list;

		$sizeId = ProductAttributePeer::getInstance()->getSizeId();
		
		$peer = Product2productAttributePeer::getInstance();
		
		$select = $peer->select();
		
		$select->where( Product2productAttributePeer::ATTRIBUTE_ID.'='.$sizeId );

		$condition = QueryFunctions::notInUnquoted('product_id', array_keys(self::$sizes) );

		$select->where( $condition );
		
		$sizesRowset = $peer->findDependentRowset($productsRowset, 'product_id', $select);
		
		if ($sizesRowset) {
			self::$sizes += $sizesRowset->normalize('product_id', 'attribute_value');
		}

//		foreach ($rowset as $row) {
//			self::$sizes[$row->getProductId()] = $row->getAttributeValue();
//		}
	}
}