<?php

/**
 * Description of List_Product_Card
 *
 * @author a.novikov
 */
class List_Product_Card extends List_Product_Base_Card {

	protected $id;
	protected $parent_id;
	protected $internal_id;
	protected $name;
	protected $price;
	protected $product_number;

	protected $country;
	protected $count;

	protected $short_desc;
	protected $full_desc;

	protected $rating;
	protected $votes_count;

	protected $gender;
	protected $age_from;
	protected $age_to;

	protected $is_sale;
	protected $is_new;
	protected $is_hit;
	protected $is_recommended;

	protected $brand;
	protected $tag_rowset;

	protected $photos;

	protected $product_options;

	protected $attributes;

	protected $weight;

	/**
	 *
	 * @param ProductRow $var
	 * @return List_Product_Card
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
	 * @return List_Product_Card
	 */
	public static function  fromProductRow(ProductRow $row) {
		$element = new self();

		$element->_setFields($row);

		return $element;
	}

	protected function setBrand(ProductRow $row) {
		$brandRow = $row->getProductBrandRowByBrandId();
		if ($brandRow) {
			$this->brand = List_Brand_ProductCard::fromProductBrandRow($brandRow);
		}
	}

	protected function setCountry(ProductRow $row) {
		$countryRow = $row->getCountriesRowByCountryId();
		if ($countryRow) {
			$this->country = List_Country_ProductCard::fromCountriesRow($countryRow);
		}
	}

	protected function setPhotos(ProductRow $row) {
		$photoRowset = $row->getPhotoRowsetByProduct2photo();
		$this->photos = ContentList::factoryByClassName('List_ProductPhoto_Card', $photoRowset);
		
		$imageName = $row->getFileImage();
		if ($imageName) {
			$firstPhoto = List_ProductPhoto_Card::fromFileName( $imageName );
			$this->photos->addElementBefore($firstPhoto);
			//throw new Exception_NotFound('Невозможно отобразить страницу');
		}
		
	}

	protected function setProductOptions(ProductRow $row) {
		$rowset = $row->getProductRowsetByParentId();
		$this->product_options = ContentList::factoryByClassName('List_Product_Option', $rowset);
		$element = List_Product_Option::fromProductRow($row);
		$this->product_options->addElementBefore($element);
	}

	protected function setAttributes(ProductRow $row) {
		$select = null;
		if ( $row->getSubproductsCount() ) {
			$select = Product2productAttributePeer::getInstance()->select();
			$select->where( Product2productAttributePeer::ATTRIBUTE_ID.'!='.ProductAttributePeer::getInstance()->getSizeId() );
		}
		$rowset = $row->getProduct2productAttributeRowsetByProductId($select);

		$this->attributes = ContentList::factoryByClassName('List_ProductAttributeValue_Card', $rowset);
	}

	protected function setTagRowset(ProductRow $row) {
		$this->tag_rowset = $row->getTagRowsetByProduct2tag();
	}

	protected function setInstruction(ProductRow $row) {
		$fileName = $row->getFileInstruction();
		if ($fileName) {
			$this->instruction = StringFunctions::getFileUrl($fileName);
		}
	}

	protected function setWeight(ProductRow $row) {
		$this->weight = $row->getWeight()/1000;
	}
}