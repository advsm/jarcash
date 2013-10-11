<?php

class VwStatProfileDailyPeer extends Db_Peer 
{
	protected $_name = 'vw_stat_profile_daily'; 
	protected $_primary = 'profile_id'; 
	protected $_rowClass = 'VwStatProfileDailyRow';
	
	/**
	 * @var Db_Peer
	 */
	private static $_instance;
	
	/**
	 * @return VwStatSubaccDailyPeer
	 */
	public static function getInstance()
	{
		if (!self::$_instance) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
}