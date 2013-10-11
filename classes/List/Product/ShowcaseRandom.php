<?php

/**
 * Description of List_Product_ShowcaseRandom
 *
 * @author a.novikov
 */
class List_Product_ShowcaseRandom extends List_Product_Base_SmallBlock {

	/**
	 *
	 * @param ProductRow $var
	 * @return List_Product_ShowcaseRandom
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
	 * @param ProductRow $var
	 * @return List_Product_ShowcaseRandom
	 */
	public static function  fromProductRow(ProductRow $row) {
		$productList = new self();

		$productList->_setFields($row);

		return $productList;
	}

	public function setName(ProductRow $row) {
		$this->name = StringFunctions::smartCut($row->getName(), 55);
	}
}