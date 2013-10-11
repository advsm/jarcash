<?php

class VwStatMidletDailyPeer extends Db_Peer 
{
	protected $_name = 'vw_stat_midlet_daily'; 
	protected $_primary = 'id'; 
	protected $_rowClass = 'VwStatMidletDailyRow';
	
	/**
	 * @var Db_Peer
	 */
	private static $_instance;
	
	/**
	 * @return VwStatMidletDailyPeer
	 */
	public static function getInstance()
	{
		if (!self::$_instance) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
}