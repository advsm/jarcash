<?php

class Profile_TopController extends Controller_Site_Profile 
{
	public function indexAction() 
	{
		// get day top
		$today = date("Y-m-d");
		$select = VwStatProfileDailyPeer::getInstance()->select();
		$select->where("`dt` = '$today'");
		$select->order('profit desc');
		$select->limit(10);
		$rowset = VwStatSubaccDailyPeer::getInstance()->fetchAll($select);
		$dailyTop = array();
		$profilePeer = ProfilePeer::getInstance();
		foreach ($rowset as $row) {
			 $profileRow = $profilePeer->find($row->profile_id)->current();
			 $dailyTop[] = array('profile' => $profileRow->getLogin(), 'ratio' => $row->getRatio());
		}
		$this->view->dailyTop = $dailyTop;
		// get week top

		$select = "select profile_id,sum(profit) as profit, sum(sms_count) as sms_count,sum(dl_count) as dl_count, dt from vw_stat_profile_daily where TO_DAYS(dt) > (TO_DAYS(CURDATE())-7) group by profile_id order by profit desc limit 10";
		$rowset = Db::getConnection()->fetchAll($select);
		$weeklyTop = array();
		foreach ($rowset as $row) {
			$profileRow = $profilePeer->find($row['profile_id'])->current();
			$weeklyTop[] = array('profile' => $profileRow->getLogin(), 'ratio' => $this->_getRatio($row['dl_count'], $row['sms_count']));	
		}
		$this->view->weeklyTop = $weeklyTop;		
	}
	
	private function _getRatio($dlCount, $smsCount) 
	{
		if (!$smsCount) return '1:0';
		return '1:' . round($dlCount / $smsCount, 1);
	}
	
}