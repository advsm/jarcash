<?php

/**
 * Класс работает по новой схеме, которую придумали мы со Смирновым.
 *
 * @author a.novikov
 */
abstract class List_ProductCategory_Base_Dropdown extends List_Base {

	protected $id;
	protected $name;
	protected $link;

	public function setLink(ProductCategoryRow $row) {
		$params = array(
			'name'	=> $row->getKey()
		);

		$this->link = CategoryService::getInstance()->getLinkArray($params);
	}
}