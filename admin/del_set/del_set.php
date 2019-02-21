<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../admin_header.php';
	include './side.php';
	include_once("../../common.php");

?>
<script type="text/javascript" src="../js/admin.js"></script>
<script type="text/javascript" src="../js/number-line.js"></script>
<section class="container">			
	<div>
		<div class="admin_title">배송비 관리</div>		
		<div class="admin_position">Home  » 배송비 관리</div>			
		<hr class="garo" style="display: block;"> 
	</div>
	<div class="btn_div">
		<a class="btn type05" onclick="range_save()">저장</a>		
	</div>
	<div id=chart>
	</div>
	
	<table class="list-table">
		<caption class="readHide">배송비 관리</caption>
		<thead class="admin_list">
			<tr>
				<th scope="col" class="thead_th">초과</th>
				<th scope="col" class="thead_th">이하</th>
				<th scope="col" class="thead_th">금액</th>				
			</tr>
		</thead>
		<tbody id="tbody">	
			<?php
				$result = while_get_del_fee();	
				while ($r = mysqli_fetch_array($result)) {
			?>
			<tr>				
				<td class="tbody_td start_val"><?= number_format($r['fd_start'])?></td>
				<td class="tbody_td end_val"><?php if($r['fd_end']!=9999999) echo number_format($r['fd_end']);?></td>
				<td class="tbody_td"><input value=<?= number_format($r['fd_fee'])?>></td>					
			</tr>
			<?php 
				}
			?>			

							
		</tbody>
	</table>
	
	<div class="wrap-loading display-none">
	    <div><img src="/images/icon/loading.gif" /></div>
	</div>  
</section>
</body>
</html>
<script type="text/javascript">
	numberlineMain('int');
</script>