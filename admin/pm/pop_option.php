<?
	header ( "content-type:text/html; charset=utf-8" );
	include_once("../../common.php");
?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="/css/common.css">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="stylesheet" type="text/css" href="/css/default.css">
	<link rel="stylesheet" type="text/css" href="/css/mobile_menu_styles.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" media="screen and (max-width:999px)" type="text/css" href="/css/tablet.css">
	<link rel="stylesheet" media="screen and (max-width:480px)" type="text/css" href="/css/mobile.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" ></script>		
	<script type="text/javascript" src="../js/pop_option.js"></script>
</head>

<body>
	<section class="container">	
		<div class="contents">
			<div class="tabletInner">				
				<fieldset>
					<table>				
						<h1>상품 옵션 설정</h1>
						<hr class="garo" style="display: block;"> 						
						<h3>■ 상품정보</h3>
						<caption>상품 등록</caption>
						<colgroup>
							<col style="width:170px;">
							<col>
						</colgroup>
						<thead>
							<tr>
								<th>옵션명</th>
								<th>옵션별 가격</th>
							</tr>
						</thead>
						<tbody id="tbody">
							<tr id="option_1">						
								<td scope="row">
									<input type="text" class="option_name" placeholder="색상">
									<input type="button" class="add_option_btn"  value="+" onclick="add_option_btn(this)">
								</td>						
								<td>
									<input type="text" class="option_price">원
								</td>
							</tr>													
						</tbody>
					</table>
					<div>
						※ 옵션은 최대 5개까지 설정 할 수 있습니다.						
					</div>

					<div class="mt20 ar">
						<a class="btn type05" onclick="self.close()">취소</a>
						<input type="submit" value="완료" class="btn type05" onclick="form_data();">
					</div>
					<input type="hidden" id="pre_option">
				</fieldset>
				
			</div>
		</div>
	</section>
</body>
</html>