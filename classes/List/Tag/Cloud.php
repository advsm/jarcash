<?php

/**
 * Description of List_Tag_Cloud
 *
 * @author a.novikov
 */
class List_Tag_Cloud extends List_Tag_Base {

	protected $name;
	protected $size;
	protected $link;

	/**
	 *
	 * @param TagRow $var
	 * @return List_Tag_Cloud
	 */
	public static function factory($var) {
		if ($var instanceof TagRow) {
			return self::fromTagRow($var);
		}
		else {
			throw new InvalidArgumentException('Cannot create object, invalid argument type');
		}
	}

	/**
	 *
	 * @param TagRow $row
	 * @return List_Tag_Cloud
	 */
	public static function fromTagRow(TagRow $row) {
		$element = new self();

		$element->_setFields($row);

		return $element;
	}

	/**
	 *
	 * @param TagRow $row
	 */
	public function setLink(TagRow $row) {
		$params = array(
			'key'	=> $row->getKey()
		);

		$this->link = TagService::getInstance()->getLinkArray($params);
	}

	/**
	 *
	 * @param TagRow $row
	 */
	protected function setSize(TagRow $row) {
        $id = $row->getId();

        $peer = Tag2productPeer::getInstance();
        $select= Tag2productPeer::getInstance()->select();
        $select->where('tag_id='.$id);
        $row = $peer->fetchAll($select);
        $product_count = count($row);
        
        $min_count = 10;
        if($product_count > ($min_count * 10)){
            $size = 10;
        }else if($product_count < ($min_count / 2)){
            $size = 1;
        }else{
            $size = round($product_count / $min_count);
        }
		$this->size = $size;
	}
}