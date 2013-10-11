<?php

class CodeGenerator_CriteriaGenerator
{
	const PATH_TO_CRITERIA_FOLDER = '../application/criteria/';
	const PATH_TO_SERVICE_FOLDER = '../application/service/';
	const BASE_CRITERIA_CLASS = 'Criteria';
	const PATH_TO_XML = '../config/criteria.xml';
	
	private $definition;
	
	private function init()
	{
		$this->processDefinitionXml();
		
	}
	
	
	public function run()
	{
		$this->init();
	}
	
	private function processDefinitionXml()
	{
		$xml = simplexml_load_file(self::PATH_TO_XML);
		foreach ($xml as $criteria) {
			$name = $criteria->getName();
			foreach ($criteria->children() as $field) {
				foreach ($field->attributes() as $key => $value) {
					d($field, $key, $value);
					$this->definition[$name][$field][$key] = $value;
				}
			}
		}
		d($this->definition);
	}
	
}