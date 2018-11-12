<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../admin_header.php';
	include './side.php';
	include_once("../../common.php");
	$page = $_GET['page'] ?? 1;	
	$order_number = $_GET['order_number'] ?? '';
	$product_name = $_GET['product_name'] ?? '';
	$order_name = $_GET['order_name'] ?? '';
	$type = $_GET['type'] ?? 1;
	$start_num = 1;
	$date = $_GET['date'] ?? '';

	
	$total_count = order_get_count($order_number,$order_name,$product_name,$type);	

	if($type==1){
		$type_text = '신규 주문';
		$list_text = '결제';
	}else if($type==2){
		$type_text = '상품 준비';	
		$list_text = '송장입력';
	}
	else if($type==3){
		$type_text = '배송중';	
		$list_text = '송장번호';
	} 
	else if($type==4){
		$type_text = '배송완료';	
		$list_text = '송장번호';
	} 
	else if($type==5){
		$type_text = '판매완료';	
		$list_text = '송장번호';
	} 
	else if($type==6){
		$type_text = '주문취소';	
		$list_text = '취소사유';
		$list_text2 = '취소승인';
		$list_text3 = '반려';
	} 
	else if($type==7){
		$type_text = '교환신청';	
		$list_text = '교환사유';
		$list_text2 = '교환승인';
		$list_text3 = '반려';
	} 
	else if($type==8){
		$type_text = '반품신청';	
		$list_text = '반품사유';
		$list_text2 = '반품승인';
		$list_text3 = '반려';
	} 


	$query_string = $_SERVER['QUERY_STRING']; 
	$query_arr = explode('&', $query_string);
	
	$query_string ="";

	foreach ($query_arr as $query) {
		$query_sp = explode('=', $query);
		
		if($query_sp[0]!='page'){
			$query_string .= $query."&";
		}
	}


?>
<script type="text/javascript" src="../js/admin.js"></script>
<section class="container">			
	<div>
		<div class="admin_title"><?=$type_text?></div>		
		<div class="admin_position">Home  » 주문/배송관리 » <?=$type_text?></div>			
		<hr class="garo" style="display: block;"> 
	</div>
	<div class="search_div">
		<select id="search_select">
			<option value="order_number">주문번호</option>
			<option value="product_name">주문상품</option>
			<option value="order_name">주문자</option>			
		</select>
		<input type="text" id="search_input">
		<a class="btn type05" id="order_search_btn">검색</a>

	</div>
	
	<div class="btn_div">
		<a class="btn type05">전체 상품 엑셀 다운로드</a>
		<a class="btn type05">엑셀 다운로드</a>
		<?php 
			if($type==1) echo '<a class="btn type05" id="order_chk">주문확인</a>';
			elseif($type==2) echo '<a class="btn type05" id="input_invoice">송장입력 확인</a>';
			elseif ($type==3) echo '<a class="btn type05" id="del_chk">배송체크</a>';
			elseif ($type==4) echo '<a class="btn type05" id="del_finish_chk">배송체크</a>';
		?>
		<a class="btn type05" id="list_del">삭제</a>
	</div>
	<table class="list-table">
		<caption class="readHide">주문 관리</caption>
		<thead class="admin_list">
			<tr>
				<th class="thead_th"> 
					<input type="checkbox" id="chk_all">
				</th>
				<th scope="col" class="thead_th">No.</th>
				<th scope="col" class="thead_th">주문일</th>
				<th scope="col" class="thead_th">주문번호</th>
				<th scope="col" class="thead_th">주문상품</th>
				<th scope="col" class="thead_th">주문자</th>
				<th scope="col" class="thead_th">결제금액</th>
				<th scope="col" class="thead_th"><?=$list_text?></th>
				<?php 
					if($type==6 || $type==7 || $type==8){
						echo '<th scope="col" class="thead_th">'.$list_text2.'</th>';	
						echo '<th scope="col" class="thead_th">'.$list_text3.'</th>';	
					} 				
				?>
			</tr>
		</thead>
		<tbody>
				<?php	
					if ($type == 5){
						$result = while_get_order_list_date($page,$order_number,$order_name,$product_name,$type,$date);
					}else{
						$result = while_get_order_list($page,$order_number,$order_name,$product_name,$type);
					}			
					while ($r = mysqli_fetch_array($result)) {
				?>
			<tr>
				<td class="tbody_td"> 
					<input type="checkbox" class="list_chk">
					<input type="hidden" name="pk_no" value="<?= $r['pk_no']?>">
				</td>
				<td class="tbody_td"><?= $r['row']?></td>
				<td class="tbody_td"><?= $r['fd_date']?></td>
				<td class="tbody_td"><a href="detail.php?type=<?=$type?>&no=<?=$r['pk_no']?>"><?= $r['fk_order_number']?></a></td>
				<td class="tbody_td"><?=$r['fd_name']?></td>
				<td class="tbody_td"><?=$r['fd_order_name']?></td>
				<td class="tbody_td"><?=$r['fd_price']?></td>
				<?php
				if($type ==1){
					echo '<td class="tbody_td">'.$r["fd_payment"].'</td>';
				}else if($type ==2){
					echo '<td class="tbody_td"><input type="text" class="input_invoice"></td>';
				}else if($type ==3 || $type ==4 || $type == 5){
					echo '<td class="tbody_td">'.$r['fd_invoice_number'].'</td>';
				}else if($type>=6){
					echo '<td><a class="btn type05" id="show_msg">보기</a><input type="hidden" id="status_msg" value="'.$r['fd_status_msg'].'"></td>';
					echo '<td><a class="btn type05" id="conf_cancel">승인</a></td>';
					echo '<td><a class="btn type05" id="refuse_cancel">반려</a></td>';

				}
				?>
			</tr>
			

				<?php
				}
				?>
		</tbody>
	</table>
	<div class="page_nav">
		<a href="?<?=$query_string?>page=1">
			<img src="/images/icon/btn_first.png" alt="pre" id="first_img" class="page_nav_btn">
		</a>
		<a href="?<?=$query_string?>page=<?php if($page>1){ echo $page-1;}else{ echo '1';} ?>">
			<img src="/images/icon/btn_prev.png" alt="pre" id="prev_img" class="page_nav_btn" >
		</a>
		<?php
			
			$page_info = make_page($page,$total_count,$query_string,10);

			

		?>
		<a href="?<?=$query_string?>page=<?php if($page<$page_info[0]){ echo $page+1;}else{ echo $page_info[1];} ?>">
			<img src="/images/icon/btn_next.png" alt="pre" id="next_img" class="page_nav_btn">
		</a>
		<a href="?<?=$query_string?>page=<?=$page_info[0]?>">
			<img src="/images/icon/btn_last.png" alt="pre" id="last_img" class="page_nav_btn">
		</a>
	</div>	
	
	<div class="wrap-loading display-none">
	    <div><img src="/images/icon/loading.gif" /></div>
	</div>  

</section>

<?php
echo '<script>
var url_string = window.location.href
var url = new URL(url_string);
var order_number = url.searchParams.get("order_number");
var product_name = url.searchParams.get("product_name");
var order_name = url.searchParams.get("order_name");



	if(order_number!=null){
		$("#search_input").val(order_number)
		$("#search_select").val("order_number").attr("selected","true");
	}else if(product_name!=null){
		$("#search_input").val(product_name)
		$("#search_select").val("product_name").attr("selected","true");
	}else if(order_name!=null){
		$("#search_input").val(order_name)
		$("#search_select").val("order_name").attr("selected","true");
	}

</script>';
?>

</body>
</html>

