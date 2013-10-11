<?php 

class Filter_StringToTime implements Zend_Filter_Interface
{
	protected $_replacement = array(
		'january'   => 'январ(ь|я)',
		'february'  => 'феврал(ь|я)',
		'march'     => 'марта?',
		'april'     => 'апрел(ь|я)',
		'may'       => 'ма(й|я)',
		'juny'      => 'июн(ь|я)',
		'july'      => 'июл(ь|я)',
		'august'    => 'августа?',
		'september' => 'сентябр(ь|я)',
		'octember'  => 'октябр(ь|я)',
		'november'  => 'ноябр(ь|я)',
		'december'  => 'декабр(ь|я)',
	
		'last'      => '(предыдущ(ий|ая|ee|его)|прошл(ый|ая|ое|ого)|последн(ий|яя|ее|его))',
		'next'      => 'следующ(ий|ая|ee|его)',
		'today'     => 'сегодня',
		'tomorrow'  => 'завтра',
		'yesterday' => 'вчера',
	
		'monday'    => 'понедельник',
		'tuesday'   => 'вторник',
		'wednesday' => 'среда',
		'trursday'  => 'четверг',
		'friday'    => 'пятница',
		'saturday'  => 'суббота',
		'sunday'    => 'воскресенье',
	
		'year'   => 'года?',
		'month'  => 'месяц',
		'week'   => 'неделя',
		'day'    => 'день',
		'hour'   => 'час(а|ов)?',
		'minute' => 'минут(а|ы)?',
		'second' => 'секунд(а|ы)?',
	);
	
	
    /**
     * Trasform russian string with date to eng and use strtotime.
     * ------
     * Returns the result of filtering $value
     *
     * @param  mixed $value
     * @throws Zend_Filter_Exception If filtering $value is impossible
     * @return mixed
     */
    public function filter($value)
    {
    	if ($value == '') {
    		return $value;
    	}
    	
    	if (is_numeric($value)) {
    		return $value;
    	}
    	
    	foreach ($this->_replacement as $replace => $regex) {
    		$value = preg_replace("#$regex#ie", $replace, $value);
    	}
    	
    	$value = preg_replace('/(\d{2})\.(\d{2})\.(\d{2,4})/', "$3-$2-$1", $value);
    	
    	$time = strtotime($value);
    	if ($time === false) {
    		$time = null;
    	}
    	return $time;
    }
}