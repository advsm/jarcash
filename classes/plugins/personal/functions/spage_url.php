<?php

function Dwoo_Plugin_spage_url(Dwoo $dwoo, $name)
{
	//@todo формирование урлов для статических страниц
	$params['module'] = 'default';
	$params['controller'] = 'pages';
	$params['action'] = $name;
	$reset = true;
	$name = null;
	
	//@todo вызывать тут как то неочень... но блин как же проверить на начиличие улр в таблице.
	/* @var $staticRow StaticPageRow */
	$staticRow = PagesService::getInstance()->getPageByKeyCustomFields($params['action']);
	if ($staticRow instanceof StaticPageRow) {
		$url = $staticRow->getUrl();
		if (!empty($url)) {
			return $url;
		}
	}
	
	return u($params, $name, $reset);
}