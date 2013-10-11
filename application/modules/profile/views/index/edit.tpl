<div class="page profil">
		<div class="title">Профиль</div>
		
		<div class="block">
			
			<br />
			{if count($errors)}
				<ul>
				{foreach $errors, field, error}
					<li>{$field}: {$error} </li>
				{/foreach}
				</ul>
			{/if}
			<form method="post">
			<div class="field">
				<div class="name">Ник в топе:</div>
				<div class="iput"><input type="text" name="login" default="{$profile.login}" /></div>
				<div class="break"></div>
			</div>
			<div class="field">
				<div class="name">ICQ:</div>
				<div class="iput"><input type="text" name="icq" default="{$profile.icq}" /></div>
				<div class="break"></div>
			</div>
			<div class="field">
				<div class="name">R:</div>
				<div class="iput"><input type="text" name="webmoney_number" default="{$profile.webmoney_number}" /></div>
				<div class="break"></div>
			</div>
			<div class="field">
				<div class="name">Пароль:</div>
				<div class="iput"><input type="password" name="old_password" /></div>
				<div class="break"></div>
			</div>
			<div class="field">
				<div class="name">Новый пароль:</div>
				<div class="iput"><input type="password" name="password" /></div>
				<div class="break"></div>
			</div>
			<div class="field">
				<div class="name">Еще раз:</div>
				<div class="iput"><input type="password" name="repeat_password" /></div>
				<div class="break"></div>
			</div>
			
			<div class="link-send"><input type="submit" value="Сохранить изменения" /></div>
			</form>
			<br /><br /><br /><br /><br /><br />
		</div>
</div>