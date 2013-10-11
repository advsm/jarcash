<?php

/**
 * Description of List_Product_Base_Subproduct
 *
 * @author a.novikov
 */
abstract class List_Product_Base_Subproduct extends List_Product_Base {

	protected function setInBasket(ProductRow $row) {
		$this->in_basket = BasketService::getInstance()->getBasket()->checkProduct($row->getId());
	}
}