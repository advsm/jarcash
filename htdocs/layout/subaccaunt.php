<?header('Content-Type: text/html; charset=utf-8');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>титлы</title>
	<link href="./css/style.css" rel="stylesheet" type="text/css" />
	<!--[if IE 7]><link href="./css/ie7.css" rel="stylesheet" type="text/css" /><![endif]-->
	<?/*<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>*/?>

	<link type="text/css" href="./css.tab/ui.tabs.stat.css" rel="stylesheet" />
	<script type="text/javascript" src="./script/jquery-1.3.2.js"></script>
	<script type="text/javascript" src="./script/ui.core.js"></script>
	<script type="text/javascript" src="./script/ui.tabs.js"></script>
	<script type="text/javascript">
	$(function() {
		$("#tabs").tabs();
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
	
	
	<div class="stat subaccaunt">
		<div class="title">Добавление сабаккаунта</div>
		
		<br /><br />
		<h3>Название:</h3>
		<div class="field-block">
			<div class="iput"><input type="text" name="" value="" /></div>
			<div class="btn"><input type="button" name="" value="Добавить" /></div>
			<div class="break"></div>
		</div>

		
		
		
		
		<br /><br />
		<h3>Список субаккаунтов:</h3>
		<table cellpadding="0" cellspacing="0" width="100%" id="idsubaccaunt" style="width:320px;">
		<tr>
			<td class="tb-tl">ID</td>
			<td class="tb-tl">Название</td>
			<td class="tb-tl tb-link">&#160;</td>
		</tr>
		<tr style="background:#E1E1E1;">
			<td>1</td>
			<td>Название номер 1</td>
			<td class="tb-link"><a href="#null">Изменить</a></td>
		</tr>
		<tr style="background:#E1E1E1;">
			<td>2</td>
			<td>Название номер 2</td>
			<td class="tb-link"><a href="#null">Изменить</a></td>
		</tr>
		<tr style="background:#E1E1E1;">
			<td>3</td>
			<td>Название номер 3</td>
			<td class="tb-link"><a href="#null">Изменить</a></td>
		</tr>
		<tr style="background:#E1E1E1;">
			<td>4</td>
			<td>Название номер 4</td>
			<td class="tb-link"><a href="#null">Изменить</a></td>
		</tr>
		</table>
		<br /><br /><br /><br /><br />
		
		
		
		
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