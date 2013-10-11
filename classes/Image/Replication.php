<?php

class Image_Replication implements ISingleton
{
	/**
     * @var Image_Replication
     */
    protected static $_instance = null;

    /**
     * @return Image_Replication
     */
    protected function __construct() {}

    /**
     * Returns an instance of Image_Replication
     * Singleton pattern implementation
     *
     * @return Image_Replication
     */
    public static function getInstance()
    {
        if (null === self::$_instance) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

	/**
	 * Try to get preview for image from cache.
	 * If preview not exists - generate preview.
	 *
	 * @param Image_Resource|string $resource HTTP url of local path.
	 * @param integer $width
	 * @param integer $height
	 * @param bool $waterMark
	 */
	public function getPreview($resource, $width = null, $height = null, $waterMark = false)
	{
		// Create resource
		if (!$resource instanceof Image_Resource) {
			$resource = Image_Resource::factory($resource);
			$resource->setWidth($width);
			$resource->setHeight($height);
		}

		//$cachedImagePathHtdocs = "/proxy/cache/{$width}x{$height}/$resourceHash.png";
		//$cachedImagePath = BASE_DIR . '/htdocs' . $cachedImagePath;

		// At first check for resource in cache.
		if ($this->isCached($resource)) {
			return $resource->getUrl();
		};
		
		if (!isset($url)) {
			$url='';
		};
		$content = $resource->getContent($resource);
		try {
			$imageResource = imagecreatefromstring($content);
		} catch (E_WARNING $e) {
			throw new Image_Exception($url . " is not an image. " . $e->getMessage());
		}

		if (!$sourceImageDimensions = Image_Resizer::getImageDimensions($imageResource)) {
			throw new Image_Exception("Get Dimensions Error.");
		}
		
		/**
		 * crop fixed
		 * @author a.novikov
		 */

		$oldHeight = $sourceImageDimensions['height'];
		$oldWidth = $sourceImageDimensions['width'];

		$coeff = max($oldWidth / $width, $oldHeight / $height, 1);

		$content = Image_Resizer::resize($content, (int)($oldWidth / $coeff), (int)($oldHeight / $coeff) );

		if (!$content) {
			throw new Image_Exception("Image resize error.");
		}
		
		//водяные знаками
		if ($waterMark) {
			$content = Image_Resizer::watermark($content);
		}
		
		$this->save($resource, $content);
//
//		$ratio = ($sourceImageDimensions['width'] / $sourceImageDimensions['height']);
//		$targetRatio = $width / $height;
//		if($ratio > $targetRatio){
//			$resizeHeight = $height;
//			$resizeWidth = intval($height*$ratio);
//		} else {
//			$resizeWidth = $width;
//			$resizeHeight = intval($width/$ratio);
//		}
//
//		if (!$resizeResult = Image_Resizer::resize($content, $resizeWidth, $resizeHeight)){
//			throw new Image_Exception("Image resize error.");
//		}
//
//		if (!$cropResult = Image_Resizer::crop($resizeResult, $width, $height)) {
//			throw new Image_Exception("Image crop error.");
//		}
//
//		$this->save($resource, $cropResult);
		return $resource->getUrl();
	}

	/**
	 * Return true where resource found in cache.
	 *
	 * @param Image_Resource $resource
	 * @return boolean
	 */
	public function isCached($resource)
	{
		$path = BASE_DIR . '/htdocs' . $resource->getUrl();
		return file_exists($path);
	}

	/**
	 * Save resource
	 *
	 * @param Image_Resource $resource
	 * @param string $content Image content
	 * @return boolean
	 */
	public function save($resource, $content)
	{
		$path = BASE_DIR . '/htdocs' . $resource->getUrl();
		$fp = fopen($path, 'wb');
		if (!$fp) {
			throw new Image_Exception('Cant save file: ' . $path);
		}

		$result = fwrite($fp, $content);
		fclose($fp);
		
		chmod($path, 0664);

		return $result;
	}
}