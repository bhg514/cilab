<?
	header ( "content-type:text/html; charset=utf-8" );
	include_once("../../common.php");
	$no = $_GET['no'];
?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" ></script>		
	<script type="text/javascript" src="../js/pop_refuse_cancel.js"></script>

</head>
<body>
	<section class="container">	
		<div class="contents">
			<div class="tabletInner">				
				<div>
					<input type="text" id="input_msg" name="input_msgu" value="">
					<input type="hidden" id="no" name="input_msgu" value="<?=$no?>">
				</div>
				<div>
					<input type="button" id="send_msg" value="내용 전달">
					<input type="button" value="취소" onclick="window.close();  ">
				</div>
				
			</div>
		</div>
	</section>
	


</body>
</html>
