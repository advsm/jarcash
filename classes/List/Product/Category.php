<?php

/**
 * Description of List_Product_Category
 *
 * @author a.novikov
 */
class List_Product_Category extends List_Product_Base_SmallBlock {

	protected $rating;
	protected $gender;
	protected $is_sale;
	protected $is_new;
	protected $is_hit;
	protected $is_recommended;

	/**
	 *
	 * @param ProductRow $var
	 * @return List_Product_Category
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
	 * @return List_Product_Category
	 */
	public static function  fromProductRow(ProductRow $row) {
		$element = new self();

		$element->_setFields($row);

		return $element;
	}

	protected function setName(ProductRow $row) {
		$this->name = StringFunctions::smartCut($row->getName(), 85);
	}
}