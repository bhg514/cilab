<?php
	@ob_start();
	header ( "content-type:text/html; charset=utf-8" );
	session_start();
	include_once('config/db_config.php'); 
	$mysqli = new mysqli($host, $user, $pw, $dbName);
	$http_host = $_SERVER['HTTP_HOST'];
	
	function formatSizeUnits($bytes){
        if ($bytes >= 1073741824)
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        elseif ($bytes >= 1048576)
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        elseif ($bytes >= 1024)
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        elseif ($bytes > 1)
            $bytes = $bytes . ' bytes';
        elseif ($bytes == 1)
            $bytes = $bytes . ' byte';
        else
            $bytes = '0 bytes';
        return $bytes;
    }

    function make_page($page,$total_count,$query_string,$count){
    	if($page%$count==1) 
			$start_num = $page;
		else
			$start_num = (ceil($page/$count)-1)*$count+1;

		$total_count = $total_count[0];
		if($total_count == 0 ) $total_count = 1;
		
		$page_size = $count+$start_num-1;
		$total_page = ceil($total_count/$count);

		if($page_size>$total_page){
			$for_end = $total_page;
		}else{
			$for_end = $page_size;
		};

		for($i=$start_num; $i<=$for_end;$i++){			
			if ($page ==$i){
				echo "<a class = 'page_num on'>".$i."</a>";
			}else{
				echo "<a href='?".$query_string."page=".$i."' class = 'page_nav_btn page_num'>".$i."</a>";
				
			}
		}
		return [$total_page,$for_end];

    }

	function query_send_non_return($query){
		global $mysqli;
		mysqli_query($mysqli, $query);
	}

	function query_send($query){
		global $mysqli;
		return mysqli_query($mysqli, $query);
	}

	function get_id($id){		
		$query = 'select fd_id from tb_user where fd_id = "'.$id.'"';
		$result = query_send($$query);
   		$id_count = mysqli_fetch_array($result);
		return $id_count[0];
	}

	function id_chk($id){		
		$query = 'select count(*) from (select fd_id from tb_admin where fd_id="'.$id.'" union select fd_id from tb_user where fd_id="'.$id.'") a';
		//$query = 'select count(*) from tb_user where fd_id="'.$id.'"';
		$result = query_send($query);
    	$id_count = mysqli_fetch_array($result);
    	return $id_count[0];
	}

	function get_user_info_to_id($id){		
		$query = 'select * from tb_user where fd_id = "'.$id.'"';
		$result = query_send($query);
   		$info = mysqli_fetch_array($result);
		return $info;
	}

	function get_all_info_to_id($id){
		$query = 'select * from (select fd_id, fd_pw, fd_type, fd_name from tb_admin where fd_id="'.$id.'" union select fd_id, fd_pw, fd_type ,fd_name from tb_user where fd_id="'.$id.'") a';
		$result = query_send($query);
		$info = mysqli_fetch_array($result);
		return $info;
	}

	function get_user_info_to_mail($mail){
		$query = 'select * from tb_user where fd_mail="'.$mail.'"';			
		$result = query_send($query);
		$info = mysqli_fetch_array($result);
		return $info;
	}

	function check_password($pw, $hash){
		if(crypt($pw , $hash) == $hash){
			return true;
		}else{
			return false;
		}
	}

	function alert($msg,$url){
		echo "<script>alert(\"".$msg."\");location.replace('".$url."');</script>";
	}	

	function while_get_production_list($start_num,$name,$category,$status){
		$start_num = ($start_num-1)*10;		
		$query = 'SELECT @ROWNUM := @ROWNUM + 1 AS row, p.* FROM tb_product p, (SELECT @ROWNUM := 0) R where p.fd_name like "%'.$name.'%"';
		if($category!=5) $query .= ' and p.fd_category = "'.$category.'"';
		if($status!=3) $query .= ' and p.fd_status ="'.$status.'"';
		$query .= ' order by row desc limit '.$start_num.', 10 ';		

		$result = query_send($query);		
		return $result;
	}

	function arr_sell_status($arr,$type){
		$arr2str = implode(",", $arr);		
		if($type=="start"){
			$query = 'update tb_product set fd_status = "판매중" where pk_no in('.$arr2str.')';
		}else{
			$query = 'update tb_product set fd_status = "판매중지" where pk_no in('.$arr2str.')';
			
		}			
		query_send_non_return($query);		

	}

	/*function product_get_count($name,$category,$status){
		$query = 'select count(*) from tb_product where fd_name like "%'.$name.'%" and fd_category like "%'.$category.'%" and fd_status like "%'.$status.'%"';
		
		$result = query_send($query);
		$count = mysqli_fetch_array($result);

		return $count;

	}*/

	function list_dell($arr,$table){
		$arr2str = implode(',', $arr);
		$query = 'delete from '.$table.' where pk_no in ('.$arr2str.')';
		query_send_non_return($query);
		if($table=='tb_order'){
			$query = 'delete from tb_order_detail where fk_order_no in ('.$arr2str.')';			
			query_send_non_return($query);
		}
	}

	function product_info($no){
		$query = 'select * from tb_product where pk_no='.$no;
		$result = query_send($query);
		$info = mysqli_fetch_array($result);

		return $info;
	}

	function while_get_order_list($start_num,$order_number,$order_name,$order_no,$status){
		$start_num = ($start_num-1)*10;		
		if($order_no == null){
			$query = 'SELECT @ROWNUM := @ROWNUM + 1 AS row, o.* FROM tb_order o, (SELECT @ROWNUM := 0) R where o.fk_order_number like "%'.$order_number.'%" and o.fd_order_name like "%'.$order_name.'%" and fd_status like "%'.$status.'%" order by row desc limit '.$start_num.', 10 ';					
		}else{
			$query = 'SELECT @ROWNUM := @ROWNUM + 1 AS row, o.* FROM tb_order o, (SELECT @ROWNUM := 0) R where o.pk_no in ('.$order_no.') order by row desc limit '.$start_num.', 10';					
		}		
		$result = query_send($query);		
		return $result;
	}

	function while_get_order_list_date($start_num,$order_number,$order_name,$order_no,$status,$date){
		$start_num = ($start_num-1)*10;		
		if($order_no == null){
			$query = 'SELECT @ROWNUM := @ROWNUM + 1 AS row, o.* FROM tb_order o, (SELECT @ROWNUM := 0) R where o.fk_order_number like "%'.$order_number.'%" and o.fd_order_name like "%'.$order_name.'%" and fd_status like "%'.$status.'%" and fd_date="'.$date.'" order by row desc limit '.$start_num.', 10 ';					
		}else{
			$query = 'SELECT @ROWNUM := @ROWNUM + 1 AS row, o.* FROM tb_order o, (SELECT @ROWNUM := 0) R where o.pk_no in ('.$order_no.') order by row desc limit '.$start_num.', 10';					
		}		
		$result = query_send($query);		
		return $result;
	}

	function order_get_count($order_number,$order_name,$order_no,$status){
		if($order_no == null){
			$query = 'select count(*) from tb_order where fk_order_number like "%'.$order_number.'%" and fd_order_name like "%'.$order_name.'%" and fd_status like "%'.$status.'%"';
		}else{
			$query = 'select count(*) from tb_order where pk_no in ("'.$order_no.'") and fd_status ="'.$status.'"';
		}		
		$result = query_send($query);
		$count = mysqli_fetch_array($result);
		return $count;

	}


	function order_get_order_no($name){
		$query = 'select DISTINCT(fk_order_no) from tb_order_detail where fd_product_name like "%'.$name.'%"';
		$result = query_send($query);
		$order_no = mysqli_fetch_array($result);

		if($order_no!=null){
			$order_no_str = implode(',', $order_no);			
		}else{
			$order_no_str = "''";
		}
		return $order_no_str;
	}

	function order_status($arr){		
		$arr2str = implode(",", $arr);		
		$query = 'update tb_order set fd_status = "2" where pk_no in('.$arr2str.')';
		query_send_non_return($query);				

	}

	function detail_order_status($no){				
		$query = 'update tb_order set fd_status = "2" where pk_no ='.$no;		
		query_send_non_return($query);				
	}

	function order_detail($no){
		$query = 'select * from tb_order where pk_no = '.$no;
		$result = query_send($query);
		$info = mysqli_fetch_array($result);
		return $info;

	}

	function while_get_order_product($no){
		$query = 'select * from tb_order_detail where fk_order_no = '.$no;		
		$result = query_send($query);		
		return $result;
	}

	function invoice_update($invoice_arr, $no_arr){
		for ($i=0; $i<count($invoice_arr); $i++){
			if($invoice_arr[$i]!=""){
				$query = 'update tb_order set fd_invoice_number="'.$invoice_arr[$i].'", fd_status="3" where pk_no = '.$no_arr[$i];					
				query_send_non_return($query);		
			}
		}
		
	}

	function while_get_order_invoice(){
		$query = 'select pk_no, fd_invoice_number from tb_order where fd_status=3';
		$result = query_send($query);		
		return $result;
	}

	function del_chk($no, $status){
		$query = 'update tb_order set fd_status='.$status.' where pk_no = '.$no;
		query_send_non_return($query);	
	}


	function del_finish_chk(){
		$query = 'SELECT pk_no FROM tb_order WHERE date(fd_date) <= date(subdate(now(), INTERVAL 14 DAY)) and fd_status=4';
		$results = query_send($query);			
		while ($info = mysqli_fetch_array($results)) {
			del_chk($info['pk_no'],5);
		}
		

	}

	function refuse_msg($no, $input_msg){
		$query='UPDATE tb_order SET fd_status = "9" , fd_status_msg="'.$input_msg.'" where pk_no ='.$no;		
		query_send_non_return($query);

	}

	function while_get_complete_list($start_num,$start_date,$end_date){
		$start_num = ($start_num-1)*10;	
		$query = 'SELECT @ROWNUM := @ROWNUM + 1 AS row, o.* from (select fd_date, count(*) count,sum(fd_price) price, sum(fd_del_fee) del_fee, sum(fd_price+fd_del_fee) total from tb_order  where fd_date between "'.$start_date.'" and "'.$end_date.'" and fd_status="5" group by fd_date order by fd_date desc) o, (SELECT @ROWNUM := 0) R order by row desc limit '.$start_num.', 10 ';
		$result = query_send($query);		
		return $result;
	}
	function complete_count($start_date,$end_date){
		$query =  'select count(*) from (select fd_date from tb_order where fd_date between "'.$start_date.'" and "'.$end_date.'" group by fd_date order by fd_date desc) a';		
		$result = query_send($query);
		$info = mysqli_fetch_array($result);
		return $info;

	}
	function complete_sum_info($start_date,$end_date){
		$query = 'select count(*) total, sum(fd_price) price, sum(fd_del_fee) del from tb_order where fd_date between "'.$start_date.'" and "'.$end_date.'"';
		$result = query_send($query);
		$info = mysqli_fetch_array($result);
		return $info;

	}

	function while_get_board_list($start_num,$search,$type){
		$table = table_name($type);
		$start_num = ($start_num-1)*10;	
		$query = 'select @ROWNUM := @ROWNUM + 1 AS row, n.* from '.$table.' n, (SELECT @ROWNUM := 0) R where fd_title like "%'.$search.'%" order by row desc limit '.$start_num.', 10';	
		$result = query_send($query);		
		return $result;
	}

	function board_get_info($no,$type){
		$table = table_name($type);
		$query = "select * from ".$table." where pk_no=".$no;
		$result = query_send($query);
		$info = mysqli_fetch_array($result);
		return $info;
	}

	function board_count($type, $search){
		$table = table_name($type);

		$query = "select count(*) from ".$table." where fd_title like '%".$search."%' ";

		$result = query_send($query);
		$count = mysqli_fetch_array($result);
		return $count;
	}

	function table_name($type){
		if($type==1) $table="tb_notice";
		elseif ($type==2) $table ="tb_sw";
		elseif ($type==3) $table ="tb_contents";
		elseif ($type==4) $table ="tb_qna";
		return $table;
	}

	function while_get_user_list($start_num,$search,$table){
		$start_num = ($start_num-1)*10;	
		$query = 'select @ROWNUM := @ROWNUM + 1 AS row, n.* from '.$table.' n, (SELECT @ROWNUM := 0) R where fd_name like "%'.$search.'%" order by row desc limit '.$start_num.', 10';		
		$result = query_send($query);		
		return $result;
	}

	function user_count($search){
		$table = 'tb_user';

		$query = "select count(*) from ".$table." where fd_name like '%".$search."%' ";

		$result = query_send($query);
		$count = mysqli_fetch_array($result);
		return $count;
	}

	function user_get_info($no,$table){

		$query = "select * from ".$table." where pk_no=".$no;
		$result = query_send($query);
		$info = mysqli_fetch_array($result);
		return $info;
	}


	function info_dell($no, $table){
		$query = 'delete from '.$table.' where pk_no='.$no;		
		query_send_non_return($query);
	}

	function while_get_month_list($year){

		$query = 'select month, ifnull(a.count,0) count, ifnull(a.total,0) total from (select 1 month union all select 2 union all select 3 union all select 4 union all select 5  union all select 6 union all select 7 union all select 8 union all select 9 union all select 10 union all select 11 union all select 12 ) b left join (select DATE_FORMAT(fd_date, "%c") tem_month, count(*) count, sum(fd_price+fd_del_fee) total from tb_order  where YEAR(fd_date)='.$year.'  and fd_status=5 GROUP BY YEAR(fd_date), MONTH(fd_date)) a on month=tem_month order by month';
		$result = query_send($query);		
		return $result;
	}

	function while_get_day_list($year,$month){

		$query = 'select day, ifnull(a.count,0) count, ifnull(a.total,0) total from (select 1 day';
		for ($i=2;$i<32;$i++){
			$query .=' union all select '.$i;
		}
		$query .= ' ) b left join (select DATE_FORMAT(fd_date, "%d") tem_day, count(*) count, sum(fd_price+fd_del_fee) total from tb_order where YEAR(fd_date)="'.$year.'" and MONTH(fd_date)="'.$month.'" and fd_status=5 group by day(fd_date) ) a on day=tem_day order by day';


		$result = query_send($query);		
		return $result;
	}

	function month_total($year,$month){

		$query = 'select count(*) count, sum(fd_price+fd_del_fee) total from tb_order where YEAR(fd_date)='.$year.' and month(fd_date)='.$month.' and fd_status=5';
		$result = query_send($query);
		$info = mysqli_fetch_array($result);
		return $info;

	}

	function year_total($year){
		$query = 'select count(*) count, sum(fd_price+fd_del_fee) total from tb_order where YEAR(fd_date)='.$year.' and fd_status=5';
		$result = query_send($query);
		$info = mysqli_fetch_array($result);
		return $info;
	}

	function get_board_info($no, $type){
		$table = table_name($type);
		$query = 'select * from '.$table.' where pk_no='.$no;
		$result =query_send($query);
		$info = mysqli_fetch_array($result);

		return $info;

	}

	function get_qna_pw($no){
		$query = "select fd_pw from tb_qna where pk_no=".$no;
		$result = query_send($query);
		$info = mysqli_fetch_array($result);
		return $info;
	}

	function while_product_list($start_num,$type,$name){
		$start_num = ($start_num-1)*10;
		$query = 'select pk_no,fd_name, fd_price, fd_new_main_img from tb_product where fd_name like "%'.$name.'%"';
		if ($type!=5){
			$query .= ' and fd_category='.$type;
		}		
		$query .=' order by pk_no desc limit '.$start_num.', 9';
		$result = query_send($query);
		
		return $result;

	}

	function product_get_count($name,$category,$status){
		$query = 'select count(*) from tb_product where fd_name like "%'.$name.'%"';
		if ($category!=5){
			$query .= ' and fd_category='.$category;
		}	
		if ($status!=3){
			$query .= ' and fd_status='.$status;
		}		
		$result = query_send($query);
		$count = mysqli_fetch_array($result);

		return $count;

	} 

	function cur_notice(){
		$query = "select pk_no, fd_title, fd_date from tb_notice order by pk_no desc limit 1";
		$result = query_send($query);
		$info = mysqli_fetch_array($result);

		return $info;
	}

?>