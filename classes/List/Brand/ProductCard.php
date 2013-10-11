<?php

/**
 * Description of List_Brand_ProductCard
 *
 * @author a.novikov
 */
class List_Brand_ProductCard extends List_Brand_Base {

	protected $id;
	protected $name;
	protected $url;
	protected $photo;

	/**
	 *
	 * @param EventsRow $row
	 * @return List_Brand_ProductCard
	 */
	public static function factory($var) {
		if ($var instanceof ProductBrandRow) {
			return self::fromProductBrandRow($var);
		}
		else {
			throw new InvalidArgumentException('Cannot create object, invalid argument type');
		}
	}

	/**
	 *
	 * @param fromProductBrandRow $row
	 * @return List_Brand_ProductCard
	 */
	public static function fromProductBrandRow(ProductBrandRow $row) {
		$element = new self();

		$element->_setFields($row);

		return $element;
	}

	protected function setPhoto(ProductBrandRow $row) {
		$photoRow = $row->getPhotoRowByPhotoId();
		if ($photoRow) {
			$this->photo = StringFunctions::getImageUrlResized( $photoRow->getFilePreview() , 125, 54);
		}
	}
}