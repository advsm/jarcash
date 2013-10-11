<?php

class Image_Resource_Path extends Image_Resource
{
	/**
	 * Getting local file content.
	 * 
	 * @see classes/Image/Image_Resource#getContent()
	 * @return string
	 */
	public function getContent()
	{
		$path = BASE_DIR . '/htdocs' . $this->getName();
		if(!file_exists($path)) {
			throw new Image_Exception('File not exists: ' . $path);
		};
		return file_get_contents($path);
	}
}