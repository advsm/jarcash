<?php

function Dwoo_Plugin_long_name(Dwoo $dwoo, $name, $sub_ln=47, $ln=50)
{
	$pname = iconv('UTF-8', 'Windows-1251', $name);

	if(strlen($pname) > $ln) {
		return mb_substr($name, 0, $sub_ln)." ...";
	}

	return $name;
}