<?php

function Dwoo_Plugin_html_img(Dwoo $dwoo, $key)
{
	$adapter = Db::getConnection();
	$imgrow = $adapter->fetchRow("SELECT src FROM html_img WHERE `key` = '$key'");
	if(substr($key, 0, 12) == "register_img" && empty($imgrow['src'])) $imgrow = $adapter->fetchRow("SELECT src, width, height FROM html_img WHERE `key` = 'register_img'");
	$text = $imgrow['src'];
	return $text;
}
