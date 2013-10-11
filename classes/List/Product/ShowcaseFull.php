<?php

/**
 * Description of List_Product_ShowcaseRandom
 *
 * @author a.novikov
 */
class List_Product_ShowcaseFull extends List_Product_Base_Card {

	protected $name;
	protected $price;
	protected $link;
	protected $id;
	protected $preview;
	protected $count;
	protected $in_basket;

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
}