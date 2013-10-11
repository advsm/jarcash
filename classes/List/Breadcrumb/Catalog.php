<?php

/**
 * Description of List_Breadcrumb_Catalog
 *
 * @author a.novikov
 */
class List_Breadcrumb_Catalog extends List_Breadcrumb_Base {

	protected $name;
	protected $link;
	protected $dropdown_categories;

	/**
	 *
	 * @param mixed $source
	 * @return List_Breadcrumb_Catalog $element
	 */
	public static function factory($source) {
		if ($source instanceof Breadcrumb) {
			$breadcrumb = $source;
		}
		elseif ($source instanceof ProductRow) {
			$breadcrumb = Breadcrumb::fromProductRow($source);
		}
		elseif ($source instanceof ProductCategoryRow) {
			$breadcrumb = Breadcrumb::fromProductCategoryRow($source);
		}
		else {
			throw new InvalidArgumentException('Cannot create object, invalid argument type');
		}

		return self::fromBreadcrumb($breadcrumb);
	}

	/**
	 *
	 * @param Breadcrumb $breadcrumb
	 * @return List_Breadcrumb_Catalog $element
	 */
	public static function fromBreadcrumb(Breadcrumb $breadcrumb) {
		$element = new self();

		$element->_setFields($breadcrumb);

		return $element;
	}

	public function setDropdownCategories(Breadcrumb $breadcrumb) {
		$this->dropdown_categories = ContentList::factoryByClassName('List_ProductCategory_BreadcrumbDropdown', $breadcrumb->getDropdownCategoriesRowset());
	}
}