<?php
include_once('./menu/make_zip.php');


$zip = new DirectZip();
$zip->open('test111.zip');
$zip->addFromString('바로 글쓰기.txt', '파일 내용'); // 압축파일에 '파일 내용'을 '바로 글쓰기.txt'로 추가
$zip->addFile('admin/files/test.txt','qqqq.txt');
$zip->addFile('admin/files/5be71a6637a4d.png','ttttt.png');
$zip->close();
?>

