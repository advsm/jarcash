<?header('Content-Type: text/html; charset=utf-8');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>титлы</title>
	<link href="./css/style.css" rel="stylesheet" type="text/css" />
	<!--[if IE 7]><link href="./css/ie7.css" rel="stylesheet" type="text/css" /><![endif]-->
	<?/*<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>*/?>

	<link type="text/css" href="./css.tab/ui.tabs.css" rel="stylesheet" />
	<script type="text/javascript" src="./script/jquery-1.3.2.js"></script>
	<script type="text/javascript" src="./script/ui.core.js"></script>
	<script type="text/javascript" src="./script/ui.tabs.js"></script>
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
				<div class="d2"><a href="#null" class="a1">(logout)</a><a href="#null" class="a2">Dmitriy</a></div>
				<div class="d1">%</div>
				<div class="d2 d2white">0.9</div>
				<div class="d1 last">Баланс:</div>
				<div class="d2 last">150 000 руб</div>
			</div>
			<div class="user-right">
				<div>К выплате: 10 000 руб</div>
				<div><span>Заработано за сегодня: 3 000 руб (+56%)<br />Заработано за все время: 900 000 руб</span>
				</div>
			</div>
		</div>
	</div>
	
	<div class="menu">
		<div class="menu-hidden">
			<a href="#null" style="width:150px;" class="active">Статистика</a><span></span>
			<a href="#null" style="width:108px;">Промо</a><span></span>
			<a href="#null" style="width:149px;">Сабаккаунты</a><span></span>
			<a href="#null" style="width:81px;">Топ</a><span></span>
			<a href="#null" style="width:105px;">Выплаты</a><span></span>
			<a href="#null" style="width:156px;">Обратная связь</a><span></span>
			<a href="#null" style="width:105px;">Правила</a><span></span>
			<a href="#null" style="width:132px;" class="last">Профиль</a>
		</div>
		<div class="break"></div>
	</div>
	
	
	<div class="index">
	
 
		<div class="left">
			<!--h1>Топ адвертов</h1-->
			<div id="tabs">
			
				<ul>
					<li><a href="#tabs-1">За день</a></li>
					<li><a href="#tabs-2">За неделю</a></li>
				</ul>
				<div class="ss1"></div><div class="ss2"></div>
				
				<div id="tabs-1">	
					<p class="p1 title">Никнейм</p><p class="p2 title">Конверт</p><div class="break"></div>
					<p class="p1 first">Dima</p><p class="p2 first">1\10</p><div class="break"></div>
					<p class="p1">Vasilenko</p><p class="p2">1\15</p><div class="break"></div>
					<p class="p1">Hoppert</p><p class="p2">1\15</p><div class="break"></div>
					<p class="p1">Dima</p><p class="p2">1\10</p><div class="break"></div>
					<p class="p1">Vasilenko</p><p class="p2">1\15</p><div class="break"></div>
					<p class="p1">Hoppert</p><p class="p2">1\15</p><div class="break"></div>
				</div>
				
				<div id="tabs-2">
					<p class="p1 title">Никнейм2</p><p class="p2 title">Конверт2</p><div class="break"></div>
					<p class="p1 first">Dima</p><p class="p2 first">1\10</p><div class="break"></div>
					<p class="p1">Vasilenko</p><p class="p2">1\15</p><div class="break"></div>
					<p class="p1">Hoppert</p><p class="p2">1\15</p><div class="break"></div>
					<p class="p1">Dima</p><p class="p2">1\10</p><div class="break"></div>
					<p class="p1">Vasilenko</p><p class="p2">1\15</p><div class="break"></div>
					<p class="p1">Hoppert</p><p class="p2">1\15</p><div class="break"></div>
					<p class="p1">Hoppert</p><p class="p2">1\15</p><div class="break"></div>
					<p class="p1">Dima</p><p class="p2">1\10</p><div class="break"></div>
					<p class="p1">Vasilenko</p><p class="p2">1\15</p><div class="break"></div>
					<p class="p1">Hoppert</p><p class="p2">1\15</p><div class="break"></div>
				</div>
				
			</div>
		</div>
		<div class="right">
			<?/*<h1>Топ мидлетов</h1>*/?>
			<div id="tabs2">
			
 				<ul>
					<li><a href="#tabs2-1">За день</a></li>
					<li><a href="#tabs2-2">За неделю</a></li>
				</ul>
				<div class="ss1"></div><div class="ss2"></div>
				
				<div id="tabs2-1">
					<p class="p1 title">Название</p><p class="p2 title">Конверт</p><div class="break"></div>
					<p class="p1 first">Dima</p><p class="p2 first">1\10</p><div class="break"></div>
					<p class="p1">Vasilenko</p><p class="p2">1\15</p><div class="break"></div>
					<p class="p1">Hoppert</p><p class="p2">1\15</p><div class="break"></div>
					<p class="p1">Dima</p><p class="p2">1\10</p><div class="break"></div>
					<p class="p1">Vasilenko</p><p class="p2">1\15</p><div class="break"></div>
					<p class="p1">Hoppert</p><p class="p2">1\15</p><div class="break"></div>
					<p class="p1">Hoppert</p><p class="p2">1\15</p><div class="break"></div>
					<p class="p1">Dima</p><p class="p2">1\10</p><div class="break"></div>
					<p class="p1">Vasilenko</p><p class="p2">1\15</p><div class="break"></div>
					<p class="p1">Hoppert</p><p class="p2">1\15</p><div class="break"></div>
				</div>
				
				<div id="tabs2-2">	
					<p class="p1 title">Название2</p><p class="p2 title">Конверт2</p><div class="break"></div>
					<p class="p1 first">Dima</p><p class="p2 first">1\10</p><div class="break"></div>
					<p class="p1">Vasilenko</p><p class="p2">1\15</p><div class="break"></div>
					<p class="p1">Hoppert</p><p class="p2">1\15</p><div class="break"></div>
					<p class="p1">Dima</p><p class="p2">1\10</p><div class="break"></div>
					<p class="p1">Vasilenko</p><p class="p2">1\15</p><div class="break"></div>
					<p class="p1">Hoppert</p><p class="p2">1\15</p><div class="break"></div>
				</div>
				
			</div>
		</div>
		
		<div class="break"></div>
	</div>
	
	<div class="footer">
		<div class="copy">Сайт создан в студии <a href="#null">“Юджин”</a></div>
		<div class="f-menu">
			<a href="#null">Статистика</a>
			<a href="#null">Промо</a>
			<a href="#null">Сабаккаунты</a>
			<a href="#null">Топ</a>
			<a href="#null">Выплаты</a>
			<a href="#null">Обратная связь</a>
			<a href="#null">Правила</a>
			<a href="#null">Профиль</a>
		</div>
	</div>
	
</div>



</body>
</html>
