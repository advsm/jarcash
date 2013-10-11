<h2>Описание тикета</h2>
<br />
Тема: {$ticket->getTopic()}
<br />
Текст: {$ticket->getText()}
<br />
Статус: {$ticket->getTicketStatusRowByStatusId()->getName()}
<br />
Сообщения:
<table>
<th>От</th><th>Сообщение</th><th>Дата</th>
{foreach $messages as message}
<tr><td>{$message.from->getLogin()}</td><td>{$message.text}</td><td>{$message.datetime}</td></tr>
{/foreach}
</table>

Добавление сообщений:
<ul>
{foreach $errors, field, error}
	<li>{$field}: {$error} </li>
{/foreach}
</ul>
<form method="post" action="/profile/ticket/send-message">
		<input type="hidden" name="ticket_id" default="{$ticket->getId()}"/><br/>
		<label>Текст сообщения: <textarea name="message" default=""> </textarea></label><br/>
		<input type="submit" value="Отправить"/>
</form>	