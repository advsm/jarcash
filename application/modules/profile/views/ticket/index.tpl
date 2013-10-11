
<table class="ticket">
<th>Id</th><th>Тема</th><th>Статус</th>
{foreach $tickets as ticket}
<tr><td>{$ticket.id}</td><td>{$ticket.topic}</td><td>{$ticket.status->getName()}</td><td><a href="/profile/ticket/view/id/{$ticket.id}">Просмотреть</a></td></tr>
{/foreach}
</table>
<br />
<a href="/profile/ticket/create">Создать новый тикет</a>