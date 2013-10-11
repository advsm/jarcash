<?php

function Dwoo_Plugin_prepare_select_data(Dwoo $dwoo, $items)
{
	if($items instanceof ContentList){
		$a = array();
		foreach($items as $item){
			$a[$item->id] = $item->name;
		}
		$items = $a;
	}
	$dwoo->assignInScope($items, "select_data");
}
