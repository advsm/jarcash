<?php

class Image_Resizer
{
	protected static $_quality = 85;
	/**
	 * Resize image to neede size.
	 *
	 * @param string $content
	 * @param int $width
	 * @param int $height
	 * @return string
	 */
	public static function resize($content, $width, $height)
	{
		// needed
		$width = intval($width);
		$height = intval($height);

		// create original image
		$src = imagecreatefromstring($content);

		// calculate dimensions for resized image
		$newDimensions = array(
			'width'		=> $width,
			'height'	=> $height,
		);

		// create canvas for resized picture
		$resizedSrc = imagecreatetruecolor($newDimensions['width'], $newDimensions['height']);
		//preserve alpha
		imagealphablending($resizedSrc, false);
		imagesavealpha($resizedSrc, true);
		// resize
		imagecopyresampled($resizedSrc, $src, 0, 0, 0, 0, imagesx($resizedSrc), imagesy($resizedSrc), imagesx($src), imagesy($src));

		// Create destination image object with transparent background
		$dest = imagecreatetruecolor($width, $height);
		imagealphablending($dest, false);
		imagesavealpha($dest, true);
		imagefilledrectangle($dest, 0, 0, imagesx($dest), imagesy($dest), imagecolortransparent($dest));

		// Resize source image to fit new dimensions
		imagecopyresampled(
			$dest, $resizedSrc, // destination and source images
			intval(($width - $newDimensions['width']) / 2), intval(($height - $newDimensions['height']) / 2), // destination image X and Y
			0, 0, // source image X and Y
			$newDimensions['width'], $newDimensions['height'], // destination with and height
			$newDimensions['width'], $newDimensions['height'] // source image dimensions
		);
		// intval(($width - $cWidth) / 2), intval(($height - $cHeight) / 2)

		ob_start();
		imagejpeg($dest, null, self::$_quality);
		$content = ob_get_clean();

		// Destroy image resources
		imagedestroy($src);
		// Destroy destination image resource
		imagedestroy($dest);
		// Destroy resized image resource
		imagedestroy($resizedSrc);

		return $content;
	}

	/**
	 * Crop image by content.
	 *
	 * @param string $content
	 * @param integer $width
	 * @param integer $height
	 * @return string
	 */
	public static function crop($content, $width, $height) {
		$width = intval($width);
		$height = intval($height);

		$src = imagecreatefromstring($content);

		$source_w = imagesx($src);
		$source_h = imagesy($src);

		/* if ($source_h >= $source_w) {
			$rect_size = $source_w;
		}
		else {
			$rect_size = $source_h;
		} */

		$dest = imagecreatetruecolor($width,$height);

		imagecopy ($dest, $src, 0, 0, intval(($source_w - $width) / 2), intval(($source_h - $height) / 2), $width, $height);

		ob_start();
		imagejpeg($dest, null, self::$_quality);
		$content = ob_get_contents();
		ob_end_clean();
		imagedestroy($src);
		imagedestroy($dest);

		return $content;
	}

	/**
	 * Method to calculate new proportional dimensions
	 * for rectangle defined with $in* params, that can
	 * be inscribed into another rectangle defined  by
	 * $bound* params. Used to calculate new dimensions
	 * of preview image that must be inscribed into
	 * preview canvas.
	 *
	 * @param int $boundWidth
	 * @param int $boundHeight
	 * @param int $inWidth
	 * @param int $inHeight
	 * @return array resulting array have 'width' and 'height' fields
	 */
	public static function inscribe($boundWidth, $boundHeight, $inWidth, $inHeight)
	{
		$scaleW = $boundWidth/$inWidth;
		$scaleH = $boundHeight/$inHeight;

		$scale = min($scaleW, $scaleH);
		if (1 < $scale) {
			$scale = 1;
		}

		$result = array(
			'width'		=> round($scale*$inWidth),
			'height'	=> round($scale*$inHeight),
		);

		return $result;
	}

	/**
	 * @return array
	 */
	public static function getImageDimensions($resource)
	{
		$result = array(
			'width'		=> imagesx($resource),
			'height'	=> imagesy($resource),
		);
		return $result;
	}
	
	
	public static function watermark($content) {

		$pct = 100;
		//@todo переделать на конфиг, или лучше
		$warermark_src = BASE_DIR.'/htdocs/images/watermark_10px.png';

		// create original image
		$image = imagecreatefromstring($content);
		
		$width = imagesx($image);
		$height = imagesy($image);
		
		$watermark = self::fix_image_resource(imagecreatefrompng($warermark_src), $width / 2, $height / 2);

		$watermark_width = imagesx($watermark);
		$watermark_height = imagesy($watermark);
		$dest_x = $width - $watermark_width - 5;
		$dest_y = $height - $watermark_height - 5;

		self::imagecopymerge_alpha($image, $watermark, $dest_x, $dest_y, 0, 0, $watermark_width, $watermark_height, $pct);
		
		ob_start();
		imagejpeg($image, null, self::$_quality);
		$content = ob_get_contents();
		ob_end_clean();
		
		return $content;
	}
	
	
	public static function fix_image_resource($image, $max_width, $max_height) {
		$width = imagesx($image);
		$height = imagesy($image);

		$k = max($width / $max_width, $height / $max_height, 1);

		if ($k == 1) {
			return $image;
		}

		$new_width = (int)($width / $k);
		$new_height = (int)($height / $k);

		$image_new = imagecreatetruecolor($new_width, $new_height);

		imagecolortransparent($image_new, imagecolorallocate($image_new, 0, 0, 0));
		imagealphablending($image_new, false);
		imagesavealpha($image_new, true);

		imagecopyresampled($image_new, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

		return $image_new;
	} 
	

    /**
     * PNG ALPHA CHANNEL SUPPORT for imagecopymerge();
     * This is a function like imagecopymerge but it handle alpha channel well!!!
     **/
	public static function imagecopymerge_alpha($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h, $pct){
		// getting the watermark width
		$w = imagesx($src_im);
		// getting the watermark height
		$h = imagesy($src_im);

		// creating a cut resource
		$cut = imagecreatetruecolor($src_w, $src_h);
		// copying that section of the background to the cut
		imagecopy($cut, $dst_im, 0, 0, $dst_x, $dst_y, $src_w, $src_h);

		// placing the watermark now
		imagecopy($cut, $src_im, 0, 0, $src_x, $src_y, $src_w, $src_h);
		imagecopymerge($dst_im, $cut, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h, $pct);
	}
}