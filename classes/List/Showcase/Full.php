<?php

/**
 * Description of List_Showcase_Full
 *
 * @author a.novikov
 */
class List_Showcase_Full extends List_Showcase_Base {


	protected $showcase_id;
	protected $category_id;
	protected $name;
	protected $product_select;

	/**
	 *
	 * @param Showcase $var
	 * @return List_Showcase_Random
	 */
	public static function factory($var) {
		if ($var instanceof Showcase) {
			return self::fromShowcase($var);
		}
		else {
			throw new InvalidArgumentException('Cannot create object, invalid argument type');
		}
	}

	/**
	 *
	 * @param Showcase $showcase
	 * @return List_Showcase_Full
	 */
	public static function fromShowcase(Showcase $showcase) {
		$element = new self();
		
		$element->_setFields($showcase);

		return $element;
	}
}