<?php
// 옵션 사이즈 늘리기
	header ( "content-type:text/html; charset=utf-8" );
	include '../admin_header.php';
	include './side.php';
	include_once("../../common.php");
	$no = $_GET['no'];
	$type = $_GET['type'];
	if($no==null){
		header("location:http://".$http_host."/admin/order/list.php?type=1");
	};
	$info = order_detail($no);

	
	

?>
<!-- include libraries(jQuery, bootstrap) -->
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 

<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

<script type="text/javascript" src="../js/admin.js"></script>
<section class="container">	
	

	<div class="contents">
		<div class="tabletInner">
			<form enctype='multipart/form-data' id="product_update" action="product_update.php" method="post">
				<fieldset>
					<div>
						<div>신규주문</div>
						<div>Home  » 주문/배송 관리 » 신규 주문</div>
					</div>
					<hr class="garo" style="display: block;"> 
					<div>
						<a class="btn type07">엑셀 다운로드</a>
						<?php 
							if($type==1) echo '<a class="btn type07" id="detail_order_chk">주문확인</a>';
							elseif ($type==2) echo '<a class="btn type07">송장입력</a>';
						?>
						
						<a class="btn type07">삭제</a>
						<a class="btn type07">목록</a>
					</div>
					<input type="hidden" id="no" value="<?=$info['pk_no'] ?>">
					<h3>■ 주문정보</h3>
					<table>
						<tbody>
							<tr>
								<td>주문번호</td>
								<td><?=$info['fk_order_number']?></td>
								<td>주문일</td>
								<td><?=$info['fd_date']?></td>								
							</tr>
							<?php
								$result = while_get_order_product($no);
								while ($r = mysqli_fetch_array($result)) {
							?>
							<tr>
								<td>주문상품</td>
								<td><?=$r['fd_product_name']?></td>
								<td>수량</td>
								<td><?=$r['fd_count']?></td>								
							</tr>
							<tr>
								<td >주문옵션</td>
								<td colspan="3"><?=$r['fd_option']?></td>
								
							</tr>
							<?php
								}
							?>
							<tr>
								<td>주문자</td>
								<td><?=$info['fd_order_name']?></td>
								<td>주문자ID</td>
								<td><?=$info['fd_order_id']?></td>
								
							</tr>
							<tr>
								<td>연락처</td>
								<td><?=$info['fd_order_hp']?></td>
								<td>이메일</td>
								<td><?=$info['fd_order_mail']?></td>
								
							</tr>
						</tbody>
					</table>	
					<h3>■ 결제 정보</h3>
					<table>
						<tbody>
							<tr>
								<td>결제 정보</td>
								<td colspan="3"><?=$info['fd_price']?>원</td>
							</tr>
							<tr>
								<td>결제 방법</td>
								<td colspan="3"><?=$info['fd_payment']?></td>
							</tr>							
						</tbody>
					</table>	
					<h3>■ 배송 정보</h3>
					<table>
						<tbody>
							<tr>
								<td>받는 사람</td>
								<td colspan="3"><?=$info['fd_del_name']?></td>
							</tr>
							<tr>
								<td>주소</td>
								<td colspan="3">[<?=$info['fd_del_zip']?>] <?=$info['fd_del_address1']?> <?=$info['fd_del_address2']?></td>
							</tr>							
							<tr>
								<td>연락처</td>
								<td colspan="3"><?=$info['fd_del_hp']?></td>
							</tr>	
							<tr>
								<td>배송 요청사항</td>
								<td colspan="3"><?=$info['fd_del_comment']?></td>
							</tr>	
						</tbody>
					</table>									
					<div class="mt20 ar">
						<input type="submit" value="상품등록" id="product_reg_btn" class="btn type07 st2">
						<!-- <a href="javascript:login_do();" class="btn type07 st2">회원가입</a> -->
						<a href="/" class="btn type07">취소</a>
					</div>
				</fieldset>
			</form>
		</div>
	</div>

</section>

<?php
	include '../admin_footer.php';
?>