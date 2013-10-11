<?php

class FileController extends Controller_Site
{
	public function indexAction()
	{
		$this->_disableView();
		
		$profile = $this->_getProfileRow();
		$midlet = $this->_getMidletRow($profile);
		$midlet2subacc = Midlet2subaccPeer::getInstance()->find($this->_getParam('subacc_id'))->current();
		if (!$midlet2subacc) {
			throw new Zend_Controller_Exception('Midlet2subacc row not found');
		}
		
		$connection = Db::getConnection();
		$connection->beginTransaction();
		try {
			$ip = $_SERVER['REMOTE_ADDR'];
			// Реферер, если нету - null
			$referer = (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
			$userAgent = (isset($_SERVER['HTTP_USER_AGENT']) && $_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : null;
			
			// Создаем запись в статистике скачиваний
			$hit = StatisticDownloadPeer::getInstance()->createRow();
			$hit->setIp($ip);
			$hit->setReferer($referer);
			$hit->setUserAgent($userAgent);
			$hit->setMidletId($midlet2subacc->getMidletId());
			$hit->setProfileId($profile->getId());
			$hit->setSubaccId($midlet2subacc->getSubaccId());
			$hit->setDate(date('Y-m-d'));
			$hit->save();
			
			$connection->commit();
		} catch (Zend_Db_Exception $e) {
			$connection->rollBack();
			throw $e;
		}
		
		// Посылаем заголовок для скачивания файла и читаем его в echo
		$path = Config::getInstance()->midlet->jar_dir . '/' . $midlet2subacc->getId() . '.jar';
		
		$this->getResponse()->setHeader('Content-Disposition', "attachment; filename={$midlet->getName()}.jar", true);
		$this->getResponse()->setHeader('Content-Length', filesize($path), true);
		$this->getResponse()->setHeader('Content-Type', 'application/java-archive', true);
		
		echo file_get_contents($path);
	}
	
	/**
	 * Получение профайла по ID в Request или редирект на 404.
	 * 
	 * @return ProfileRow
	 */
	private function _getProfileRow()
	{
		$profile = $this->_getParam('profile_id', 0);
		$profile = ProfilePeer::getInstance()->find($profile)->current();
		if (!$profile) {
			throw new Zend_Controller_Action_Exception('Profile not found');
		}
		
		return $profile;
	}
	
	/**
	 * Получение Мидлета по ID в Request или редирект на 404.
	 * Также проверка, что мидлет принадлежит к профилю.
	 * 
	 * @param  ProfileRow $profile
	 * @return MidletRow
	 */
	private function _getMidletRow($profile)
	{
		$midlet = $this->_getParam('midlet_id', 0);
		$midlet = MidletPeer::getInstance()->find($midlet)->current();
		if (!$midlet) {
			throw new Zend_Controller_Action_Exception('Midlet not found');
		}
		
		if ($midlet->getProfileId() != $profile->getId()) {
			throw new Zend_Controller_Exception('Midlet doesnt linked with profile');
		}
		
		return $midlet;
	}
	
	/**
	 * Получение субаккаунта по ID в Request, редиект на 404, если субаккаунт указан, но не существует.
	 * Методу передается ProfileRow, чтобы вычислить дефолтный субаккаунт.
	 * 
	 * @param ProfileRow $profile
	 * @return Db_Rowset
	 */
	private function _getSubaccRow($profile)
	{
		// Берем дефолтный субаккаунт из профиля, если он не указан в request.
		$subacc = $this->_getParam('subacc_id');
		if (!$subacc) {
			$subacc = $profile->getSubaccId();
		}
		
		$subaccRow = SubaccPeer::getInstance()->find($subacc)->current();
		if (!$subaccRow) {
			throw new Zend_Controller_Action_Exception('Subacc doesnt found');
		}
		
		if ($subacc->getProfileId() != $profile->getId()) {
			throw new Zend_Controller_Exception('Subaccount doesnt linked with profile');
		}
		
		return $subacc;
	}
}

