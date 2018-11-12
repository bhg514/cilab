<?php
header('Content-Type:text/csv;charset=UTF-8;');
include_once('../common.php');

$type1 = $_GET['type1']; //다운 table 
$type2 = $_GET['type2']; // 전체 or 부분



if($type1=="product"){//상품 다운

	if($type2=="1"){ // 전체
		$query = "select pk_no, fd_name, fd_price, fd_category, fd_stock, fd_date, fd_status, fd_delivery, fd_made, fk_admin, fd_option from tb_product order by pk_no";
	}
	elseif ($type2=="2"){//부분
		$chk_arr = $_POST['chk_arr'];
		$chk2str = implode(',', $chk_arr);
		$query = "select pk_no, fd_name, fd_price, fd_category, fd_stock, fd_date, fd_status, fd_delivery, fd_made, fk_admin, fd_option from tb_product where pk_no in (".$chk2str.") order by pk_no";
	}
		
	

	$result = query_send($query);
	$csv_dump = "NO, 상품명, 가격, 카테고리, 재고, 날짜, 상태, 배송비, 제조국, 등록자, 옵션";
	$csv_dump .= "\r\n"; 

	while ($row = mysqli_fetch_array($result)) {
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
	}
}elseif ($type1=="order") { //주문 배송 전체 
	if($type2=="1"){ // 전체	
		$query = "select group_concat(a.fd_product_name) name  ,b.* from tb_order b left join (select * from tb_order_detail) a on b.pk_no = a.fk_order_no group by pk_no";
	}elseif ($type2=="2") {// 부분
		$chk_arr = $_POST['chk_arr'];
		$chk2str = implode(',', $chk_arr);
		$query = "select group_concat(a.fd_product_name) name  ,b.* from tb_order b left join (select * from tb_order_detail) a on b.pk_no = a.fk_order_no where b.pk_no in (".$chk2str.") group by pk_no";
	}elseif ($type2=="3") {
		$pk_no = $_GET['no'];
		$query = "select group_concat(a.fd_product_name) name  ,b.* from tb_order b left join (select * from tb_order_detail) a on b.pk_no = a.fk_order_no where b.pk_no=".$chk2str." group by pk_no";
	}
	$result = query_send($query);
	$csv_dump = "NO, 주문번호, 주문날짜, 주문자ID, 주문자 연락처, 주문자 이름, 주문자 이메일, 배송지 이름, 배송지 우편번호, 배송지 주소, 배송지 상세주소, 배송지 연락처, 배송 요청사항, 결제금액, 배송비, 결제수단, 결제번호, 운송장번호, 상태, 상태 메세지";
	$csv_dump .= "\r\n"; 



}elseif($type1=="user"){

}elseif ($type1=="statistic") {
	
}




$date = date("YmdHi"); 
$filename = "csvoutput_".$date.".csv"; 



header("Content-Disposition: attachment; filename=$filename"); 

echo "\xEF\xBB\xBF"; 

echo $csv_dump; 


?> 