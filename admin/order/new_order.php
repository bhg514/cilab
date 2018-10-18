<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../admin_header.php';
	include './side.php';
	include_once("../../common.php");
	$page = $_GET['page'];	
	$order_number = $_GET['order_number'];
	$product_name = $_GET['product_name'];
	$order_name = $_GET['order_name'];
	$start_num = 1;

	if($page==null) $page = 1;
	if($order_number==null) $order_number = "";
	if($product_name==null) $product_name = "";
	if($order_name==null) $order_name = "";	

	if($product_name!=null){
		$order_no = order_get_order_no($product_name);
	}
	$total_count = order_get_count($order_number,$order_name,$order_no,"1");	
	

?>
<script type="text/javascript" src="../js/admin.js"></script>
<section class="container">			
	<div>
		<div class="admin_title">상품관리</div>
		<div class="admin_position">Home  » 주문/배송관리 » 신규 주문</div>	
		<hr class="garo" style="display: block;"> 
	</div>
	<div class="search_div">
		<select id="search_select">
			<option value="order_number">주문번호</option>
			<option value="product_name">주문상품</option>
			<option value="order_name">주문자</option>			
		</select>
		<input type="text" id="search_input">
		<a class="btn type05" id="search_btn">검색</a>

	</div>
	
	<div class="btn_div">
		<a class="btn type05">전체 상품 엑셀 다운로드</a>
		<a class="btn type05">엑셀 다운로드</a>
		<a class="btn type05" id="order_chk">주문확인</a>		
		<a class="btn type05" id="list_del">삭제</a>
	</div>
	<table>
		<caption class="readHide">상품 관리</caption>
		<thead class="admin_list">
			<tr>
				<th class="thead_th"> 
					<input type="checkbox" id="chk_all">
				</th>
				<th scope="col" class="thead_th">no</th>
				<th scope="col" class="thead_th">주문일</th>
				<th scope="col" class="thead_th">주문번호</th>
				<th scope="col" class="thead_th">주문상품</th>
				<th scope="col" class="thead_th">주문자</th>
				<th scope="col" class="thead_th">결제금액</th>
				<th scope="col" class="thead_th">결제</th>
			</tr>
		</thead>
		<tbody>
				<?php
					$result = while_get_order_list($start_num,$order_number,$order_name,$order_no,"1");
					while ($r = mysqli_fetch_array($result)) {
				?>
			<tr>
				<td class="tbody_td"> 
					<input type="checkbox" class="list_chk">
					<input type="hidden" name="pk_no" value="<?= $r['pk_no']?>">
				</td>
				<td class="tbody_td"><?= $r['pk_no']?></td>
				<td class="tbody_td"><?= $r['fd_date']?></td>
				<td class="tbody_td"><a href="detail.php?no=<?=$r['fk_order_number']?>"><?= $r['fk_order_number']?></a></td>
				<td class="tbody_td"><?=$r['fd_product_count']?></td>
				<td class="tbody_td"><?=$r['fd_order_name']?></td>
				<td class="tbody_td"><?=$r['fd_price']?></td>
				<td class="tbody_td"><?=$r['fd_payment']?></td>
			</tr>
			

				<?php
					}
				?>
		</tbody>
	</table>
	<div class="page_nav">
		<a href="?page=1">
			<img src="/images/icon/btn_first.png" alt="pre" id="first_img" class="page_nav_btn">
		</a>
		<a href="?page=<?php if($page>1){ echo $page-1;}else{ echo '1';} ?>">
			<img src="/images/icon/btn_prev.png" alt="pre" id="prev_img" class="page_nav_btn" >
		</a>
		<?php
			
			$end_num = 10;
			$total_page = ceil($total_count[0]/10);
			
			if($end_num>$total_page){
				$for_end = $total_page;
			}else{
				$for_end = $end_num;
			};
			for($i=$start_num; $i<=$for_end;$i++){			
				if ($page ==$i){
					echo "<span class = 'page_num page_select'>".$i."</span>";
				}else{
					echo "<a href='?page=".$i."' class = 'page_nav_btn page_num'>".$i."</a>";
					
				}
			}

			

		?>
		<a href="?page=<?php if($page<$for_end){ echo $page+1;}else{ echo $for_end;} ?>">
			<img src="/images/icon/btn_next.png" alt="pre" id="next_img" class="page_nav_btn">
		</a>
		<a href="?page=<?=$for_end?>">
			<img src="/images/icon/btn_last.png" alt="pre" id="last_img" class="page_nav_btn">
		</a>
	</div>
</section>

