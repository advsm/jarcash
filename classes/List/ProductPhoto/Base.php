<?php

/**
 * Description of List_Photo_Base
 *
 * @author a.novikov
 */
abstract class List_ProductPhoto_Base extends List_Base {

	/**
	 *
	 * @param string $name
	 */
	protected function setBig($name) {
		$this->big = StringFunctions::getImageUrlResized($name, 320, 495, true);
	}

	protected function setBig1($name) {
		$this->big1 = StringFunctions::getImageUrlResized($name, 800, 600, true);
	}


	/**
	 *
	 * @param string $name
	 */
	protected function setSmall($name) {
		$this->small = StringFunctions::getImageUrlResized($name, 84, 84);
	}
}