<?php
// echo readfile('webdictionary.txt');
$myfile = fopen('webdictionary.txt', 'r') or die('unable to open file');

while (!feof($myfile)) {
	// echo fgets($myfile); 读取一行
	echo fgetc($myfile);//读取一个字符
}
//读取文件
//echo fread($myfile, filesize('webdictionary.txt'));
fclose($myfile);
?>