<?php
/**
 * Используется в index.php для отображения исключений, возникших в процессе 
 * обработки запроса.
 */
if (!isset($e) || !$e instanceof Exception) {
	return ;
}

$error = 500;
// Посылаем заголовки ответа сервера в зависимости от типа исключения
if (!headers_sent()) {
	if (($e instanceof Zend_Controller_Dispatcher_Exception) || ($e instanceof Zend_Controller_Action_Exception)) {
		$error = 404;
		header('404 Not Found');
	} else {
    	header('500 Internal Server Error');
	}
}

if (Debug::getInstance()->isDebugMode()) {
	echo '<h2>Exception description</h2>';
	printf(
		'<p>Exception "<b>%s</b>" with message "<b>%s</b>" at %s line %u</p>',
		get_class($e), $e->getMessage(), $e->getFile(), $e->getLine()
	);

	// Show query for Zend_Db exception
	if ($e instanceof Zend_Db_Statement_Exception) {
		$query = Db::getInstance()->getLastQuery();

		echo '<ul>';
		echo "<li>MySQL Query: {$query['query']}</li>";
		echo '<li>Params: ' . Debug_TraceHelper::getVarAsString($query['params']) . '</li>';
		echo '</ul>';
	}

    echo '<ul>';
    foreach (Debug_TraceHelper::getShortStacktrace($e->getTrace()) as $t) {
        echo "<li>{$t}</li>";
    }
    echo '</ul>';

    echo '<h2>Full format:</h2>';
    echo '<ul>';
    foreach (Debug_TraceHelper::getStacktrace($e->getTrace()) as $t) {
        echo "<li>{$t}</li>";
    }
    echo '</ul>';
} else {
	if ($error == 404) {
		require_once('./html/404.html');
	} else {
		require_once('./html/500.html');
	}
}
