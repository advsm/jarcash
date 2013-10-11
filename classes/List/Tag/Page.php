<?php

/**
 * Description of List_Tag_Page
 *
 * @author a.novikov
 */
class List_Tag_Page extends List_Tag_Base {

	protected $name;
	protected $product_select;
//	protected $link;

	/**
	 *
	 * @param TagRow $var
	 * @return List_Tag_Page
	 */
	public static function factory($var) {
		if ($var instanceof TagRow) {
			return self::fromTagRow($var);
		}
		else {
			throw new InvalidArgumentException('Cannot create object, invalid argument type');
		}
	}

	/**
	 *
	 * @param PhotoRow $row
	 * @return List_Tag_Page
	 */
	public static function fromTagRow(TagRow $row) {
		$element = new self();

		$element->_setFields($row);

		return $element;
	}

	public function setProductSelect(TagRow $row) {
		$this->product_select = $row->getProductSelectByProduct2tag();
	}
}