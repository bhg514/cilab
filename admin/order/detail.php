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
<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

<script type="text/javascript" src="../js/admin.js"></script>
<section class="container">	
	<div class="">
		<div class="tabletInner">
			<form enctype='multipart/form-data' id="product_update" action="product_update.php" method="post">
				<fieldset>
					<div>
						<div class="admin_title">신규주문</div>
						<div class="admin_position">Home  » 주문/배송 관리 » 신규 주문</div>
					</div>
					<hr class="garo" style="display: block;"> 
					<div class="btn_div">
						<a class="btn type05">엑셀 다운로드</a>
						<?php 
							if($type==1) echo '<a class="btn type05" id="detail_order_chk">주문확인</a>';
							elseif ($type==2) echo '<a class="btn type05">송장입력</a>';
						?>
						<a id="info_del" class="btn type05">삭제</a>
						<a href="/admin/order/list.php?type=<?=$type?>" class="btn type05">목록</a>
					</div>
					<input type="hidden" id="no" value="<?=$info['pk_no'] ?>">
					<h4>■ 주문정보</h4>
					<table>
						<tbody>
							<tr>
								<th>주문번호</th>
								<td><?=$info['fk_order_number']?></td>
								<th>주문일</th>
								<td><?=$info['fd_date']?></td>								
							</tr>
							<?php
								$result = while_get_order_product($no);
								while ($r = mysqli_fetch_array($result)) {
							?>
							<tr>
								<th>주문상품</th>
								<td><?=$r['fd_product_name']?></td>
								<th>수량</th>
								<td><?=$r['fd_count']?></td>								
							</tr>
							<tr>
								<th>주문옵션</th>
								<td colspan="3"><?=$r['fd_option']?></td>
							</tr>
							<?php
								}
							?>
							<tr>
								<th>주문자</th>
								<td><?=$info['fd_order_name']?></td>
								<th>주문자ID</th>
								<td><?=$info['fd_order_id']?></td>
							</tr>
							<tr>
								<th>연락처</th>
								<td><?=$info['fd_order_hp']?></td>
								<th>이메일</th>
								<td><?=$info['fd_order_mail']?></td>
							</tr>
						</tbody>
					</table>	
					<h4>■ 결제 정보</h4>
					<table>
						<tbody>
							<tr>
								<th>결제 정보</th>
								<td colspan="3"><?=$info['fd_price']?>원</td>
							</tr>
							<tr>
								<th>결제 방법</th>
								<td colspan="3"><?=$info['fd_payment']?></td>
							</tr>							
						</tbody>
					</table>	
					<h4>■ 배송 정보</h4>
					<table>
						<tbody>
							<tr>
								<th>받는 사람</th>
								<td colspan="3"><?=$info['fd_del_name']?></td>
							</tr>
							<tr>
								<th>주소</th>
								<td colspan="3">[<?=$info['fd_del_zip']?>] <?=$info['fd_del_address1']?> <?=$info['fd_del_address2']?></td>
							</tr>							
							<tr>
								<th>연락처</th>
								<td colspan="3"><?=$info['fd_del_hp']?></td>
							</tr>	
							<tr>
								<th>배송 요청사항</th>
								<td colspan="3"><?=$info['fd_del_comment']?></td>
							</tr>	
						</tbody>
					</table>									
					<div class="mt20 ar">
						
					</div>
				</fieldset>
			</form>
		</div>
	</div>

</section>
</body>
</html>