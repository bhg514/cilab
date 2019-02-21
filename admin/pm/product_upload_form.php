<?php
header ( "content-type:text/html; charset=utf-8" );
include_once("../../common.php");
require_once dirname(__FILE__) . '/Classes/PHPExcel/IOFactory.php';
$excel_file = $_FILES["excel_file"];
$filepath = $excel_file['tmp_name'];

$filetype = PHPExcel_IOFactory::identify($filepath);
$reader = PHPExcel_IOFactory::createReader($filetype);
$php_excel = $reader->load($filepath);

$sheet = $php_excel->getSheet(0);           // 첫번째 시트
$maxRow = $sheet->getHighestRow();          // 마지막 라인
$maxColumn = $sheet->getHighestColumn();    // 마지막 칼럼

$target = "A"."1".":"."$maxColumn"."$maxRow";
$lines = $sheet->rangeToArray($target, NULL, TRUE, FALSE);
$datetime = date("Y-m-d H:i:s");
// 라인수 만큼 루프
$query = "";
for ($i=1; $i<count($lines);$i++){
	$query = "insert into tb_product (fd_name, fd_price, fd_category, fd_stock, fd_status, fd_made, fd_option, fk_admin,fd_date) values(";
	for ($k=0;$k<9;$k++){
		if ($k==1||$k==3||$k==5){
			$query .=$lines[$i][$k].",";
		}else{
			$query .="'".$lines[$i][$k]."',";			
		}
	}
	$query .="'".$datetime."');";
	query_send_non_return($query);
}

header("location:https://".$http_host."/admin/pm/list.php");

