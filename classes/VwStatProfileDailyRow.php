<?php 

class VwStatProfileDailyRow extends Db_Row 
{
	public function getRatio()
	{
		$smsCount = $this->sms_count;
		if (!$smsCount) return '1:0';
		
		return '1:' . round($this->dl_count / $this->sms_count, 1);
	}
}