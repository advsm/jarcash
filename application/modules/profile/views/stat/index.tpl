
	<div class="stat">
		<div class="title">Статистика по субаккаунтам</div>
 
		{*
		<div class="tab-block">
		<br /><br />
		
			<div id="tabs">
				
				<ul>
					<li><a href="#tabs-1">По дням</a></li>
					<li><a href="#tabs-2">По сабаккаунтам</a></li>
					<li><a href="#tabs-3">По мидлетам</a></li>
					<li><a href="#tabs-4">По рефералам</a></li>
				</ul>
				<div class="ss1"></div><div class="ss2"></div>
					
				<div id="tabs-1">
					<a href="#null" class="link-go">Показать</a>
					<div class="tab-title">Диапазон дат:</div>
					<div class="field">
						<div class="name">Начальная дата</div>
						<div class="iput"><input type="text" name="" value="11.03.2011" /></div>
						<div class="break"></div>
					</div>
					<div class="field">
						<div class="name">Конечная дата</div>
						<div class="iput"><input type="text" name="" value="11.03.2011" /></div>
						<div class="break"></div>
					</div>
					<br />
				</div>
					
				<div id="tabs-2">
					<a href="#null" class="link-go">Показать</a>
					<div class="tab-title">Диапазон дат:</div>
					<div class="field">
						<div class="name">Начальная дата</div>
						<div class="iput"><input type="text" name="" value="11.03.2011" /></div>
						<div class="break"></div>
					</div>
					<div class="field">
						<div class="name">Конечная дата</div>
						<div class="iput"><input type="text" name="" value="11.03.2011" /></div>
						<div class="break"></div>
					</div>
					<br />
				</div>
					
				<div id="tabs-3">
					<a href="#null" class="link-go">Показать</a>
					<div class="tab-title">Диапазон дат:</div>
					<div class="field">
						<div class="name">Начальная дата</div>
						<div class="iput"><input type="text" name="" value="11.03.2011" /></div>
						<div class="break"></div>
					</div>
					<div class="field">
						<div class="name">Конечная дата</div>
						<div class="iput"><input type="text" name="" value="11.03.2011" /></div>
						<div class="break"></div>
					</div>
					<br />
				</div>
					
				<div id="tabs-4">
					<a href="#null" class="link-go">Показать</a>
					<div class="tab-title">Диапазон дат:</div>
					<div class="field">
						<div class="name">Начальная дата</div>
						<div class="iput"><input type="text" name="" value="11.03.2011" /></div>
						<div class="break"></div>
					</div>
					<div class="field">
						<div class="name">Конечная дата</div>
						<div class="iput"><input type="text" name="" value="11.03.2011" /></div>
						<div class="break"></div>
					</div>
					<br />
				</div>
					
			</div>
		</div>
		
		
		
		
		
		<br /><br /><br />
		*}
		
		
		<table cellpadding="0" cellspacing="0" width="100%" id="idtbhistory">
			<tr>
				<td class="tb-tl">Дата</td>
				<td class="tb-tl">Субаккаунт</td>
				<td class="tb-tl">Скачиваний</td>
				<td class="tb-tl">СМС</td>
				<td class="tb-tl">Ратио</td>
				<td class="tb-tl">Профит</td>
				<td class="tb-tl">Рефские</td>
				<td class="tb-tl">Итого</td>
			</tr>
			
			{foreach $rowset element}
				{$profit = $element->getProfit()}
				<tr style="background:#E1E1E1;">
					<td>{$element->dt}</td>
					<td>{$element->key}</td>
					<td>{$element->dl_count}</td>
					<td>{$element->sms_count}</td>
					<td>{$element->getRatio()}</td>
					<td>{$profit}</td>
					<td>0</td>
					<td>{$profit}</td>
				</tr>
			{/foreach}
		</table>
		
		<br /><br /><br /><br /><br />
		
		<div class="title">Статистика по мидлетам</div>
		<table cellpadding="0" cellspacing="0" width="100%" id="idtbhistory">
			<tr>
				<td class="tb-tl">Дата</td>
				<td class="tb-tl">Мидлет</td>
				<td class="tb-tl">Скачиваний</td>
				<td class="tb-tl">СМС</td>
				<td class="tb-tl">Ратио</td>
				<td class="tb-tl">Профит</td>
				<td class="tb-tl">Рефские</td>
				<td class="tb-tl">Итого</td>
			</tr>
			
			{foreach $midletRowset element}
				{$profit = $element->getProfit()}
				<tr style="background:#E1E1E1;">
					<td>{$element->dt}</td>
					<td>{$element->name}</td>
					<td>{$element->dl_count}</td>
					<td>{$element->sms_count}</td>
					<td>{$element->getRatio()}</td>
					<td>{$profit}</td>
					<td>0</td>
					<td>{$profit}</td>
				</tr>
			{/foreach}
		</table>
		
		<br /><br /><br /><br /><br />
		
		
		<div class="break"></div>
	</div>
