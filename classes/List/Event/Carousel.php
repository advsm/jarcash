<?php

/**
 * Description of List_Event_Carousel
 *
 * @author a.novikov
 */
class List_Event_Carousel extends List_Event_Base {
	
	protected $name;
	protected $text;
	protected $link;
	protected $type_id;
	protected $start_at;

	protected $type_key;

	/**
	 *
	 * @param EventsRow $row
	 * @return List_Event_Carousel
	 */
	public static function factory($var) {
		if ($var instanceof EventsRow) {
			return self::fromEventsRow($var);
		}
		else {
			throw new InvalidArgumentException('Cannot create object, invalid argument type');
		}
	}

	/**
	 *
	 * @param EventsRow $row
	 * @return List_Event_Carousel
	 */
	public static function fromEventsRow(EventsRow $row) {
		$element = new self();

		$element->_setFields($row);

		return $element;
	}
	
	protected function setStartAt(EventsRow $row) {
		$this->start_at = (int)substr($row->getStartAt(), -2);
	}

	protected function setTypeKey(EventsRow $row) {
		$this->type_key = $row->getEventTypesRowByTypeId()->getKey();
	}

	protected function setText(EventsRow $row) {
	 $this->text = StringFunctions::smartCut($row->getText(), 350);
	}
}