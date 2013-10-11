<?php

require_once dirname(__FILE__) . '/../classes/Bootstrap.php';

$db = Config::getInstance()->db->s0->params;
$command = "mysql -u{$db->username} -P{$db->port} -h{$db->host} -p{$db->password} {$db->dbname}\n";
echo $command;
