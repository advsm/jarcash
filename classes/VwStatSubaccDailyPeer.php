<?php

class VwStatSubaccDailyPeer extends Db_Peer 
{
	protected $_name = 'vw_stat_subacc_daily'; 
	protected $_primary = 'id'; 
	protected $_rowClass = 'VwStatSubaccDailyRow';
	
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