<?php

function Dwoo_Plugin_paginator_url(Dwoo $dwoo, $name, $value)
{
	$params = array();
	$params[$name] = $value;
	$url = u($params);
	if(isset($_SERVER['QUERY_STRING'])){
		$url .= "?" . $_SERVER['QUERY_STRING'];
	}
	return $url;
}