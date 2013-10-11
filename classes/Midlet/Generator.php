<?php

class Midlet_Generator
{
	/**
	 * @var Midlet2subacc
	 */
	protected $_midlet2subacc;
	
	/**
	 * Полный путь до временной директории, в которой генерируется мидлет.
	 * 
	 * @var string
	 */
	protected $_dir;
	
	public function __construct(Midlet2subaccRow $midlet2subacc)
	{
		$this->_midlet2subacc = $midlet2subacc;
	}
	
	/**
	 * @return Midlet2subaccRow
	 */
	public function getMidlet2subacc()
	{
		return $this->_midlet2subacc;
	}
	
	/**
	 * Метод полностью генерирует мидлет, не требует дополнительных действий после себя.
	 * 
	 * @return void
	 */
	public function generate()
	{
		$this->addIcon();
		$this->addAgreement();
		$this->addClasses(); 
		$this->addInfo();
		$this->addManifest();
		$this->pack();
		$this->release();
	}
	
	/**
	 * Возвращает временную директорию, в которой происходит генерация мидлета.
	 * 
	 * @return string
	 */
	public function getDir()
	{
		if ($this->_dir) {
			return $this->_dir;
		}
		
		$dir = Config::getInstance()->midlet->tmp_dir;
		if (!is_dir($dir) || !is_writable($dir)) {
			throw new Midlet_Exception('Временная директория для мидлетов не доступна для записи: ' . $dir);
		}
		
		$id = uniqid($this->getMidlet2subacc()->getId() . '_' . date('YmdHis') . '_');
		$path = "$dir/$id";
		if (!mkdir($path)) {
			throw new Midlet_Exception('Не получилось создать новую директорию для генерации мидлета: ' . $path);
		}
		
		$this->_dir = $path;
		return $path;
	}
	
	/**
	 * Добавляет к составляющим мидлета соглашение.
	 * 
	 * @return void
	 */
	public function addAgreement()
	{
		$midlet2subacc = $this->getMidlet2subacc();
		$midlet = $midlet2subacc->getMidletRowByMidletId();
		$number = $midlet->getSmsNumberRowBySmsNumberId();
		$agreement = $number->getAgreement();
		
		$file = $this->getDir() . "/agreement.txt";
		file_put_contents($file, $agreement);
	}
	
	/**
	 * Добавляет к составляющим мидлета зашифрованные свойства.
	 * Формат: $main.';'.$info.';'.$number.';'.$text1.';'.$text2.';'.$pause1.';'.$pause2.';';
	 * 
	 * @return void
	 */
	public function addInfo()
	{
		$midlet2subacc = $this->getMidlet2subacc();
		$midlet = $midlet2subacc->getMidletRowByMidletId();
		
		$prefix = trim($midlet->getSmsNumberRowBySmsNumberId()->getSmsBillingRowBySmsBillingId()->getPrefix()) . ' ';
	    $src = $midlet->getHelloMessage() . ';' 
	    	. $midlet->getByeMessage() . ';'
	    	. $midlet->getSmsNumberRowBySmsNumberId()->getNumber() . ';'
	    	. $prefix . $midlet2subacc->getId() . '1;'
	    	. $prefix . $midlet2subacc->getId() . '2;'
	    	. $midlet->getSmsWait1() . ';'
	    	. $midlet->getSmsWait2() . ';';

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
	    $file = $this->getDir() . '/info.dat';
	    file_put_contents($file, $text);
	}
	
	/**
	 * Добавляет к составляющим мидлета скомпилированные ява классы.
	 * Чтобы получить путь до классов нужно взять директорию, указанную в конфиге,
	 * и добавить к ней ключ типа мидлета.
	 * Все классы лежат в репозитории.
	 * 
	 * @return void
	 */
	public function addClasses()
	{
		$midlet2subacc = $this->getMidlet2subacc();
		$midlet = $midlet2subacc->getMidletRowByMidletId();
		
		$type = $midlet->getMidletTypeRowByTypeId();
		$classesDir = Config::getInstance()->midlet->classes_dir . '/' . $type->getKey();
		$dir = dir($classesDir);
		while (false !== ($file = $dir->read())) {
			if (!preg_match("/\.class$/", $file)) continue;
			copy("$classesDir/$file", $this->getDir() . "/$file");
		}
		$dir->close();
	}
	
	/**
	 * Добавляет к составляющим мидлета иконку.
	 * При загрузке иконке дается уникальное имя и она кладется в определенную папку внутри htdocs,
	 * чтобы получить полный путь до иконке, нужно склеить путь, указанный в конфиге со значением в базе.
	 * 
	 * @return void
	 */
	public function addIcon()
	{
		$midlet2subacc = $this->getMidlet2subacc();
		$midlet = $midlet2subacc->getMidletRowByMidletId();
		
		$current = $midlet->getInternalIconPath();
		$moveTo = $this->getDir() . '/icon.png';
		copy($current, $moveTo);
	}
	
	/**
	 * Добавляет к составляющим мидлета манифест.
	 * Подробнее про манифест: http://rubezhnoe.org.ua/forum/44-337-1
	 * 
	 * @return void
	 */
	public function addManifest()
	{
		$midlet2subacc = $this->getMidlet2subacc();
		$midlet = $midlet2subacc->getMidletRowByMidletId();
		
		$name = $midlet->getKey();
		$version = $midlet->getMidletTypeRowByTypeId()->getVersion();

		$text = "Manifest-Version: 1.0\n";
		$text .= "Ant-Version: Apache Ant 1.8.1\n";
		$text .= "Created-By: 1.6.0_22-b04 (Sun Microsystems Inc.)\n";
		$text .= "MIDlet-1: {$name}, /icon.png, Midlet\n";
		$text .= "MIDlet-Name: {$name}\n";
		$text .= "MIDlet-Vendor: V\n";
		$text .= "MIDlet-Version: {$version}\n";
		$text .= "MicroEdition-Configuration: CLDC-1.0\n";
		$text .= "MicroEdition-Profile: MIDP-2.0\n";

		$file = $this->getDir() . '/MANIFEST.MF';
		file_put_contents($file, $text);
	}
	
	/**
	 * Упаковывает все составляющие мидлета в ZIP архив.
	 * Манифест кладет в подпапку META-INF.
	 * 
	 * @return void
	 */
	public function pack()
	{
		if (!defined('PCLZIP_TEMPORARY_DIR')) {
			define('PCLZIP_TEMPORARY_DIR', '/tmp/');
		}
		
		$dir = $this->getDir();
		$zip = new PclZip($dir . '/midlet.jar');
		$d = dir($this->getDir());
		while (false !== ($file = $d->read())) {
			if (in_array($file, array('.', '..'))) continue;
			$path = $dir . '/' . $file;
			
			if ($file == 'MANIFEST.MF') {
				$result = $zip->add($path, PCLZIP_OPT_ADD_PATH, 'META-INF/', PCLZIP_OPT_REMOVE_PATH, $dir);
			} else {
				$result = $zip->add($path, PCLZIP_OPT_REMOVE_PATH, $dir);
			}
			
			if (!$result) {
				throw new Midlet_Exception("Добавление в зип файла `$path` обломалось: " . $zip->errorInfo(true));
			}
		}
	}
	
	/**
	 * Перемещает сгенеренный мидлет в постоянную папку и переименовывает как надо.
	 * 
	 * @return void
	 * @throws MidletException
	 */
	public function release()
	{
		$stablePath = Config::getInstance()->midlet->jar_dir;
		if (!is_dir($stablePath) || !is_writable($stablePath)) {
			throw new Midlet_Exception('Хранилище стабильных мидлетов недоступно для записи: ' . $stablePath);
		}
		
		$from = $this->getDir() . "/midlet.jar";
		$to = "$stablePath/{$this->getMidlet2subacc()->getId()}.jar";
		
		$result = @copy($from, $to);
		if (!$result) {
			throw new Midlet_Exception("Не удалось скопировать временный мидлет в папку для хранения мидлетов: `$from` -> `$to`");
		}
	}
	
}