<?php

class Dwoo_Plugin_frame extends Dwoo_Block_Plugin implements Dwoo_ICompilable_Block
{
	public function init($file, array $rest=array())
	{
		
	}

	public static function preProcessing(Dwoo_Compiler $compiler, array $params, $prepend, $append, $type)
	{
		return "";
	}

	public static function postProcessing(Dwoo_Compiler $compiler, array $params, $prepend, $append, $content)
	{
		$p = isset($params["*"]) ? $params["*"][1] : array();
		$p['content'] = $content;
		$out = Dwoo_Plugin_ib($compiler->getDwoo(), $params['file'][1], 0, "frame_cache", "frame_".$params['file'][1], '_root', null, $p);
		return str_replace("[content]", $content, $out);		
		
	}
}
