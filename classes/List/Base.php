<?php

/**
 * Description of List_Base
 *
 * @author a.novikov
 */
abstract class List_Base extends UnderscoreGetters implements IContentListElement, IFactory  {

	protected $_object;

	public static function prepareCommonData($list) {

	}

	/**
	 *
	 * @param mixed $object
	 * @param array|string $skipFields
	 */
	protected function _setFields($object, $skipFields = array()) {
		ArrayFunctions::makeArray($skipFields);

		$skipFields[] = '_object';

		$skipFields = array_flip($skipFields);

		foreach ($this as $name => $v) {
			if ( isset( $skipFields[$name] ) ) {
				continue;
			}
			
			$setterName = StringFunctions::setterNameUnderscore($name);
			if (method_exists($this, $setterName)) {
				$this->$setterName($object);
			}
			else {
				$this->$name = MethodFunctions::callGetterUnderscore($object, $name);
			}
		}

		$this->_object = $object;
	}
}