<?php

function Dwoo_Plugin_img_proxy(Dwoo $dwoo, $url, $width=-1, $height=-1)
{
	try {
		$file_img = StringFunctions::getFileUrl($url);
		if( $width == -1 && $height ==-1 )
		//if( !isset($width) && !isset($height) )
		  return $file_img;
		return Image_Replication::getInstance()->getPreview($file_img, $width, $height);
	} catch (Image_Exception $error) {
			return "";
	}
}
