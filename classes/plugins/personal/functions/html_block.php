<?php

function Dwoo_Plugin_html_block(Dwoo $dwoo, $key)
{
	$adapter = Db::getConnection();
	$text = $adapter->fetchCol("SELECT text FROM html_block WHERE `key` = '$key' AND `enabled` = 1");
	if(substr($key, 0, 12) == "regist_text_" && empty($text[0])) $text = $adapter->fetchCol("SELECT text FROM html_block WHERE `key` = 'regist_text_'  AND `enabled` = 1");
	return $text ? $text[0] : "";
}
