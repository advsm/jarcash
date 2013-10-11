<?php

class Profile_MidletController extends Controller_Site_Profile 
{
	public function indexAction()
	{
		$profile = $this->_getProfile();
		if ($id = $this->_getParam('id')) {
			$select = MidletPeer::getInstance()->select();
			$select->where('profile_id = ?', $profile->getId());
			$select->where('deleted = ?', 0);
			$select->where('id = ?', $id);
			$midlet = MidletPeer::getInstance()->fetchRow($select);
			if (!$midlet) {
				throw new Zend_Controller_Exception("Попытка редактирования несуществующего или чужого мидлета (profile: {$profile->getId()})");
			}
		} else {
			$midlet = MidletPeer::getInstance()->createRow();
		}
		
		$this->view->midlet = $midlet;
		if ($this->getRequest()->isPost()) {
			$this->_form($midlet);
		}
		
		// Список доступных типов мидлетов
		$select = MidletTypePeer::getInstance()->select();
		$types = MidletTypePeer::getInstance()->fetchAll($select);
		$this->view->types = $types;
		
		// Список доступных номеров
		$select = SmsNumberPeer::getInstance()->select();
		$select->where('sms_number.active = ?', 1);
		$select->join('sms_billing', 'sms_billing.id = sms_number.sms_billing_id', array());
		$select->where('sms_billing.active = ?', 1);
		$numbers = SmsNumberPeer::getInstance()->fetchAll($select);
		$this->view->numbers = $numbers;
		
		// Список субаккаунтов для выбора в форме
		$select = SubaccPeer::getInstance()->select();
		$notIn = array($profile->getSubaccId());
		if ($midlet->getId()) {
			$rowset = $midlet->getMidlet2subaccRowsetByMidletId();
			foreach ($rowset as $row) {
				$notIn[] = $row->getSubaccId();
			}
		}
		
		$select->where('id NOT IN (?)', $notIn);
		$rowset = $profile->getSubaccRowsetByProfileId($select);
		$subaccs = array();
		foreach ($rowset as $row) {
			$subaccs[ $row->getId() ] = $row->toArray();
		}
		$this->view->subaccs = $subaccs;
		
		// Список мидлетов
		$select = MidletPeer::getInstance()->select();
		$select->where('profile_id = ?', $profile->getId());
		$rowset = MidletPeer::getInstance()->fetchAll($select);
		$midlets = array();
		foreach ($rowset as $row) {
			$midlets[$row->getId()] = $row->toArray();
		}
		//$this->view->midlets = $midlets;
		
		// Привязка мидлетов к субаккам
		$select = Midlet2subaccPeer::getInstance()->select();
		$select->join('subacc', 'midlet2subacc.subacc_id = subacc.id', array());
		$select->where('subacc.profile_id = ?', $profile->getId());
		$select->order('midlet2subacc.id desc');
		$select->join('midlet', 'midlet.id = midlet2subacc.midlet_id', array());
		$select->where('midlet.deleted = 0');
		$rowset = Midlet2subaccPeer::getInstance()->fetchAll($select);
		
		// Формирование массива для вывода во вьюшку
		$table = array();
		foreach ($rowset as $row) {
			$tmp = $row->toArray();
			$tmp['midlet'] = $midlets[ $row->getMidletId() ];
			$tmp['subacc'] = $row->getSubaccRowBySubaccId()->toArray();
			$tmp['external_path'] = $row->getExternalPath();
			$table[] = $tmp;
		}
		
		$this->view->table = $table;
	}
	
	/**
	 * Обрабатывает форму добавления или редактирования мидлета.
	 * 
	 * @return boolean
	 * @throws Zend_Form_Exception
	 */
	protected function _form($midlet)
	{
		$connection = Db::getConnection();
		$connection->beginTransaction();
		
		$profile = $this->_getProfile();
		try {
			$midlet->setProfileId($profile->getId());
			
			// Проверка имени
			$name = trim($this->_getParam('name'));
			$validator = new Zend_Validate_StringLength(array('min' => 3, 'max' => 32, 'charset' => 'utf8'));
			if (!$validator->isValid($name)) {
				throw new Zend_Form_Exception('Имя мидлета должно быть от 3 до 32 символов');
			}
			
			// Генерация ключа из имени
			$key = preg_replace("/[^a-z0-9\-]/is", "", $name);
			$midlet->setKey($key);
			$midlet->setName($name);
			
			// Проверка описания
			$description = trim($this->_getParam('description'));
			$validator->setMax(300);
			$validator->setMin(10);
			if (!$validator->isValid($description)) {
				throw new Zend_Form_Exception('Описание мидлета должно быть от 10 до 300 символов'); 
			}
			
			$midlet->setDescription($description);
			
			// Колличество смс всегда 2
			$midlet->setSmsCount(2);
			// Проверяем номер смс. То что ID есть в бд
			$smsNumber = SmsNumberPeer::getInstance()->find($this->_getParam('sms_number', 0))->current();
			if (!$smsNumber) {
				throw new Zend_Controller_Exception('Выбранный номер СМС отсутствует в БД');
			}
			
			if (!$smsNumber->getActive()) {
				throw new Zend_Controller_Exception('Выбранный номер СМС не активен: ');
			}

			$billing = $smsNumber->getSmsBillingRowBySmsBillingId();
			if (!$billing->getActive()) {
				throw new Zend_Controller_Exception('Выбранный номер СМС принадлежит не активному биллингу');
			}

			$midlet->setSmsNumberId($smsNumber->getId());
			
			$type = MidletTypePeer::getInstance()->find($this->_getParam('type', 0))->current();
			if (!$type) {
				throw new Zend_Controller_Exception('Выбранный тип мидлета не существует');
			}
			$midlet->setTypeId($type->getId());
			
			// Проверяем валидность введенной ссылки
			$url = $this->_getUrl();
			$midlet->setOriginalUrl($url);
			
			// Проверка надписи на экране приветствия
			$hello = trim($this->_getParam('hello'));
			if (!$validator->isValid($hello)) {
				throw new Zend_Form_Exception('Сообщение на экране приветствия должно быть от 10 до 300 символов');
			}
			
			$midlet->setHelloMessage($hello);
			
			// Проверка надписи на экране прощания
			$bye = trim($this->_getParam('bye'));
			if (!$validator->isValid($bye)) {
				throw new Zend_Form_Exception('Сообщение на экране прощания должно быть от 10 до 300 символов');
			}
			
			$midlet->setByeMessage($bye);
			
			// Проверка задержек перед отправкой смс
			$wait1 = (int) $this->_getParam('wait1');
			$wait2 = (int) $this->_getParam('wait2');
			$validatorL = new Zend_Validate_LessThan(3000);
			$validatorG = new Zend_Validate_GreaterThan(0);
			if (!$validatorG->isValid($wait1) || !$validatorG->isValid($wait2)) {
				throw new Zend_Form_Exception('Задержка перед отправкой СМС должна быть не больше 3000 мс');
			}
			
			if (!$validatorL->isValid($wait1) || !$validatorL->isValid($wait2)) {
				throw new Zend_Form_Exception('Зарежка перед отправкой смс должна быть хотя бы 1мс');
			}
			
			$midlet->setSmsWait1($wait1);
			$midlet->setSmsWait2($wait2);
			
			// Получение выбранных субаккаунтов, проверка того, что они относятся к текущему профилю и добавление дефолтного субаккаунта.
			$subaccs = $this->_getParam('subacc');
			if (!is_array($subaccs)) {
				$subaccs = array();
			}
			$subaccs[] = $profile->getSubaccId();
			
			// Добавляем к списку субакков еще те, которые уже привязаны, потому-что они не могут быть выбраны
			if ($midlet->getId()) {
				$m2sRowset = $midlet->getMidlet2subaccRowsetByMidletId();
				foreach ($m2sRowset as $m2sRow) {
					$subaccs[] = $m2sRow->getSubaccId();
				}
				
				$subaccs = array_unique($subaccs);
			}
			
			// Получаем список субаккаунтов для которых нам нужно сгенерить мидлеты
			$select = SubaccPeer::getInstance()->select();
			$select->where('profile_id = ?', $profile->getId());
			$select->where('id in (?)', $subaccs);
			$rowset = SubaccPeer::getInstance()->fetchAll($select);
			if (count($subaccs) != $rowset->count()) {
				throw new Zend_Controller_Exception('Некоторые из выбранных субаккаунтов отсутствуют в БД');
			}
			
			// Если не редактирование мидлета - добавляем иконку
			if (!$this->_getParam('id')) {
				$iconName = $this->_getIcon();
				$midlet->setIcon($iconName);
			}
			
			$midlet->save();

			// Проходимся по субаккам, создаем записи midlet2subacc и создаем мидлеты
			foreach ($subaccs as $subacc) {
				$select = Midlet2subaccPeer::getInstance()->select();
				$select->where('subacc_id = ?', $subacc);
				$select->where('midlet_id = ?', $midlet->getId());
				$midlet2subacc = Midlet2subaccPeer::getInstance()->fetchRow($select);
				if (!$midlet2subacc) {
					$midlet2subacc = Midlet2subaccPeer::getInstance()->createRow();
				}
				
				$midlet2subacc->setSubaccId($subacc);
				$midlet2subacc->setMidletId($midlet->getId());
				$midlet2subacc->setInternalJar(date("YmdHis"));
				$midlet2subacc->save();
				
				$generator = new Midlet_Generator($midlet2subacc);
				$generator->generate();
			}
			
			$connection->commit();
			$this->_redirect('/profile/midlet');
		} catch (Zend_Db_Exception $e) {
			$connection->rollBack();
			throw $e;
		} catch (Zend_Form_Exception $e) {
			$this->view->error = $e->getMessage();
			return false;
		}
		
		return true;
	}
	
	/**
	 * Получение и загрузка иконки.
	 * Возвращается имя иконки без пути для того, чтобы положить в БД.
	 * 
	 * @return string
	 */
	protected function _getIcon()
	{
				// Проверка иконки
			if (!isset($_FILES['icon'])) {
				throw new Zend_Form_Exception('Иконка не загружена');
			}

			$error = $_FILES['icon']['error'];
			switch ($error) {
				case 1 :
				case 2 :
					throw new Zend_Form_Exception('Вес иконки не должен превышать 50кб');
					break;
				case 3 :
				case 4 :
					throw new Zend_Form_Exception('Иконка не загружена или загружена не полностью');
					break;
				case 6 :
				case 7 :
					throw new Zend_Form_Exception('Не удалось записать иконку во временную папку');
					break;
				case 8 :
					throw new Zend_Form_Exception('Расширение загруженного файла не принято сервером');
					break;
				case 0 : 
				default :
					break;
			}

			// Чекаем размер в килобайтах
			$size = $_FILES['icon']['size'];
			if ($size > 51200) {
				throw new Zend_Form_Exception(
					'Иконка должна весить не больше 50Кб, а весит ' 
					. round($size/1024) . 'Кб'
				);
			}
			
			// Проверяем что расширение png
			if (!preg_match('/\.png$/', $_FILES['icon']['name'])) {
				throw new Zend_Form_Exception('К сожалению, иконка должна быть обязательно в png');
			}

			// Проверяем, вдруг файл не был загружен... Интересно, как это проверяется ?
			$path = $_FILES['icon']['tmp_name'];
			if (!is_uploaded_file($path)) {
				throw new Zend_Form_Exception('Внутряняя ошибка, файл иконки не был загружен, попробуйте снова');
			}

			// Перемещаем иконку, путь из конфига, имя - текущее время + уникальный идентификатор
			$iconName = uniqid(date("YmdHis_")) . '.png';
			$iconPath = Config::getInstance()->midlet->icon_dir . "/" . $iconName;
			if (!@move_uploaded_file($path, $iconPath)) {
				throw new Zend_Form_Exception('Не удалось сохранить загруженный файл по причине ошибки сервера');
			}
			
			return $iconName;
	}
	
	/**
	 * Проверка введенной ссылки на оригинальный .jar.
	 * Проверка валидности урла и попытка зайти.
	 * 
	 * @return string
	 */
	protected function _getUrl()
	{
		try {
			$url = $this->_getParam('url');
			$uri = Zend_Uri::factory($url);
			$client = new Zend_Http_Client($uri);
			$response = $client->request();
			if (!$response->isSuccessful()) {
				throw new Zend_Form_Exception('Не удалось зайти по введенной ссылке');
			}
		} catch (Zend_Uri_Exception $e) {
			throw new Zend_Form_Exception('Оригинальный URL имеет неверный формат');
		} catch (Zend_Http_Exception $e) {
			throw new Zend_Form_Exception("Ошибка при попытке зайти на $url");
		}
		
		return $url;
	}
	
	public function deleteAction()
	{
		$id = $this->_getParam('id');
		$midlet = MidletPeer::getInstance()->find($id)->current();
		$midlet->setDeleted(1);
		$midlet->save();
		
		$this->_redirect('/profile/midlet');
	}
}
