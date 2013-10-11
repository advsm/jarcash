



	<div class="page obratka">
		<div class="title">Обратная связь</div>
		
		<div class="block">
		
			
			<br /><h2>Ждем ваших писем</h2>
			
			<div class="bl-inf">
				<div class="d1"><img src="/images/ico_mail.gif" alt="" />&#160;&#160;e-mail:</div>
				<div class="d2"><a href="mailto:support@jarcash">support@jarcash</a></div>
				<div class="break"></div>
			</div>
			
			<div class="bl-inf">
				<div class="d1"><img src="/images/ico_icq.gif" alt="" />&#160;&#160;icq:</div>
				<div class="d2">207202</div>
				<div class="break"></div>
			</div>
			
			<div class="bl-inf">
				<div class="d1"><img src="/images/ico_skype.gif" alt="" />&#160;&#160;skype:</div>
				<div class="d2">ihatephp</div>
				<div class="break"></div>
			</div>
			
			
			<br /><h2>Так же вы можете оставить нам тикет в форме ниже:</h2>
			<form method="post">
				{if count($errors)}
					<ul>
						{foreach $errors, field, error}
							<li>{$field}: {$error} </li>
						{/foreach}
					</ul>
				{/if}
				
			<div class="field">
				<div class="name">Сабж:</div>
				<div class="iput"><input type="text" name="topic" /></div>
				<div class="break"></div>
			</div>
			<div class="field">
				<div class="name">Текст:</div>
				<div class="textarea"><textarea name="text"></textarea></div>
				<div class="break"></div>
			</div>
			
			<br /><br />
			<input type="submit" value="Отправить" />
			</form>
			<br /><br /><br />
			
			
		</div>
		
		
		
	</div>
