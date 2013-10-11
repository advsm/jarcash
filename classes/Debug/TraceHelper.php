<?php
/**
 * Статичный класс, помогающий формировать отладочные сообщения.
 */
class Debug_TraceHelper
{
	/**
	 * Return any variable convert to string.
	 * 
	 * @param mixed $variable
	 * @return string
	 */
	public static function getVarAsString($variable)
	{
		$type = gettype($variable);
		
		switch($type) {
			case 'array' :
				return self::getArrayAsString($variable);
				break;
				
			case 'NULL' :
				return 'NULL';
				break;
				
			case 'boolean' :
				if ($variable === true) {
					return 'TRUE';
				}
				return 'FALSE';
				break;
				
			case 'object' : 
				return 'object ' . get_class($variable) . '()';
				break;
				
			case 'resource' :
				return 'resource';
				break;
				
			case 'unknown type' :
				return 'mixed';
				break;
				
			default :
				$variable = preg_replace('/^\"?(.+?)\"?$/', '\\1', $variable);
				return '"' . $variable . '"';
				break;
		}
	}
	
	/**
	 * Return array converted to string.
	 * 
	 * @param array $array
	 * @return string
	 */
	public static function getArrayAsString($array)
	{
		$elements = array();
		foreach($array as $key => $value) {
			$elements[] = self::getVarAsString($key) . ' => ' . self::getVarAsString($value);
		}
		
		$string = 'array(' . implode(', ', $elements) . ')';
		return $string;
	}
	
	/**
	 * Return formatted stack trace
	 * 
	 * @param array $trace
	 * @return array
	 */
	public static function getStacktrace(array $array)
	{
		$return = array();
		foreach ($array as $row) {
			foreach ($row['args'] as $key => $value) {
				$row['args'][$key] = self::getVarAsString($value);
			}
			
			$function = $row['function'] . '(' . implode(', ', $row['args']) . ')';
			if (!empty($row['class'])) {
				$function = $row['class'] . $row['type'] . $function;
			}
			
			$at = '';
			if (!empty($row['file'])) {
				$at .= ' at ' . $row['file'] . ':' . $row['line'];
			}
			
			$return[] = $function . $at;
		}
		
		return $return;
	}
	
	/**
	 * Return formatted SHORT stack trace
	 * 
	 * @param array $trace
	 * @return array
	 */
	public static function getShortStacktrace(array $array)
	{
		$return = array();
		foreach ($array as $row) {
			$function = $row['function'] . '()';
			if (!empty($row['class'])) {
				$function = $row['class'] . $row['type'] . $function;
			}
			
			$at = '';
			if (!empty($row['file'])) {
				$at .= ' at ' . $row['file'] . ':' . $row['line'];
			}
			
			$return[] = $function . $at;
		}
		
		return $return;
	}
}