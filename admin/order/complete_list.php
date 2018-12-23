<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../admin_header.php';
	include './side.php';
	include_once("../../common.php");
	$page = $_GET['page'] ?? 1;		
	$start_num = 1;
	$start_date = $_GET['start_date'] ?? date("Y-m-d", strtotime("-1 years")) ;
	$end_date = $_GET['end_date'] ?? date("Y-m-d");

	if (count(explode('-', $end_date))==2 ) {
		$end_date .="-".date('t', strtotime($end_date)); //월의 마지막 날짜 
		$start_date .="-01"; //월의 첫날 
	}
	$info = complete_sum_info($start_date,$end_date);	
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

<!-- 달력 -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="../../js/click_cal.js"></script>
<script type="text/javascript" src="../js/detepicker.js"></script>
<!-- 달력 -->



<script type="text/javascript" src="../js/admin.js"></script>
<section class="container">			
	<div>
		<div class="admin_title">판매완료</div>		
		<div class="admin_position">Home  » 주문/배송관리 » 판매완료</div>			
		<hr class="garo" style="display: block;"> 
	</div>
	<div class="search_div">
		<select id="search_select">
			<option value="1">일별</option>
			<option value="2">월별</option>			
		</select>
		<div class="month_cal" >
	    	<input type="text" id="sdate1" readonly />
	    	<span> ~ </span>
	    	<input type="text" id="sdate2" readonly />
	    	<a class="btn type05" id="month_search_btn">검색</a>
	    </div>
	    <div class="day_cal">
	    	<input type="text" id="datepicker1" readonly>
	    	<span> ~ </span>
	    	<input type="text" id="datepicker2" readonly>			
			<a class="btn type05" id="day_search_btn">검색</a>
		</div>
	</div>
	<div class="btn_div">
		<a class="btn type05">전체 상품 엑셀 다운로드</a>
		<a class="btn type05" id="list_del">삭제</a>
	</div>
	<div class="summary_div">
		<span>주문수 총 <?=$info['total']?>건</span>/<span>판매금액 총 <?php if($info['price']==null) echo 0; else echo number_format($info['price']);?>원</span>/<span>배송비 총 <?php if($info['del']==null) echo 0; else echo number_format($info['del']);?>원</span>
	</div>
	<table class="list-table">
		<caption class="readHide">판매완료</caption>
		<thead class="admin_list">
			<tr>
				<th scope="col" class="thead_th">no</th>
				<th scope="col" class="thead_th">판매일</th>
				<th scope="col" class="thead_th">주문수</th>
				<th scope="col" class="thead_th">판매금액</th>
				<th scope="col" class="thead_th">배송비</th>
				<th scope="col" class="thead_th">합계</th>				
			</tr>
		</thead>
		<tbody>
				<?php					
					$result = while_get_complete_list($start_num,$start_date,$end_date);					
					while ($r = mysqli_fetch_array($result)) {
				?>
			<tr>				
				<td class="tbody_td"><?= $r['row']?></td>
				<td class="tbody_td"><?= $r['fd_date']?></td>
				<td class="tbody_td"><a href="list.php?type=5&date=<?=$r['fd_date']?>"><?= number_format($r['count'])?>건</a></td>
				<td class="tbody_td"><?=number_format($r['price'])?></td>
				<td class="tbody_td"><?=number_format($r['del_fee'])?></td>
				<td class="tbody_td"><?=number_format($r['total'])?></td>				
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
	var start_date = url.searchParams.get("start_date");
	var end_date = url.searchParams.get("end_date");
	if(start_date!=null){
		if(start_date.split("-").length==2){
			$("#search_select").val("2").attr("selected","true");
		}else{
			$("#search_select").val("1").attr("selected","true");
		}
	}
	$("#datepicker1").val(start_date)
	$("#datepicker2").val(end_date)

</script>';
?>

</body>
</html>

