<?
	header ( "content-type:text/html; charset=utf-8" );
	include_once("../../common.php");
	$no = $_GET['no'];

	$info = order_info($no);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" ></script>		
	<link rel="stylesheet" type="text/css" href="/admin/css/style.css">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
	<section class="">	
		<div class="contents">
			<div class="tabletInner">
				<table class="pop_table">
					<colgroup>
						<col style="width:20%;">
						<col style="width:30%;">
						<col style="width:50%;">
					</colgroup>
					<thead>
						<tr>
							<th>주문자</th>
							<th>연락처</th>
							<th>사유</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?=$info['fd_del_name']?></td>
							<td><?=$info['fd_del_hp']?></td>
							<td colspan="2"><?=$info['fd_status_msg']?></td>
						</tr>						
					</tbody>
				</table>				
				<div class="pop_btn">
					<a class="btn type05"  onclick="window.close();">닫기</a>
				</div>
			</div>
		</div>
	</section>
</body>
</html>
