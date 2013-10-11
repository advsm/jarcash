<?php

/**
 * Description of List_Showcase_Random
 *
 * @author a.novikov
 */
class List_Showcase_Random extends List_Showcase_Base {


	protected $showcase_id;
	protected $category_id;
	protected $name;
	protected $products;
	protected $link;
	protected $color;
	protected $key;

	/**
	 *
	 * @param array $var
	 * @return List_Showcase_Random
	 */
	public static function factory($var) {
		if (is_array($var)) {
			return self::fromArray($var);
		}
		else {
			throw new InvalidArgumentException('Cannot create object, invalid argument type');
		}
	}

	/**
	 *
	 * @param array $var
	 * @return List_Showcase_Random
	 */
	public static function fromArray(array $arr) {
		$showcase = Lib::isset_or($arr['showcase']);
		$count = (int)Lib::isset_or($arr['count']);

		if (!($showcase instanceof Showcase) || !$count) {
			throw new InvalidArgumentException('Attay do not contain important fields');
		}

		$element = new self();

		$element->_setFields($showcase, 'products');
		
		$productsRowset = $showcase->getRandomProductsRowset($count);
		
		$element->products	= ContentList::factoryByClassName('List_Product_ShowcaseRandom', $productsRowset);

		return $element;
	}

	protected function setLink(Showcase $showcase) {
		$params = array(
			'showcase'	=> $showcase->getShowcaseKey(),
			'category'	=> $showcase->getCategoryKey()
		);
		
		$this->link = ShowcaseService::getInstance()->getLinkArray($params);
	}
	
	protected function setColor(Showcase $showcase) {
		$this->color = StringFunctions::getCssColor($showcase->getColor());
	}

	protected function setKey(Showcase $showcase) {
		$this->key = $showcase->getShowcaseKey();
	}
}