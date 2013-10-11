<?php

/**
 * Класс работает по новой схеме, которую придумали мы со Смирновым.
 *
 * @author a.novikov
 */
abstract class List_ProductCategory_Base extends List_Base {

	public function setLink(ProductCategoryRow $row) {
		$params = array(
			'name'	=> $row->getKey()
		);

		$this->link = CategoryService::getInstance()->getLinkArray($params);
	}
}