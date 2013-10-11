<?php

/**
 * Плагин для корректного обрезания текста в utf8 формате в фиксированном для вывода текста блоке.
 */


/**
 * @param string $str исходный строка текста
 * @param integer $max_length максимально допустимое количество символов в одной строке
 * @param integer $max_lines максимально допустимое количество строк в блоке
 * @return string
 */

function Dwoo_Plugin_line_transfer(Dwoo $dwoo, $str, $max_length, $max_lines) {
	$str = $str;
	$maxLength = $max_length;
	$maxLines = $max_lines;
	$str = html_entity_decode($str);
	$words = explode(' ', $str);
	$toend = $maxLength;
	$lineCount = 1;
	$unset = false;
	$resWords = array();

	mb_internal_encoding("UTF-8");

	foreach ($words as $word) {
		if ($unset) {
			$resWords[] = '';
			continue;
		}
		$wordLength = mb_strlen($word);
		if ($wordLength <= $toend) {
			$resWords[] = $word;
			$toend -= ($wordLength + 1);
			continue;
		} elseif ($wordLength <= $maxLength) {
			if ($lineCount == $maxLines) {
				$word = mb_substr($word, 0, $toend) . ' ...';
				$unset = true;
			} else {
				$toend = $maxLength - $wordLength - 1;
				$word = PHP_EOL . $word;
				$lineCount++;
			}
			$resWords[] = $word;
		} else {
			$word = PHP_EOL . mb_substr($word, 0, $maxLength - 1) . ' ...';
			$resWords[] = $word;
			$unset = true;
		}
	}

	$resStr = trim(implode(' ', $resWords));
	$resStr = htmlspecialchars($resStr);
	$resStr = str_replace("&amp;#133;", " &#133;", $resStr);

	return $resStr;
} 