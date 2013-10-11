
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>титлы</title>
	<link href="/style/style.css" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
		<link type="text/css" href="/style/ui.tabs.css" rel="stylesheet" />
	<script type="text/javascript" src="/javascript/jquery-1.3.2.js"></script>
	<script type="text/javascript" src="/javascript/ui.core.js"></script>
	<script type="text/javascript" src="/javascript/ui.tabs.js"></script>
	<script type="text/javascript">
	$(function() {
		$("#tabs").tabs();
		$("#tabs2").tabs();
	});
	</script>
</head>
<body>



<div class="main">
	<div class="header">
		<div class="logo"><a href="#null"></a></div>
		<div class="user">
			<div class="user-left">
				<div class="d1">Login:</div>
				<div class="d2"><a href="/index/logout" class="a1">(logout)</a><a href="/profile/index/edit" class="a2">{$profile.login}</a></div>
				<div class="d1">%</div>
				<div class="d2 d2white">{$profile.percent}</div>
				<div class="d1 last">Баланс:</div>
				<div class="d2 last">{$wallet.amount} руб</div>
			</div>
			<div class="user-right">
				<div>К выплате: 0 руб (<a href="/profile/payment/request-payment/">Заказать выплату</a>)</div>
				<div><span>Заработано за сегодня: 0 руб (+0%)<br />Заработано за все время: {$wallet.profit} руб</span>
				</div>
			</div>
		</div>
	</div>
	
	<div class="menu">
		<div class="menu-hidden">
			
			{foreach $menu, key, element}
				<a href="/profile/{$key}" style="width: {$element.width}px;" {if $element.active}class="active"{/if}>{$element.name}</a><span></span>
			{/foreach}
			
		</div>
		<div class="break"></div>
	</div>
	

	{layout()->content}	

	
	<div class="footer">
		<div class="copy">Сайт создан в <a href="#null">хуевой студии</a> (с) 2011</div>
		<div class="f-menu">
			&nbsp;
		</div>
	</div>
	
</div>



</body>
</html>
