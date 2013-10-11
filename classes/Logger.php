<?php

class Logger 
{
	const MAIL_ADDRESS = 'kolizeo-dev@promo.ru';
	
	private $logger;
	
	public function __construct($log_path = null)
	{
		try {
			if (!$log_path) {
				$this->logger = null;
				return;
			}	
			$date = date('Y-m-d');
			$format = '[%timestamp%]: %message%' . PHP_EOL;
			$formatter = new Zend_Log_Formatter_Simple($format);
			$dirName = BASE_DIR . $log_path;
			if (!file_exists($dirName)) {
				mkdir($dirName);
				chmod($dirName, 0777);
			}
			$writer = new Zend_Log_Writer_Stream($dirName . $date . '.log');
			$writer->setFormatter($formatter);
			$this->logger = new Zend_Log($writer);
		} catch (Exception $e) {
			$mail = new Zend_Mail('UTF-8');
			$mail->setSubject('Exception in Logger: __construct__');
			$text = 'Exception: ' . $e->getMessage() . "<br><br>";
			$mail->setBodyHtml($text);
			$mail->setFrom('support@kolizeo.ru','Служба Колизео');
			$mail->addTo('kolizeo-dev@promo.ru');
			$mail->send();
		}
	}
	
	/**
	 * Write exception info to log file
	 * @param array $exceptionInfo
	 */
	public function writeLog(array $info)
	{
		if (!$this->logger) {
			return;
		}
		foreach ($info as $line) {
			$this->logger->info(strval($line));
		}
	}
	
/**
	 * Get data from Exception
	 * @param Exception $e
	 * @return array
	 */
	public function getInfo(Exception $e)
	{
		$info[] = "Exception at {$e->getFile()}:{$e->getLine()}";
		$info[] = "Message : " . $e->getMessage();
		$info[] = "Stack trace :";
		$trace = $e->getTraceAsString();
		$element = strtok($trace, PHP_EOL . '#');
		while ($element) {
			$info[] = $element;
			$element = strtok(PHP_EOL . '#');
		}
		return $info;
	}
	
	/**
	 * Notify about exception by e-mail
	 * @param array $exceptionInfo
	 * @param string $subject
	 */
	public function sendMail(array $exceptionInfo, $subject)
	{
		$mail = new Zend_Mail('UTF-8');
		$mail->setSubject($subject);
		$text = 'Server: ' . $_SERVER['HTTP_HOST'] . "<br><br>";
		foreach ($exceptionInfo as $line) {
			$text .= $line . "<br>";
		}
		$mail->setBodyHtml($text);
		$mail->setFrom('support@kolizeo.ru','Служба Колизео');
		$mail->addTo(self::MAIL_ADDRESS);
		$mail->send();
	}
	
	/**
	 * Write exception info to log file and Notify about exceptio by e-mail
	 * @param Exception $e
	 * @param string $subject
	 * @param boolean $logging
	 */
	public function processException(Exception $e, $subject, $logging = true, $mailing = true)
	{
		$exData = $this->getInfo($e);
		if ($this->logger && $logging) {
			$this->writeLog($exData);
		}
		if ($mailing) {
			$this->sendMail($exData, $subject);
		}
	}
	
	/**
	 * write function call to log file
	 * @param unknown_type $functionName
	 * @param array $params
	 * @param unknown_type $result
	 */
	public function logFunctionCall($functionName, array $params, $result)
	{
		try {
			if (!$this->logger) {
				return;
			}
			$this->logger->info("Function: $functionName");
			foreach ($params as $key => $param) {
				$paramsString .= "$key => $param; ";
			}
			$this->logger->info("Parameters: $paramsString");
			if (is_array($result)) {
				foreach ($result as $key => $value) {
					$value = str_replace("\n", " ", $value);
					$resultString .= "$key => $value; ";							
				}
			} else {
				$resultString = str_replace("\n", " ", $result);
			}
			$this->logger->info("Result: $resultString");
		} catch (Exception $e) {
			$mail = new Zend_Mail('UTF-8');
			$mail->setSubject('Exception in Logger: logFunctionCall');
			$text = 'Exception: ' . $e->getMessage() . "<br><br>";
			$mail->setBodyHtml($text);
			$mail->setFrom('support@kolizeo.ru','Служба Колизео');
			$mail->addTo('kolizeo-dev@promo.ru');
			$mail->send();
		}
	}
}