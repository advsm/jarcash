<?php

/**
 * Description of List_Country_ProductCard
 *
 * @author a.novikov
 */
class List_Country_ProductCard extends List_Country_Base {

	protected $id;
	protected $name;

	/**
	 *
	 * @param CountriesRow $row
	 * @return List_Country_ProductCard
	 */
	public static function factory($var) {
		if ($var instanceof CountriesRow) {
			return self::fromCountriesRow($var);
		}
		else {
			throw new InvalidArgumentException('Cannot create object, invalid argument type');
		}
	}

	/**
	 *
	 * @param CountriesRow $row
	 * @return List_Country_ProductCard
	 */
	public static function fromCountriesRow(CountriesRow $row) {
		$element = new self();

		$element->_setFields($row);

		return $element;
	}
}