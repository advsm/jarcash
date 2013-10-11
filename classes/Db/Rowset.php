<?php

class Db_Rowset extends Zend_Db_Table_Rowset_Abstract
{

	/**
	 *
	 * @param array|string $keyFields
	 * @param string|null $valueField
	 * @param bool $multiValue
	 * @return array
	 */
	public function normalize($keyFields, $valueField = null, $multiValue = false) {
		if ($multiValue) {
			ArrayFunctions::makeArray($keyFields);
			$keyFields[] = 'id';
		}
		return ArrayFunctions::normalize($this, $keyFields, $valueField);
	}
	
	/**
	 * Возвращает значение, если у всех элементов rowseta колонка имеет одно и то же значение.
	 * В противном случае вернет null.
	 * 
	 * @param string $column
	 * @return string
	 */
	public function getOverallValue($column)
	{
		$filter = new Zend_Filter_Word_UnderscoreToCamelCase();
		$method = 'get' . ucfirst($filter->filter($column));
		
		foreach ($this as $row) {
			$currentValue = $row->$method();
			if (!isset($value)) { 
				$value = $currentValue;
				continue;
			}
			
			if ($value !== $currentValue) return null;
		}
		
		return $value;
	}
	
	/**
	 * Устанавливает значение для !всех! элементов rowseta.
	 * Не производит сохранение.
	 * 
	 * @param string $key
	 * @param mixed $value
	 * @return void
	 */
	public function setOverallValue($key, $value)
	{
		$filter = new Zend_Filter_Word_UnderscoreToCamelCase();
		$method = 'set' . ucfirst($filter->filter($key));
		
		foreach ($this as $row) {
			$row->$method($value);
		}
	}

	/**
	 * Делает операцию ->save() для всех Row внутри этого rowseta.
	 * 
	 * @return void
	 */
	public function save()
	{
		foreach ($this as $row) {
			$row->save();
		}
	}
}

