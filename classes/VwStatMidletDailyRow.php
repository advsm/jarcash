<?php 

class VwStatMidletDailyRow extends Db_Row 
{
	public function getRatio()
	{
		$smsCount = $this->sms_count;
		if (!$smsCount) return '1:0';
		
		return '1:' . round($this->dl_count / $this->sms_count, 1);
	}

	public function getProfit()
	{
		$midletRow = MidletPeer::getInstance()->find($this->midlet_id)->current();
		$profileId = $midletRow->getProfileId();
		$profile = ProfilePeer::getInstance()->find($profileId)->current();
		$profit = round($this->profit / 100 * $profile->getPercent(), 2);
		return $profit;
	}
}