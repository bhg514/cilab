<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../admin_header.php';
	include './side.php';
	include_once("../../common.php");
	$page = $_GET['page'] ?? 1;	
	$name = $_GET['p_name'] ?? '';
	$category = $_GET['category'] ?? 5;
	$status = $_GET['p_status'] ?? 3;

	$total_count = product_get_count($name,$category,$status);
	

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
		<div class="admin_title">상품관리</div>
		<div class="admin_position">Home  » 상품 관리 » 상품 관리</div>	
		<hr class="garo" style="display: block;"> 
	</div>
	<div class="search_div">
		<select id="search_select">
			<option value="p_name">상품명</option>
			<option value="category">분류</option>
			<option value="p_status">상태</option>			
		</select>
		<input type="text" id="search_input">
		<select id="cate_sel">
			<option value="1">Water Drones</option>
			<option value="2">Upgrade & Accessories</option>
			<option value="3">DIY & Parts</option>
			<option value="4">Water Education Kit</option>
		</select>
		<a class="btn type05" id="search_btn">검색</a>

	</div>
	
	<div class="btn_div">
		<a class="btn type05" id="all_down">전체 상품 엑셀 다운로드</a>
		<a class="btn type05">엑셀 다운로드</a>
		<a class="btn type05" id="sell_start">판매시작</a>
		<a class="btn type05" id="sell_stop">판매중지</a>
		<a class="btn type05" id="list_del">삭제</a>
	</div>
	<table class="list-table">
		<caption class="readHide">상품 관리</caption>
		<thead class="admin_list">
			<tr>
				<th class="thead_th"> 
					<input type="checkbox" id="chk_all">
				</th>
				<th scope="col" class="thead_th">No.</th>
				<th scope="col" class="thead_th">분류</th>
				<th scope="col" class="thead_th">상품명</th>
				<th scope="col" class="thead_th">수량</th>
				<th scope="col" class="thead_th">가격</th>
				<th scope="col" class="thead_th">최종수정일</th>
				<th scope="col" class="thead_th">상태</th>
			</tr>
		</thead>
		<tbody>
				<?php
					$result = while_get_production_list($page,$name,$category,$status);
					while ($r = mysqli_fetch_array($result)) {
				?>
			<tr>
				<td class="tbody_td"> 
					<input type="checkbox" class="list_chk">
					<input type="hidden" name="pk_no" value="<?= $r['pk_no']?>">
				</td>
				<td class="tbody_td"><?= $r['row']?></td>
				<td class="tbody_td">
					<?php 
						if($r['fd_category']==1) echo "Water Drones";
						elseif($r['fd_category']==2) echo "Upgrade & Accessories";
						elseif($r['fd_category']==3) echo "DIY & Parts";
						elseif($r['fd_category']==4) echo "Water Education Kit";
					?>
					
				</td>
				<td class="tbody_td"><a href="detail.php?no=<?=$r['pk_no']?>"><?= $r['fd_name']?></a></td>
				<td class="tbody_td"><?=$r['fd_stock']?></td>
				<td class="tbody_td"><?=$r['fd_price']?></td>
				<td class="tbody_td"><?=$r['fd_date']?></td>
				<td class="tbody_td">
					<?php 
						if($r['fd_status']==1) echo "판매 중";
						elseif($r['fd_status']==2) echo "판매 중지";						
					?>
					
						
				</td>
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
</section>
<?php
echo '<script>
	var url_string = window.location.href
	var url = new URL(url_string);
	var p_name = url.searchParams.get("p_name");
	var category = url.searchParams.get("category");
	var p_status = url.searchParams.get("p_status");

	if(p_name!=null){
		$("#search_input").val(p_name)
		$("#search_select").val("p_name").attr("selected","true");
	}else if(category!=null){
		$("#search_select").val("category").attr("selected","true");
		$("#search_input").hide()
		$("#cate_sel").show()
	}else if(p_status!=null){
		$("#search_input").val(p_status)
		$("#search_select").val("p_status").attr("selected","true");
	}

	$("#search_select").change(function(){
		if($("#search_select option:selected").val()=="category"){
			$("#search_input").hide()
			$("#cate_sel").show()
		}else{
			$("#search_input").show()
			$("#cate_sel").hide()
		}
	})

</script>';
?>


</body>
</html>

