	<div class="index">
		<div class="left">

			<div id="tabs">
			
				<ul>
					<li><a href="#tabs-1">За день</a></li>
					<li><a href="#tabs-2">За неделю</a></li>
				</ul>
				<div class="ss1"></div><div class="ss2"></div>
				
				<div id="tabs-1">	
					<p class="p1 title">Никнейм</p><p class="p2 title">Конверт</p><div class="break"></div>
					{foreach $dailyTop row}
						<p class="p1 first">{$row.profile}</p><p class="p2 first">{$row.ratio}</p><div class="break"></div>
					{/foreach}
				</div>
				
				<div id="tabs-2">
					<p class="p1 title">Никнейм2</p><p class="p2 title">Конверт2</p><div class="break"></div>
					{foreach $weeklyTop row}
						<p class="p1 first">{$row.profile}</p><p class="p2 first">{$row.ratio}</p><div class="break"></div>
					{/foreach}
				</div>
				
			</div>
		</div>
		
		<div class="right">
			&nbsp;
		</div>
		
		<div class="break"></div>
	</div>		