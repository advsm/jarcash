<?php


function Dwoo_Plugin_ib(Dwoo $dwoo, $file, $cache_time = null, $cache_id = null, $compile_id = null, $data = '_root', $assign = null, array $rest = array())
{
	if ($file === '') {
		return;
	}
	
	$file = "../../../../../layouts/blocks/" . $file;

	if (preg_match('#^([a-z]{2,}):(.*)$#i', $file, $m)) {
		// resource:identifier given, extract them
		$resource = $m[1];
		$identifier = $m[2];
	} else {
		// get the current template's resource
		$resource = $dwoo->getTemplate()->getResourceName();
		$identifier = $file;
	}

	try {
		if (!is_numeric($cache_time)) {
			$cache_time = null;
		}
		$include = $dwoo->templateFactory($resource, $identifier, $cache_time, $cache_id, $compile_id);
	} catch (Dwoo_Security_Exception $e) {
		return $dwoo->triggerError('Include : Security restriction : '.$e->getMessage(), E_USER_WARNING);
	} catch (Dwoo_Exception $e) {
		return $dwoo->triggerError('Include : '.$e->getMessage(), E_USER_WARNING);
	}

	if ($include === null) {
		return $dwoo->triggerError('Include : Resource "'.$resource.':'.$identifier.'" not found.', E_USER_WARNING);
	} elseif ($include === false) {
		return $dwoo->triggerError('Include : Resource "'.$resource.'" does not support includes.', E_USER_WARNING);
	}

	if ($dwoo->isArray($data)) {
		$vars = $data;
	} elseif ($dwoo->isArray($cache_time)) {
		$vars = $cache_time;
	} else {
		$vars = $dwoo->readVar($data);
	}

	if (count($rest)) {
		$vars = $rest + $vars;
	}

	$out = $dwoo->get($include, $vars);

	if ($assign !== null) {
		$dwoo->assignInScope($out, $assign);
	} else {
		return $out;
	}
}
