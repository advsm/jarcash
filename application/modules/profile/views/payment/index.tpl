<div class="page">

	<div class="title">История выплат</div>
	<br />
	<table cellpadding="0" cellspacing="0" width="100%" id="idtbhistory">
		<tr>
			<td class="tb-tl">Период</td>
			<td class="tb-tl">СМС, руб</td>
			<td class="tb-tl">Рефералы, руб</td>
			<td class="tb-tl">Холд, руб</td>
			<td class="tb-tl">Штраф, руб</td>
			<td class="tb-tl">Итого</td>
			<td class="tb-tl">Реквизиты</td>
			<td class="tb-tl">Статус</td>
		</tr>
		{foreach $payments element}
			<tr style="background:#E1E1E1;">
				<td>{$element->getCreated()}</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>{$element->getAmount()}</td>
				<td>{$element->getDestination()}</td>
				<td><span class="ok">{$element->getPaymentStatusRowByStatusId()->getName()}</span></td>
			</tr>		
		{/foreach}

		{*
		<tr style="background:#E1E1E1;">
			<td>10.03.2011-17.03.2011</td>
			<td>12340</td>
			<td>12340</td>
			<td>12340</td>
			<td>12340</td>
			<td>12340</td>
			<td>Z123123909090</td>
			<td><span class="load">Ожидание</span></td>
		</tr>
		<tr style="background:#D5D5D5;">
			<td>10.03.2011-17.03.2011</td>
			<td>12340</td>
			<td>12340</td>
			<td>12340</td>
			<td>12340</td>
			<td>12340</td>
			<td>Z123123909090</td>
			<td><span class="error">Не выплачено</span></td>
		</tr>
		*}
	</table>
	<br /><br /><br /><br /><br /><br /><br /><br /><br />

</div>