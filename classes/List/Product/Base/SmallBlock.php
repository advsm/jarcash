<?php

/**
 * Description of List_Product_Base_SmallBlock
 *
 * @author a.novikov
 */
abstract class List_Product_Base_SmallBlock extends List_Product_Base_Card {
	
	protected $id;
	protected $name;
	protected $price;
	protected $link;
	protected $preview;
	protected $count;
	protected $in_basket;
	protected $subproducts_count;

	/**
	 *
	 * @param ProductRow $row
	 */
	protected function setLink(ProductRow $row) {
		$params = array(
			'id' => $row->getId()
		);

		$this->link	= ProductService::getInstance()->getLinkArray($params);
	}

	/**
	 *
	 * @param ProductRow $row
	 */
	protected function setPreview(ProductRow $row) {
		$this->preview = StringFunctions::getImageUrlResized( $row->getFileImage() , 140, 120);
	}

	/**
	 *
	 * @param ProductRow $row
	 */
	protected function setInBasket(ProductRow $row) {
		if (!$row->getSubproductsCount()) {
			$this->in_basket = BasketService::getInstance()->getBasket()->checkProduct($row->getId());
		}
	}
}