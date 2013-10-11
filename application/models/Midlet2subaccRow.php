<?php

require_once 'Base/Midlet2subaccRow.php';

/**
 * Generated Model class.
 */
class Midlet2subaccRow extends Base_Midlet2subaccRow
{
	/**
	 * Получение ссылки для скачивания мидлета.
	 * 
	 * @return string
	 */
	public function getExternalPath()
	{
		$host = Config::getInstance()->midlet->files_domain;
		$profileId = $this->getSubaccRowBySubaccId()->getProfileId();
		$midletId = $this->getMidletId();
		$subaccId = $this->getId();
		$key = $this->getMidletRowByMidletId()->getKey();

		return "http://$host/file/$profileId/$midletId/$subaccId/$key.jar";
	}
}

