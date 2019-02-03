<?php
header('Content-Type:text/csv;charset=UTF-8;');
include_once('../common.php');

$type1 = $_GET['type1']; //다운 table 
$type2 = $_GET['type2'] ?? 1; // 전체 or 부분


$date = date("YmdHi"); 

if($type1=="product"){//상품 다운

	if($type2=="1"){ // 전체
		$filename = "all_product_".$date.".csv"; 
		$query = "select pk_no, fd_name, fd_price, fd_category, fd_stock, fd_date, fd_status, fd_delivery, fd_made, fk_admin, fd_option from tb_product order by pk_no desc";
	}
	elseif ($type2=="2"){//부분
		$chk_arr = $_GET['chk_arr'];			
		$filename = "chk_product_".$date.".csv"; 
		$query = "select pk_no, fd_name, fd_price, fd_category, fd_stock, fd_date, fd_status, fd_delivery, fd_made, fk_admin, fd_option from tb_product where pk_no in (".$chk_arr.") order by pk_no desc";
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
		$csv_dump .= $row['fd_status'].","; 

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
		$filename = "all_order_".$date.".csv"; 
		$query = "SELECT o.*, group_concat(od.fd_product_name SEPARATOR '||') name, group_concat(od.fd_price SEPARATOR '||') price, group_concat(od.fd_count SEPARATOR '||') count, group_concat(od.fd_option SEPARATOR '||') option  FROM tb_order o LEFT JOIN tb_order_detail od on o.pk_no =od.fk_order_number GROUP BY o.pk_no";
	}elseif ($type2=="2") {// 부분
		$filename = "chk_order_".$date.".csv"; 
		$chk_arr = $_GET['chk_arr'];

		$query = "SELECT o.*, group_concat(od.fd_product_name SEPARATOR '||') name, group_concat(od.fd_price SEPARATOR '||') price, group_concat(od.fd_count SEPARATOR '||') count, group_concat(od.fd_option SEPARATOR '||') option  FROM tb_order o LEFT JOIN tb_order_detail od on o.pk_no =od.fk_order_number WHERE o.pk_no in(".$chk_arr.") GROUP BY o.pk_no";

		
	}elseif ($type2=="3") {
		$filename = "one_order_".$date.".csv"; 
		$pk_no = $_GET['no'];
		$query = "select group_concat(a.fd_product_name) name  ,b.* from tb_order b left join (select * from tb_order_detail) a on b.pk_no = a.fk_order_no where b.pk_no=".$pk_no." group by pk_no";
	}
	$result = query_send($query);
	$csv_dump = "NO, 주문번호, 주문날짜, 상품이름, 상품가격, 상품개수, 상품옵션, 주문자ID, 주문자 연락처, 주문자 이름, 주문자 이메일, 배송지 이름, 배송지 우편번호, 배송지 주소1, 배송지 주소2, 배송지 주소3, 배송지 주소4, 배송지 연락처, 결제금액, 배송비, 결제수단, 결제번호, 운송장번호, 상태, 상태 메세지";
	$csv_dump .= "\r\n"; 

	while ($row = mysqli_fetch_array($result)) {
		$csv_dump .= $row['pk_no'].","; 
		$csv_dump .= $row['fk_order_number'].","; 
		$csv_dump .= $row['fd_date'].","; 
		$csv_dump .= $row['name'].","; 
		$csv_dump .= $row['price'].","; 
		$csv_dump .= $row['count'].",";
		$csv_dump .= $row['option'].","; 
		$csv_dump .= $row['fd_order_id'].","; 
		$csv_dump .= $row['fd_order_hp'].","; 
		$csv_dump .= $row['fd_order_name'].","; 
		$csv_dump .= $row['fd_order_mail'].","; 
		$csv_dump .= $row['fd_del_name'].","; 
		$csv_dump .= $row['fd_del_zip'].","; 

		$csv_dump .= $row['fd_del_address1'].","; 
		$csv_dump .= $row['fd_del_address2'].","; 
		$csv_dump .= $row['fd_del_address3'].","; 
		$csv_dump .= $row['fd_del_address4'].","; 
		$csv_dump .= $row['fd_del_hp'].","; 
		$csv_dump .= $row['fd_price'].","; 
		$csv_dump .= $row['fd_del_fee'].","; 
		$csv_dump .= $row['fd_payment'].","; 
		$csv_dump .= $row['fd_paynum'].","; 
		$csv_dump .= $row['fd_invoice_number'].","; 

		if($row['fd_status']==1) $csv_dump .= "신규주문,";
		elseif($row['fd_status']==2) $csv_dump .= "상품준비,";
		elseif($row['fd_status']==3) $csv_dump .= "배송중,";
		elseif($row['fd_status']==4) $csv_dump .= "배송완료,";
		elseif($row['fd_status']==5) $csv_dump .= "판매완료,";
		elseif($row['fd_status']==6) $csv_dump .= "주문취소,";
		elseif($row['fd_status']==7) $csv_dump .= "교환신청,";
		elseif($row['fd_status']==8) $csv_dump .= "반품신청,";
		$csv_dump .= $row['fd_status_msg'].","; 

		$csv_dump .= "\r\n"; 
	}



}elseif($type1=="user"){
	$filename = "user_list_".$date.".csv"; 
	$query = "select * from tb_user";
	$result = query_send($query);

	$csv_dump = "NO,아이디,이름,연락처,이메일,우편번호,주소1,주소2,주소3,주소4,메일수신여부,가입일,성별,생일";
	$csv_dump .= "\r\n"; 
	while ($row = mysqli_fetch_array($result)) {
		$csv_dump .= $row['pk_no'].","; 
		$csv_dump .= $row['fd_id'].","; 
		$csv_dump .= $row['fd_name'].","; 
		$csv_dump .= $row['fd_hp'].","; 
		$csv_dump .= $row['fd_mail'].","; 
		$csv_dump .= $row['fd_zip'].","; 
		$csv_dump .= $row['fd_address1'].","; 
		$csv_dump .= $row['fd_address2'].","; 
		$csv_dump .= $row['fd_address3'].","; 
		$csv_dump .= $row['fd_address4'].","; 
		$csv_dump .= $row['fd_reception'].","; 
		$csv_dump .= $row['fd_date'].","; 
		$csv_dump .= $row['fd_gender'].","; 
		$csv_dump .= $row['fd_birthday'].","; 
		$csv_dump .= "\r\n"; 
	}

}elseif($type1=="admin"){
	$filename = "admin_list_".$date.".csv"; 
	$query = "select * from tb_admin";
	$result = query_send($query);

	$csv_dump = "NO,아이디,이름,소속,직급,연락처,최종접속일";
	$csv_dump .= "\r\n"; 
	while ($row = mysqli_fetch_array($result)) {
		$csv_dump .= $row['pk_no'].","; 
		$csv_dump .= $row['fd_id'].","; 
		$csv_dump .= $row['fd_name'].","; 
		$csv_dump .= $row['fd_group'].","; 
		$csv_dump .= $row['fd_position'].","; 
		$csv_dump .= $row['fd_hp'].","; 
		$csv_dump .= $row['fd_connect'].","; 
		
		$csv_dump .= "\r\n"; 
	}

}elseif ($type1=="statistic") {
	if ($type2 == 1){ //년
		$year = $_GET['year'];
		$filename = "statistic_".$year."y_".$date.".csv"; 
		$query = "select * from tb_admin";
		$result = query_send($query);
		$result = while_get_month_list($year);
		$count = 0;
		$csv_dump = "년,월,주문수,판매금액";
		$csv_dump .="\r\n"; 
		$order_count = 0;
		$order_price = 0;
		while ($row = mysqli_fetch_array($result)) {
			$order_count =$order_count +(int)$row['count'];
			$order_price =$order_price +(int)$row['total'];
			if($count ==0 ){
				$csv_dump .= $year."년";
				$count++;
			}
			$csv_dump .= ",";
			$csv_dump .= $row['month'].'월,';		
			$csv_dump .= $row['count'].',';
			$csv_dump .= '"'.number_format($row['total']).'"';
			$csv_dump .= "\r\n"; 
		}
		$csv_dump .=",총계,".$order_count.',"'.number_format($order_price).'"';	

	}else{ //월
		$year = $_GET['year'];
		$month = $_GET['month'];
		$filename = "statistic_".$year."/".$month."_".$date.".csv"; 
		$result = while_get_day_list($year,$month);
		$count = 0;
		$csv_dump = "년,월,일,주문수,판매금액";
		$csv_dump .="\r\n"; 
		$order_count = 0;
		$order_price = 0;
		while ($row = mysqli_fetch_array($result)) {
			$order_count =$order_count +(int)$row['count'];
			$order_price =$order_price +(int)$row['total'];
			if($count ==0 ){
				$csv_dump .= $year."년,";
				$csv_dump .= $month."월,";
				$count++;
			}else{
				$csv_dump .= ",,";
				
			}
			$csv_dump .= $row['day'].'일,';		
			$csv_dump .= $row['count'].',';
			$csv_dump .= '"'.number_format($row['total']).'"';
			$csv_dump .= "\r\n"; 
		
		}
		$csv_dump .=",,총계,".$order_count.',"'.number_format($order_price).'"';	
	}
	
}









header("Content-Disposition: attachment; filename=$filename"); 

echo "\xEF\xBB\xBF"; 

echo $csv_dump; 


?> 