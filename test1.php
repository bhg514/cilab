<?php
include_once('./menu/zip_down.php');


$zip = new DirectZip();
$zip->open('test111.zip');
$zip->addFile('test1.png', './admin/files/5be71a8ec2a75.png');
$zip->addFile('test2.png', './admin/files/5be71a8ec2a75.png');
$zip->close();
?>