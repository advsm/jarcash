<?php

class File
{
	/**
	 * Постоянный путь до файла, уникальный по его контенту и расширению (внутри upload)
	 * 
	 * @var string
	 */
	protected $_path;
	
	/**
	 * Временный путь до файла.
	 * Это может быть как загруженный файл так и файл в рандомном месте в ФС.
	 * 
	 * @var string
	 */
	protected $_tmpPath;
	
	/**
	 * Сохранен ли файл внутри установленной в конфиге папке upload.
	 * 
	 * @var boolean
	 */
	protected $_saved = false;
	
	/**
	 * Расширение файла.
	 * 
	 * @var string
	 */
	protected $_extenstion;
	
	/**
	 * Создаем объект файл по переданному аргументы.
	 * Можно передавать имя в $_FILES, путь в ФС, путь от htdocs или ссылку.
	 * 
	 * @param mixed $argument
	 * @return File
	 */
	public static function factory($argument)
	{
		if (isset($_FILES[$argument])) {
			if ($_FILES[$argument]['error']) {
				//0 - ошибок не было, файл загружен.
				//1 - размер загруженного файла превышает размер установленный параметром upload_max_filesize в php.ini
				//2 - размер загруженного файла превышает размер установленный параметром MAX_FILE_SIZE в HTML форме.
				//3 - загружена только часть файла
				//4 - файл не был загружен (Пользователь в форме указал неверный путь к файлу).
				throw new File_Exception("Uploaded file error (code {$_FILES[$argument]['error']})");
			}
			
			$file = new File();
			$file->setTmpPath($_FILES[$argument]['tmp_name']);
			
			$name = $_FILES[$argument]['name'];
			$extenstion = self::getExtenstionByName($name);
    		$file->setExtenstion($extenstion);
    	
			return $file;
		} else if (preg_match('/^[a-z0-9]+\.[a-z]{2,4}$/', $argument)) {
			$file = new File();
			$extenstion = self::getExtenstionByName($argument);
    		$file->setExtenstion($extenstion);
    		
    		$folder = substr($argument, 0, 2);
    		$path = Config::getInstance()->file_transfer->destination . "/$folder/$argument";
    		$file->setPath($path);
    		
    		return $file;
		}
		
		throw new File_Exception("Неизвестный аргумент, невозможно создать файл");
	}
	
	/**
	 * Сохраняет файл в указанную в конфиге папку с уникальным по хешу именем.
	 * 
	 * @return void
	 */
	public function save()
	{
		if ($this->_saved) return;
		
    	$dest = $this->getPath();
		if (!move_uploaded_file($this->getTmpPath(), $dest)) {
			throw new File_Exception("Error move uploaded file (destination: $dest)");
		}
		
		$this->_saved = 1;
	}
	
	/**
	 * Получить абсолютный путь относительно document_root.
	 * 
	 * @return string
	 */
	public function getHtdocsPath()
	{
		$path = $this->getPath();
		$path = preg_replace('/^.+\/htdocs\//is', '/', $path);
		return $path;
	}
	
	/**
	 * Получить значение в базе данных по пути к файлу.
	 * 
	 * @return string
	 */
	public function getDbValue()
	{
		$path = $this->getPath();
		$path = preg_replace('/^.+\/([a-z0-9\.]+)$/is', '$1', $path);
		return $path;
	}
	
	/**
	 * Полный путь до файла внутри upload.
	 * 
	 * @return string
	 */
	public function getPath()
	{
		if ($this->_path) {
			return $this->_path;
		}
		
		$content = file_get_contents($this->getTmpPath());
		$hash = md5($content);
    	$folder = substr($hash, 0, 2);
    	$destination = Config::getInstance()->file_transfer->destination . "/$folder";
    	
	    // Create directory when not exists
    	if (!is_dir($destination)) {
    		mkdir($destination, 0777);
    	}
    	
    	$extenstion = $this->getExtenstion();
    	$filename = $destination . "/$hash.$extenstion";
    	
    	$this->_path = $filename;
    	return $filename;
	}
	
	/**
	 * Установить полный путь до файла внутри upload
	 * 
	 * @param string $path
	 * @return void
	 */
	public function setPath($path)
	{
		$this->_path = $path;
	}
	
	/**
	 * Установить временный путь к файлу.
	 * 
	 * @param string $tmpPath
	 * @return void
	 */
	public function setTmpPath($tmpPath)
	{
		$this->_tmpPath = $tmpPath;
	}
	
	/**
	 * Получить временный путь к файлу
	 * 
	 * @return string
	 */
	public function getTmpPath()
	{
		return $this->_tmpPath;
	}
	
	/**
	 * Установить расширение файла
	 * 
	 * @param string $tmpPath
	 * @return void
	 */
	public function setExtenstion($extenstion)
	{
		$this->_extenstion = $extenstion;
	}
	
	/**
	 * Получить расширение файла
	 * 
	 * @return string
	 */
	public function getExtenstion()
	{
		return $this->_extenstion;
	}
	
	/**
	 * Возвращает расширение файла по имени.
	 * 
	 * @param string $name
	 * @return string
	 */
	public static function getExtenstionByName($name)
	{
    	preg_match("/\.([a-z]{1,4})$/i", $name, $match);
    	if (!isset($match[1])) {
    		throw new File_Exception("Uploaded file has not extenstion");
    	}
    	
    	return $match[1];
	}
	
}