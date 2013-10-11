<?php

/**
 * Description of List_ProductCategory_BreadcrumbDropdown
 *
 * @author a.novikov
 */
class List_ProductCategory_BreadcrumbDropdown extends List_ProductCategory_Base_Dropdown {

	/**
	 *
	 * @param ProductCategoryRow $var
	 * @return List_ProductCategory_BreadcrumbDropdown
	 */
	public static function factory($var) {
		if ($var instanceof ProductCategoryRow) {
			return self::fromProductCategoryRow($var);
		}
		else {
			throw new InvalidArgumentException('Cannot create object, invalid argument type');
		}
	}

	/**
	 *
	 * @param ProductCategoryRow $row
	 * @return List_ProductCategory_BreadcrumbDropdown
	 */
	public static function fromProductCategoryRow(ProductCategoryRow $row) {
		$element = new self();

		$element->_setFields($row);

		return $element;
	}
}