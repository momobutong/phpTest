<?php
$myfile = fopen('webdictionary.txt', 'w') or die('unable to open file');
$txt = '1234567890';
fwrite($myfile, $txt);
fclose($myfile);
?>