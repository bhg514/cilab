<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../admin_header.php';
	include './side.php';
	include_once("../../common.php");
	$year = $_GET['year'];
	$month = $_GET['month'];
	if($year==null)
		$year = date("Y");		
	if($month==null)
		$month = date("m");

	$month_total = month_total($year,$month);

?>
<script type="text/javascript" src="../js/admin.js"></script>
<section class="container">			
	<div>
		<div class="admin_title">월별통계</div>		
		<div class="admin_position">Home  » 통계관리 » 월별통계</div>			
		<hr class="garo" style="display: block;"> 
	</div>
	<div class="search_div">
		<select id="period_select">
			<?php
				for($i=2018; $i<$year+10;$i++){
					for($k=1; $k<12; $k++){
						if ($year==$i && $month == $k)
							echo '<option value="'.$i.'/'.$k.'" selected>'.$i.'년 '.$k.'월</option>';
						else 
							echo '<option value="'.$i.'/'.$k.'">'.$i.'년 '.$k.'월</option>';						
					}
				} 
			?>
		</select>
	</div>	
	<div class="btn_div">
		<a class="btn type05" href="../data_download.php?type1=statistic&type2=2&year=<?=$year?>&month=<?=$month?>">엑셀다운로드</a>	
	</div>
	<table class="list-table">
		<caption class="readHide">월별통계</caption>
		<thead class="admin_list">
			<tr>
				<th scope="col" class="thead_th">년</th>
				<th scope="col" class="thead_th">월</th>
				<th scope="col" class="thead_th">일</th>
				<th scope="col" class="thead_th">주문수</th>
				<th scope="col" class="thead_th">판매금액</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$result = while_get_day_list($year,$month);
				$count = 0;
				while ($r = mysqli_fetch_array($result)) {
					echo '<tr>';
					if($count ==0 ){
						echo '<td rowspan=31 class="tbody_td">'.$year.'</td>';
						echo '<td rowspan=31 class="tbody_td">'.$month.'</td>';
						$count++;
					}
					echo '<td class="tbody_td">'.$r['day'].'일</td>';		
					echo '<td class="tbody_td">'.$r['count'].'</td>';
					echo '<td class="tbody_td">'.number_format($r['total']).'</td>';						

					echo '</tr>';
					
				}
			?>
			<tr>
				<td colspan="3">총계</td>
				<td><?=$month_total['count']?></td>
				<td><?=$month_total['total']?></td>
			</tr>
		</tbody>
	</table>	
	<div class="wrap-loading display-none">
	    <div><img src="/images/icon/loading.gif" /></div>
	</div>  
</section>
</body>
</html>
