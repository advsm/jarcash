<?php

function Dwoo_Plugin_proxy(Dwoo $dwoo, $url, $width, $height)
{
	try {
		return Image_Replication::getInstance()->getPreview($url, $width, $height);
	} catch (Image_Exception $error) {
			return "";
	}
}
