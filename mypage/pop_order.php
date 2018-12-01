<?php
// 옵션 사이즈 늘리기
	header ( "content-type:text/html; charset=utf-8" );

	include_once("../common.php");
	$no = $_GET['no'];

	if($no==null){
		header("location:http://".$http_host."/");
	};
	$info = order_detail($no);

?>
<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../css/popup.css">
<section class="container">	
	<div class="">
		<div class="tabletInner">
			<fieldset>			
				<h4>■ 주문정보</h4>
				<table class="pop_table">
					<tbody>
						<tr>
							<th>상품명</th>
							<th>주문옵션</th>
							<th>수량</th>
							<th>가격</th>
							<th>배송비</th>
							<th>총액</th>															
						</tr>							
						<tr>
							<th><?=$info['fd_product_name']?></th>
							<td><?=$info['fd_product_option']?></td>
							<td><?=number_format($info['fd_product_count'])?></td>
							<td><?=number_format($info['fd_price'])?></td>								
							<td><?=number_format($info['fd_del_fee'])?></td>								
							<td><?=number_format($info['fd_price']+$info['fd_del_fee'])?></td>								
						</tr>
					</tbody>
				</table>	
				<h4>■ 구매자 정보</h4>
				<table class="pop_table">
					<tbody>
						<tr>
							<th>이름</th>
							<td colspan="3"><?=$info['fd_order_name']?></td>							
						</tr>
						<tr>
							<th>전화번호</th>
							<td colspan="3"><?=$info['fd_order_hp']?></td>							
						</tr>
						<tr>
							<th>이메일</th>
							<td colspan="3"><?=$info['fd_order_mail']?></td>							
						</tr>
						<tr>
							<th>주소</th>
							<td colspan="3">[<?=$info['fd_del_zip']?>] <?=$info['fd_del_address1']?> <?=$info['fd_del_address2']?><?=$info['fd_del_address3']?><?=$info['fd_del_address4']?></td>							
						</tr>												
					</tbody>
				</table>	
				<h4>■ 배송 정보</h4>
				<a href="/" class="btn type05" id="change_btn">배송지 변경</a>
				<table class="pop_table">
					<tbody>
						<tr>
							<th>받는 사람</th>
							<td colspan="3">
								<input type="text" name="" value="<?=$info['fd_del_name']?>">																
							</td>
						</tr>
						<tr>
							<th rowspan="5">주소</th>
							<td colspan="3">
								<input type="text" name="" value="<?=$info['fd_del_zip']?>"><label>우편번호</label>
							</td>
						</tr>	
						<tr >
							<td colspan="3">
								<input type="text" name="" value="<?=$info['fd_del_address4']?>"><label>상세</label>
							</td>
						</tr>						
						<tr>
							<td colspan="3">
								<input type="text" name="" value="<?=$info['fd_del_address3']?>"><label>동</label>
							</td>
						</tr>						
						<tr>
							<td colspan="3">
								<input type="text" name="" value="<?=$info['fd_del_address2']?>"><label>시/구</label>
							</td>
						</tr>						
						<tr>
							<td colspan="3">
								<input type="text" name="" value="<?=$info['fd_del_address1']?>"><label>나라</label>
							</td>
						</tr>						
						<tr>
							<th>전화번호</th>
							<td colspan="3">
								<input type="text" name="" value="<?=$info['fd_del_hp']?>">
							</td>
						</tr>	
						<tr>
							<th>배송 요청사항</th>
							<td colspan="3">
								<input type="text" name="" value="<?=$info['fd_del_comment']?>">
							</td>
						</tr>	
					</tbody>
				</table>									
			</fieldset>
		</div>
	</div>

</section>
</body>
</html>