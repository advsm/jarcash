<?php

class Midlet
{
	/**
	 * Опции мидлета.
	 *
	 * @var array
	 */
	protected $_options;
	
	/**
	 * Ключ для шифрования
	 *
	 * @param string
	 */
	protected $_key;
	
	/**
	 * ID для временной папки, скорее всего это будет ID из midlet2subacc.
	 *
	 * @param integer
	 */
	protected $_id;
	
	public function __construct($config)
	{
		$this->setHelloMessage($config['hello_message']);
		$this->setByeMessage($config['bye_message']);
		$this->setId($config['id']);
		$this->setName($config['name']);
		$this->setSmsNumber($config['sms_number']);
		$this->setSmsText1($config['sms_text_1']);
		$this->setSmsText2($config['sms_text_2']);
		$this->setSmsWait1($config['sms_wait_1']);
		$this->setSmsWait2($config['sms_wait_2']);
		$this->setIcon($config['icon']);
		$this->setAgreement($config['agreement']);
	}
	
	public function setId($value)
	{
		$this->_id = $value;	
	}
	
	public function getId()
	{
		return $this->_id;
	}
	
	/**
	 * Генерация файла info.dat (зашифрованный конфиг приложения)
	 * Формат: $main.';'.$info.';'.$number.';'.$text1.';'.$text2.';'.$pause1.';'.$pause2.';';
	 * 
	 *
	 * @return string
	 */
	public function generateInfoDat()
	{
		$dir = $this->_getTmpDir();
		$file = "$dir/info.dat";
		if (file_exists($file)) {
			return $file;
		}
		
	    $src = $this->getHelloMessage() . ';' 
	    	. $this->getByeMessage() . ';'
	    	. $this->getSmsNumber() . ';'
	    	. $this->getSmsText1() . ';'
	    	. $this->getSmsText2() . ';'
	    	. $this->getSmsWait1() . ';'
	    	. $this->getSmsWait2() . ';';

	    // Формируем ключ для шифрования
		$key = '';
		$keysize = rand(32, 64);
		for ($i = 0; $i < $keysize; $i++) {
    		$key .= chr(rand(64, 190));
		}
		
	    // В этих неведомых строках шифруется конфиг.
	    $data = '';
	    $p = 0;
	    for ($i = strlen($src) - 1; $i >= 0; $i--) {      
	        $data = chr(ord(substr($src, $i, 1)) ^ ord($key{$p})).$data;
	        $p++;
	        if ($p == strlen($key)) {
	            $p = 0;
	        }
	    }
	    
	    $text = chr($keysize) . $key . $data;
	    file_put_contents($file, $text);
	    return $file;
	}
	
	/**
	 * Генерация файла MANIFEST.MF.
	 * http://rubezhnoe.org.ua/forum/44-337-1
	 * Возвращает путь до сгенеренного манифеста.
	 * 
	 * @return string
	 */
	public function generateManifest()
	{
		$dir = $this->_getTmpDir();
		$file = "$dir/MANIFEST.MF";
		if (file_exists($file)) {
			return $file;
		}

		$version = Config::getInstance()->midlet->version;

		$name = $this->_options['name'];
		$text = "Manifest-Version: 1.0\n";
		$text .= "Ant-Version: Apache Ant 1.8.1\n";
		$text .= "Created-By: 1.6.0_22-b04 (Sun Microsystems Inc.)\n";
		$text .= "MIDlet-1: {$name}, /icon.png, Midlet\n";
		$text .= "MIDlet-Name: {$name}\n";
		$text .= "MIDlet-Vendor: V\n";
		$text .= "MIDlet-Version: {$version}\n";
		$text .= "MicroEdition-Configuration: CLDC-1.0\n";
		$text .= "MicroEdition-Profile: MIDP-2.0\n";

		file_put_contents($file, $text);
		return $file;
	}

	/**
	 * Перемещает загруженную иконку во временную директорию, чтобы потом использовать ее.
	
	/**
	 * Генерация архива .jar
	 * Возвращает путь до архива.
	 * 
	 * @return string
	 */
	public function generateJar()
	{
		$dir = $this->_getTmpDir();
		$file = "$dir/midlet.jar";
		if (file_exists($file)) {
			return $file;
		}

		// Копируем иконку в папку генерации
		$icon = $dir . '/icon.png';
		copy($this->getIcon(), $icon);

		// Копируем соглашение в папку генерации
		$agreement = $dir . '/agreement.txt';
		file_put_contents($agreement, $this->getAgreement());
		
		$info = $this->generateInfoDat();
		$manifest = $this->generateManifest();
		$version = 'v' . Config::getInstance()->midlet->version . '/';
		$parent = realpath($dir . '/../');
		$version = "$parent/$version";
		
		$zip = new PclZip($file);
		$result = $zip->add($version, PCLZIP_OPT_REMOVE_PATH, $version);
		if ($result == 0) {
		    throw new Midlet_Exception("Adding to zip folder $version: " . $zip->errorInfo(true));
		}
		
		$result = $zip->add($info, PCLZIP_OPT_REMOVE_PATH, $dir . '/');
		if ($result == 0) {
		    throw new Midlet_Exception("Adding to zip info.dat $info: " . $zip->errorInfo(true));
		}

		$result = $zip->add($icon, PCLZIP_OPT_REMOVE_PATH, $dir . '/');
		if ($result == 0) {
			throw new Midlet_Exception("Adding to zip icon.png $icon: " . $zip->errorInfo(true));
		}

		$result = $zip->add($agreement, PCLZIP_OPT_REMOVE_PATH, $dir . '/');
		if ($result == 0) {
			throw new Midlet_Exception("Adding to zip agreement.txt $agreement: " . $zip->errorInfo(true));
		}
		
		$result = $zip->add($manifest, PCLZIP_OPT_ADD_PATH, 'META-INF/', PCLZIP_OPT_REMOVE_PATH, $dir . '/');
		if ($result == 0) {
			throw new Midlet_Exception("Adding to zip MF $manifest: " . $zip->errorInfo(true));
		}
		
		return $file;
	}
	
	/**
	 * Перемещает готовый мидлет в стабильную папку с именем равным ID.
	 * 
	 * @param string $path
	 * @return boolean
	 */
	public function moveToStable($path)
	{
		$stablePath = Config::getInstance()->midlet->jar_dir;
		if (!is_dir($stablePath) || !is_writable($stablePath)) {
			throw new Midlet_Exception('Хранилище стабильных мидлетов недоступно для записи: ' . $stablePath);
		}
		
		return copy($path, "$stablePath/{$this->getId()}.jar");
	}
	
	/**
	 * Возвращает папку в которой будет генериться и храниться временные файлы мидела.
	 *
	 * @return string
	 */
	protected function _getTmpDir()
	{
		$dir = Config::getInstance()->midlet->tmp_dir;
		if (!is_dir($dir) || !is_writable($dir)) {
			throw new Midlet_Exception('Tempolary dir not writable: ' . $dir);
		}
		
		$id = $this->getId();
		$path = "$dir/$id";
		if (is_dir($path)) {
			return $path;
		}
		
		if (!mkdir($path)) {
			throw new Midlet_Exception('Cant create new directory for generate midlet: ' . $path);
		}
		
		return $path;
	}
	
	/**
	 * Возвращает папку в которой будут хранится готовые мидлеты.
	 *
	 * @return string
	 */
	protected function getJarDir()
	{
		$dir = Config::getInstance()->midlet->jar_dir;
		if (is_dir($dir) && is_writable($dir)) {
			return $dir;
		}
		
		throw new Midlet_Exception('Midlet dir not writable: ' . $dir);
	}
	
	public function setHelloMessage($value)
	{
		$this->_options['hello_message'] = $value;
	}
	
	public function setByeMessage($value)
	{
		$this->_options['bye_message'] = $value;
	}
	
	public function setSmsText1($value)
	{
		$this->_options['sms_text_1'] = $value;
	}
	
	public function setSmsText2($value)
	{
		$this->_options['sms_text_2'] = $value;
	}
	
	public function setName($value)
	{
		$this->_options['name'] = $value;
	}
	
	public function setSmsWait1($value)
	{
		$this->_options['sms_wait_1'] = $value;
	}
	
	public function setSmsWait2($value)
	{
		$this->_options['sms_wait_2'] = $value;
	}
	
	public function setSmsNumber($value) {
		$this->_options['sms_number'] = $value;
	}
	

	
	
	
	public function getHelloMessage()
	{
		return $this->_options['hello_message'];
	}
	
	public function getByeMessage()
	{
		return $this->_options['bye_message'];
	}
	
	public function getSmsText1()
	{
		return $this->_options['sms_text_1'];
	}
	
	public function getSmsText2()
	{
		return $this->_options['sms_text_2'];
	}
	
	public function getName()
	{
		return $this->_options['name'];
	}
	
	public function getSmsWait1()
	{
		return $this->_options['sms_wait_1'];
	}
	
	public function getSmsWait2()
	{
		return $this->_options['sms_wait_2'];
	}
	
	public function getSmsNumber() {
		return $this->_options['sms_number'];
	}


	public function setIcon($value)
	{
		$this->_options['icon'] = $value;
	}

	public function getIcon()
	{
		return $this->_options['icon'];
	}


	public function setAgreement($value)
	{
		$this->_options['agreement'] = $value;
	}

	public function getAgreement()
	{
		return $this->_options['agreement'];
	}

}
