<?php

/**
 * Description of List_ProductPhoto_Card
 *
 * @author a.novikov
 */
class List_ProductPhoto_Card extends List_ProductPhoto_Base {

	protected $big1;
	protected $big;
	protected $small;

	/**
	 *
	 * @param PhotoRow $var
	 * @return List_ProductPhoto_Card
	 */
	public static function factory($var) {
		if ($var instanceof PhotoRow) {
			return self::fromPhotoRow($var);
		}
		elseif (is_string($var)) {
			return self::fromFileName($name);
		}
		else {
			throw new InvalidArgumentException('Cannot create object, invalid argument type');
		}
	}

	/**
	 *
	 * @param PhotoRow $row
	 * @return List_ProductPhoto_Card
	 */
	public static function fromPhotoRow(PhotoRow $row) {
		return self::fromFileName($row->getFilePreview());
	}
	
	public static function fromFileName($name) {
		$element = new self();

		$element->_setFields($name);

		return $element;
	}
}