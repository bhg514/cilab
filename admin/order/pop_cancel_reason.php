<?
	header ( "content-type:text/html; charset=utf-8" );
	include_once("../../common.php");
	$no = $_GET['no'];

	$info = order_detail($no);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" ></script>		
</head>
<body>
	<section class="container">	
		<div class="contents">
			<div class="tabletInner">
				<table>
					<tbody>
						<tr>
							<td>주문자</td>
							<td>연락처</td>
							<td>환불은행</td>
							<td>환불계좌</td>							
						</tr>
						<tr>
							<td><?=$info['fd_order_name']?></td>
							<td><?=$info['fd_order_hp']?></td>
							<td><?=$info['fd_payment']?></td>
							<td><?=$info['fd_paynum']?></td>
						</tr>						
					</tbody>
				</table>				
				<dir>
					<?=$info['fd_status_msg']?>
				</dir>
				<div>
					<input type="button" value="닫기" onclick="window.close();  ">
				</div>
			</div>
		</div>
	</section>
</body>
</html>
