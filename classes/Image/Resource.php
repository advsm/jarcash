<?php

abstract class Image_Resource
{
	/**
	 * @var string
	 */
	protected $_name;

	/**
	 * @var integer
	 */
	protected $_width;

	/**
	 * @var integer
	 */
	protected $_height;

	public function __construct($resource)
	{
		$this->setName($resource);
	}

	/**
	 * @param string $height
	 * @return void
	 */
	public function setHeight($_height) {
		$this->_height = $_height;
	}

	/**
	 * @param string $width
	 * @return void
	 */
	public function setWidth($_width) {
		$this->_width = $_width;
	}

	/**
	 * @param string $name
	 * @return void
	 */
	public function setName($_name) {
		$this->_name = $_name;
	}

	/**
	 * @return string
	 */
	public function getHeight() {
		return $this->_height;
	}

	/**
	 * @return string
	 */
	public function getWidth() {
		return $this->_width;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->_name;
	}


	/**
	 * Creating new Resource object by mixed params.
	 *
	 * @param mixed $resource
	 * @return Image_Resource
	 */
	public static function factory($resource)
	{
		if (substr($resource, 0, 1) == '/') {
			return new Image_Resource_Path($resource);
		} else if (substr($resource, 0, 4) == 'http') {
			return new Image_Resource_Url($resource);
		} else {
			throw new Image_Exception('Cant define resource type: ' . $resource);
		}
	}

	/**
	 * Path to cached image.
	 *
	 * @return string
	 */
	public function getUrl()
	{
		$width = $this->getWidth();
		$height = $this->getHeight();
		$hash = md5($this->getName());
		$dir = "/proxy/cache/{$width}x{$height}";
		$filename = "/$hash.jpg";
		// Trying to create directory if it not exists.
		$path = BASE_DIR . '/htdocs' . $dir;
		if (!is_dir($path)) {
			mkdir($path, 0777);
		}

		return $dir . $filename;
	}

	/**
	 * Get content of image.
	 *
	 * @return string
	 */
	abstract public function getContent();
}