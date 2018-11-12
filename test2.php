<?php
header('Content-Type:text/csv;charset=UTF-8;');
include_once('common.php');

$query = "select pk_no, fd_name, fd_price, fd_category, fd_stock, fd_date, fd_status, fd_delivery, fd_made, fk_admin, fd_option from tb_product order by pk_no";
$result = query_send($query);
// CSV 파일 최상단에 표기 할 내용입니다. 
$csv_dump = "NO, 상품명, 가격, 카테고리, 재고, 날짜, 상태, 배송비, 제조국, 등록자, 옵션";
$csv_dump .= "\r\n"; 

while ($row = mysqli_fetch_array($result)) {


// 행 값을 csv_dump 에 쓸어담습니다 -_-; 
$csv_dump .= $row['pk_no'].","; 
$csv_dump .= $row['fd_name'].","; 
$csv_dump .= $row['fd_price'].","; 

if($row['fd_category']==1) $csv_dump .= "Water Drones,";
elseif($row['fd_category']==2) $csv_dump .= "Upgrade & Accessories,";
elseif($row['fd_category']==3) $csv_dump .= "DIY & Parts,";
elseif($row['fd_category']==4) $csv_dump .= "Water Education Kit,";

$csv_dump .= $row['fd_stock'].","; 
$csv_dump .= $row['fd_date'].","; 

if($row['fd_status']==1) $csv_dump .= "판매중,";
elseif($row['fd_status']==2) $csv_dump .= "판매중지,";

$csv_dump .= $row['fd_delivery'].","; 
$csv_dump .= $row['fd_made'].","; 
$csv_dump .= $row['fk_admin'].","; 
$csv_dump .= $row['fd_option']; 
$csv_dump .= "\r\n"; 

} // while문 종료 

// CSV 파일로 저장합니다. 파일명을 날짜를 붙여 생성합니다. 
$date = date("YmdHi"); 
$filename = "csvoutput_".$date.".csv"; 



header("Content-Disposition: attachment; filename=$filename"); 

echo "\xEF\xBB\xBF"; 

echo $csv_dump; 


?> 