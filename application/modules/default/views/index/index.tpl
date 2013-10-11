<html>
<head>
<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
</head>
<body>

<table width="100%" height="100%">
	<tr width="100%" height="100%">
		<td width="100%" height="100%" align="center" valign="center">
			{if $error}<h4 style="color:red;">Неверный логин:пароль</h3>{/if}
			<form method="post" action="">
					<label>Email: <input type="text" name="email"/></label><br/>
					<label>Пароль: <input type="password" name="password"/></label><br/>
					<input type="submit" value="Вход"/>
			</form>		
		</td>
	</tr>
</table>

</body>
</html>