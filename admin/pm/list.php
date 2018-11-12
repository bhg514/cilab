<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../admin_header.php';
	include './side.php';
	include_once("../../common.php");
	$page = $_GET['page'] ?? 1;	
	$name = $_GET['name'] ?? '';
	$category = $_GET['category'] ?? 5;
	$status = $_GET['status'] ?? 3;

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
			<option value="name">상품명</option>
			<option value="category">분류</option>
			<option value="status">상태</option>			
		</select>
		<input type="text" id="search_input">
		<a class="btn type05" id="search_btn">검색</a>

	</div>
	
	<div class="btn_div">
		<a class="btn type05" id="all_down">전체 상품 엑셀 다운로드</a>
		<a class="btn type05">엑셀 다운로드</a>
		<a class="btn type05" id="sell_start">판매시작</a>
		<a class="btn type05" id="sell_stop">판매중지</a>
		<a class="btn type05" id="list_del">삭제</a>
	</div>
	<table>
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
			$start_num = 1;
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
					echo "<a href='?".$query_string."page=".$i."' class = 'page_nav_btn page_num'>".$i."</a>";
					
				}
			}

			

		?>
		<a href="?<?=$query_string?>page=<?php if($page<$for_end){ echo $page+1;}else{ echo $for_end;} ?>">
			<img src="/images/icon/btn_next.png" alt="pre" id="next_img" class="page_nav_btn">
		</a>
		<a href="?<?=$query_string?>page=<?=$for_end?>">
			<img src="/images/icon/btn_last.png" alt="pre" id="last_img" class="page_nav_btn">
		</a>
	</div>
</section>

