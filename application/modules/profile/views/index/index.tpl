<div class="page">

		<div class="title">Новости</div>
		
		<br />
		{foreach $news element}
		<div class="bl-news">
			<div class="date">{$element->getCreated()}</div>
			<div class="link">{$element->getName()}</div>
			<div class="desc">{$element->getText()}</div>
		</div>
		{/foreach}
		<br /><br /><br />
		
		{*<div class="pager">
			<a href="#null">1</a>
			<a href="#null" class="active">2</a>
			<a href="#null">3</a>
			<a href="#null">4</a>
			<a href="#null">5</a>
		</div>*}
		
		<br /><br /><br /><br /><br /><br /><br /><br /><br />

</div>