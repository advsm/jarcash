<?php 

class VwStatSubaccDailyRow extends Db_Row 
{
	public function getRatio()
	{
		$smsCount = $this->sms_count;
		if (!$smsCount) return '1:0';
		
		return '1:' . round($this->dl_count / $this->sms_count, 1);
	}
	
	public function getProfit()
	{
		$profile = ProfilePeer::getInstance()->find($this->profile_id)->current();
		$profit = round($this->profit / 100 * $profile->getPercent(), 2);
		return $profit;
	}
}