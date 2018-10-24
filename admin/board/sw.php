<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../admin_header.php';
	include './side.php';
	include_once("../../common.php");
	$page = $_GET['page'];		
	if($page==null) $page = 1;
	$start_num = 1;
	$start_date = $_GET['start_date'];
	$end_date = $_GET['end_date'];

	if($end_date == null){
		$end_date = date("Y-m-d"); 
	}
	if($start_date == null){
		$timestamp = strtotime("-1 years");
		$start_date = date("Y-m-d", $timestamp);
	}
	$info = complete_sum_info($start_date,$end_date);

?>
<script type="text/javascript" src="../js/admin.js"></script>
<section class="container">			
	<div>
		<div class="admin_title">공지사항</div>		
		<div class="admin_position">Home  » 게시판/콘텐츠관리 » 공지사항</div>			
		<hr class="garo" style="display: block;"> 
	</div>
	<div class="search_div">
		<select id="search_select">
			<option value="order_number">일별</option>
			<option value="product_name">월별</option>			
		</select>
		<input type="text" id="search_input">		
		<a class="btn type05" id="order_search_btn">검색</a>

	</div>	
	<div class="btn_div">
		<a class="btn type05">등록</a>		
	</div>
	<table>
		<caption class="readHide">상품 관리</caption>
		<thead class="admin_list">
			<tr>
				<th scope="col" class="thead_th">no</th>
				<th scope="col" class="thead_th">제목</th>
				<th scope="col" class="thead_th">작성자</th>
				<th scope="col" class="thead_th">작성일</th>
				<th scope="col" class="thead_th">조회수</th>
				<th scope="col" class="thead_th">첨부파일</th>				
			</tr>
		</thead>
		<tbody>
				<?php					
					$result = while_get_notice_list($start_num);					
					while ($r = mysqli_fetch_array($result)) {
				?>
			<tr>				
				<td class="tbody_td"><?= $r['row']?></td>
				<td class="tbody_td"><a href="list.php?type=5&date=<?=$r['fd_date']?>"><?= $r['fd_title']?></a></td>
				<td class="tbody_td"><?= $r['fd_name']?></td>
				<td class="tbody_td"><?=$r['fd_date']?></td>
				<td class="tbody_td"><?=$r['fd_count']?></td>
				<td class="tbody_td"><?=$r['fd_attach']?></td>				
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
			$total_count = complete_count($start_date,$end_date);
			$total_count = $total_count[0];
			
			
			$end_num = 10;
			$total_page = ceil($total_count/10);
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
	
	<div class="wrap-loading display-none">
	    <div><img src="/images/icon/loading.gif" /></div>
	</div>  




</section>

