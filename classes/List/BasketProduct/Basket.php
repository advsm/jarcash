<?php

class List_BasketProduct_Basket extends List_BasketProduct_Base {

	protected $id;
	protected $name;
	protected $price;
	protected $count;
	protected $cost;
	protected $image;
	protected $link;

	/**
	 *
	 * @param BasketProduct $var
	 * @return List_BasketProduct_Basket
	 */
	public static function factory($var) {
		if ($var instanceof BasketProduct) {
			return self::fromBasketProduct($var);
		}
		else {
			throw new InvalidArgumentException('Cannot create object, invalid argument type');
		}
	}

	/**
	 *
	 * @param BasketProduct $product
	 * @return List_BasketProduct_Basket
	 */
	public static function  fromBasketProduct(BasketProduct $product) {
		$element = new self();

		$element->_setFields($product);

		return $element;
	}

	protected function setPrice(BasketProduct $product) {
		$this->price = StringFunctions::partPrice( $product->getPrice() );
	}

	protected function setCost(BasketProduct $product) {
		$this->cost = StringFunctions::partPrice( $product->getCost() );
	}

	protected function setImage(BasketProduct $product) {
		$row = $product->getCardRow();
		$this->image = StringFunctions::getImageUrlResized( $row->getFileImage() , 82, 82);
	}

	protected function setLink(BasketProduct $product) {
		$params = array(
			'id' => $product->getCardRow()->getId()
		);
		$this->link = ProductService::getInstance()->getLinkArray($params);
	}
}