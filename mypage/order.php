<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../header.php';
	$id = $_SESSION['user_id'];
	if(!isset($id) || $_SESSION['user_type']=="a"){
		header("location:http://".$http_host."/index.php");
	}

?>
<section class="container">
	<div class="visual store">
		<p class="subTitle">배송 조회</p>
		<div class="location">
			<img src="../images/common/icon_home.png" alt="Home">
			<span>&gt;</span>
			<span>마이페이지</span>
			<span>&gt;</span>
			<span>배송조회</span>
		</div>
	</div>
	<div class="contents">
		<div class="btnTab">
			<a href="./order.php" class="on">배송 조회</a>
			<a href="./info.php" >정보 수정</a>
		</div>
		<div class="tabletInner">
			<div class="tblType01Wrap">
				<table class="tblType01 listView">
					<caption>주문정보</caption>
					<colgroup>
						<col style="width:12%;">
						<col style="width:15%;">
						<col style="width:11%;">
						<col style="width:8.5%;">
						<col style="width:11%;">
						<col style="width:11%;">
						<col style="width:11%;">
						<col style="width:11%;">
						<col style="width:11%;">
					</colgroup>
					<thead>
						<tr>
							<th scope="col">주문일자</th>
							<th scope="col">상품명</th>
							<th scope="col">총액</th>
							<th scope="col">상태</th>
							<th scope="col">송장번호</th>
							<th scope="col">배송조회</th>
							<th scope="col">교환신청</th>
							<th scope="col">환불신청</th>
							<th scope="col">구매확정</th>
						</tr>
					</thead>
					<tbody>
						<?php
										
							$result = user_order_list($id);		
							while ($r = mysqli_fetch_array($result)) {
						?>
						<tr>
							<td><?=$r['fd_date']?></td>
							<td onclick="pop_order(<?=$r['pk_no']?>,'order');"><?=$r['fd_name']?></td>
							<td><?=number_format($r['fd_price']+$r['fd_del_fee'])?></td>
							<td>
								<?php
									if($r['fd_status']==1) echo "주문완료";
									elseif($r['fd_status']==2) echo "상품준비중";
									elseif($r['fd_status']==3) echo "배송중";
									elseif($r['fd_status']==4) echo "배송완료";
									elseif($r['fd_status']==5) echo "구매확정";
									elseif($r['fd_status']==6) echo "주무문취소";
									elseif($r['fd_status']==7) echo "교환대기";
									elseif($r['fd_status']==8) echo "환불대기";
									elseif($r['fd_status']==9) echo "교환승인";
									elseif($r['fd_status']==10) echo "환불승인";
									elseif($r['fd_status']==11) echo "교환반려";
									elseif($r['fd_status']==12) echo "환불반려";
								?>
							</td>
							<td><?=$r['fd_invoice_number']?></td>
							<td>
								<?php if($r['fd_status']==3||$r['fd_status']==4) echo '<a onclick="del_lookup(\'http://service.epost.go.kr/trace.RetrieveRegiPrclDeliv.postal?sid1='.$r['fd_invoice_number'].'\')" class="btn type05">배송조회</a>';
								?>
							</td>
							<td>
								<?php if($r['fd_status']==4) echo '<a onclick=pop_order('.$r['pk_no'].',"exchange"); class="btn type05">교환신청</a>';
								?>
								<?php if($r['fd_status']==11) echo '<a onclick=pop_order('.$r['pk_no'].',"exchange_reason"); class="btn type05">반려사유</a>';
								?>								
							</td>
							<td>
								<?php if($r['fd_status']<5) echo '<a onclick=pop_order('.$r['pk_no'].',"refund"); class="btn type05">환불신청</a>';
								?>
								<?php if($r['fd_status']==12) echo '<a onclick=pop_order('.$r['pk_no'].',"refund_reason"); class="btn type05">반려사유</a>';
								?>	
							</td>
							<td>
								<?php if($r['fd_status']==4) echo '<input type="button" onclick=purchase_conf('.$r['pk_no'].') class="btn type05" value="구매확정">';
								?>
								
							</td>							
						</tr>
						<?php
							}
						?>	
						
					
					</tbody>
				</table>
			</div>
			<div>
		</div>
	</div>
</section>
<!-- exchange_modal-->
<div id="exchange_modal" class="modal">
  <div class="modal-content">
  	<div class="tabletInner">
		<fieldset>	
			<div>		
				<div>◎ 교환/환불 사유</div>
				<div>
					<textarea class="modal_textarea" id="modal_textarea"></textarea>
				</div>
			</div>
			<div class="modal_hp">
				<div>◎ 전화번호</div>
				<div>
					<input type="text" id="modal_hp1" class="modal_hp_input">-<input type="text" id="modal_hp2" class="modal_hp_input">-<input type="text" id="modal_hp3" class="modal_hp_input">
				</div>
			</div>
			<div class="modal_btn">
				<input type="hidden" id="modal_no" value="">
				<input type="hidden" id="modal_type" value="">
				<a onclick="exchange();" class="btn type05">신청하기</a>
				<a onClick="close_pop();" class="btn type05">닫기</a>
			</div>												
		</fieldset>
	</div>      
  </div>
</div>
<!--End exchange_modal-->


<?php
	include '../footer.php'
?>

