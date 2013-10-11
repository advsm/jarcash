<?php

/**
 * Description of List_Product_Base
 *
 * @author a.novikov
 */
abstract class List_Product_Base extends List_Base {
	
	/**
	 *
	 * @param int $price
	 */
	protected function setPrice(ProductRow $row) {
		$price = (int)$row->getPrice();
		$this->price = StringFunctions::partPrice( $price );
	}
}