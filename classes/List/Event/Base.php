<?php

/**
 * Description of List_Event_Base
 *
 * @author a.novikov
 */
abstract class List_Event_Base extends List_Base {

	protected static function getLink(EventsRow $row) {
		$link = $row->getLink();

		if ($link === null) {
			$params = array(
				'id' => (int)$row->getId()
			);
			$link = EventsService::getInstance()->getLinkArray($params);
		}

		return $link;
	}

	protected function setLink(EventsRow $row) {
		$this->link = self::getLink($row);
	}
}