<?php

function Dwoo_Plugin_dtf(Dwoo $dwoo, $date, $with_time = true, $with_year = true, $short = false, $now_year_show = false)
{
	$aMonths=array(
		"1"=>"января", "2"=>"февраля", "3"=>"марта", "4"=>"апреля", "5"=>"мая", "6"=>"июня", "7"=>"июля", "8"=>"августа", "9"=>"сентября", "10"=>"октября", "11"=>"ноября", "12"=>"декабря"
	);

	if (!is_numeric($date)) $date = strtotime($date);

	if($date==0) return "";



	$dyear = $with_year ? (" " . intval(date("Y", $date))) : "";
//	$dyear = (intval(date("Y", $date)) != date('Y') || $now_year_show)  ? $dyear : "";
	$dday = intval(date("z", $date));
	$day = intval(date("j", $date));
	$month = intval(date("m", $date));

	$cyear = intval(date("Y"));
	$cday = intval(date("z"));
	$sDate = "";

	$time="";
	if($with_time && date('G:i', $date)!='0:00'){$time=" в&nbsp;" . date('G:i', $date);}
	
// $currentTime = time();	
//	if ($dyear == $cyear){
//		if($dday == $cday) $sDate = "сегодня" . $time; else
//			if($dday == $cday - 1) $sDate = "вчера" . $time; else
//				$sDate = $day . " " . $aMonths[$month]  . $time;
//  } else {
	if($short){
		$sDate = date("d.m.Y", $date) . $time;
	} else {
		$sDate = $day . "  " . $aMonths[$month] . $dyear . $time;
	}
	
	return $sDate;
}
