<?php

function Dwoo_Plugin_hyphen(Dwoo $dwoo, $n='18', $text='')
{
	$n = '/(.{'.$n.'})/u';
	return preg_replace($n, '${1}<span style="font-size:0"> </span>', $text);
}
