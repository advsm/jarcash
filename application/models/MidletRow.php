<?php

require_once 'Base/MidletRow.php';

/**
 * Generated Model class.
 */
class MidletRow extends Base_MidletRow
{
	/**
	 * Возвращает полный путь в файловой системе до иконки, принадлежащей мидлету.
	 * 
	 * @return string
	 */
	public function getInternalIconPath()
	{
		return Config::getInstance()->midlet->icon_dir . "/" . $this->getIcon();
	}
	
	/**
	 * Возвращает путь к иконке относительно htdocs, подходит для вызова в шаблонах.
	 * 
	 * @return string
	 */
	public function getExternalIconPath()
	{
		$path = $this->getInternalIconPath();
		$path = preg_replace('/.+htdocs/', '', $path);
		return $path;
	}
}

