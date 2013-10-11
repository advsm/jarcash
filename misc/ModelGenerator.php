<?php
/**
 * Must run into debug mode for catch E_NOTICE.
 */

/**
 * @see Bootstrap
 */
require_once '../classes/Bootstrap.php';

//windows fix
date_default_timezone_set('Europe/Moscow');

$generator = new CodeGenerator_ModelGenerator();
$generator->run();
