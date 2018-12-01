<?
	header ( "content-type:text/html; charset=utf-8" );
	include_once("../../common.php");
	$no = $_GET['no'];
	$type = $_GET['type']
?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" ></script>		
	<script type="text/javascript" src="../js/pop_refuse_cancel.js"></script>
	<link rel="stylesheet" type="text/css" href="/admin/css/style.css">
	<link rel="stylesheet" type="text/css" href="/css/style.css">

</head>
<body>
	<section >	
		<div class="contents">
			<div class="tabletInner">
				<table class="pop_table">
					<thead>
						<tr>
							<th>사유</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<input type="hidden" id="no" value="<?=$no?>">
								<input type="hidden" id="type" value="<?=$type?>">
								<textarea class="pop_textarea" id="pop_input_text"></textarea>
							</td>							
						</tr>						
					</tbody>
				</table>				
				<div class="pop_btn">
					<a class="btn type05" id="send_msg">내용 전달</a>
					<a class="pop_cancel_close btn type05"  onclick="window.close();">닫기</a>
				</div>				
			</div>
		</div>
	</section>
</body>
</html>
