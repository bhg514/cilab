<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../header.php';
	$no = $_POST['no'];
	$option_name = $_POST['select_name'] ?? null;
	$option_price = $_POST['select_price'] ?? null;
	$count = $_POST['select_count'];
	if($no==null){
		header("location:http://".$http_host."/menu/store.php?type=5");		
	}elseif($count==null||$count==0){		
		header("location:http://".$http_host."/menu/store_view.php?no=".$no);		
	}
	$info = product_info($no);
	if($option_name==null&&$option_price==null){// 옵션 없는 상품
		if($info['fd_option']!=null){//db에서 진짜 없는지 확인 
			header("location:http://".$http_host."/menu/store_view.php?no=".$no);		
		}

	}elseif($option_name==null||$option_price==null){
		header("location:http://".$http_host."/menu/store_view.php?no=".$no);	
	}

	$user = get_user_info_to_id($_SESSION['user_id'])
?>

<section class="container">
	<div class="visual store">
		<p class="subTitle">STORE</p>
		<div class="location">
			<img src="../images/common/icon_home.png" alt="Home">
			<span>&gt;</span>
			<span>STORE</span>
		</div>
	</div>
	<div class="contents">
		<div class="tabletInner">
			<p class="blt01 mt00">주문정보</p>
			<div class="tblType01Wrap">
				<table class="tblType01">
					<caption>주문정보</caption>
					<colgroup>
						<col>
						<col>
						<col style="width:105px;">
						<col style="width:115px;">
						<col style="width:105px;">
						<col style="width:115px;">
					</colgroup>
					<thead>
						<tr>
							<th scope="col">상품명</th>
							<th scope="col">주문옵션</th>
							<th scope="col">수량</th>
							<th scope="col">가격</th>
							<th scope="col">배송비</th>
							<th scope="col">총액</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?=$info['fd_name']?></td>
							<td><?=$option_name?></td>
							<td><?=$count?></td>
							<td>
							<?php 
								if($option_price!=null) echo number_format($option_price*$count);
								else echo number_format($info['fd_price']*$count);
							?>
							</td>
							<td><?=number_format($info['fd_delivery'])?></td>
							<td>
								<?php 
									if($option_price!=null) echo number_format($option_price*$count+$info['fd_delivery']);
									else echo number_format($info['fd_price']*$count+$info['fd_delivery']);
								?>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<p class="blt01">구매자정보</p>
			<table class="tblType02">
				<caption>구매자정보</caption>
				<colgroup>
					<col style="width:170px;">
					<col>
				</colgroup>
				<tbody>
					<tr>
						<th scope="row">이름</th>
						<td><?=$user['fd_name']?></td>
					</tr>
					<tr>
						<th scope="row">전화번호</th>
						<td><?=$user['fd_hp']?></td>
					</tr>
					<tr>
						<th scope="row">이메일</th>
						<td><?=$user['fd_mail']?></td>
					</tr>
					<tr>
						<th scope="row">주소</th>
						<td>[<?=$user['fd_zip']?>] <?=$user['fd_address1']?> <?=$user['fd_address2']?></td>
					</tr>
				</tbody>
			</table>
			<p class="blt01">배송지정보</p>			
			<table class="tblType02">
				<caption>배송지정보</caption>
				<colgroup>
					<col style="width:170px;">
					<col>
				</colgroup>
				<tbody>
					<tr>
						<th scope="row">받는사람</th>
						<td><input type="text" class="inTbl" placeholder="이름" value="<?=$user['fd_name']?>"></td>
					</tr>
					<tr>
						<th scope="row">주소</th>
						<td>
							<div><input type="text" name="address1" class="inTbl" value="<?=$user['fd_zip']?>" readonly> <a href="#a" class="btn type05">우편번호</a></div>
							<div class="mt05">
								<input type="text" class="inTbl long" name="address2" placeholder="상세주소를 입력하세요." value="<?=$user['fd_address1']?>" readonly>
							</div>
							<div>
								<input type="text" class="inTbl long" name="address2" placeholder="상세주소를 입력하세요." value="<?=$user['fd_address2']?>">
							</div>
						</td>
					</tr>
					<tr>
						<th scope="row">전화번호</th>
						<td><input type="text" class="inTbl" name="phone" value="<?=$user['fd_hp']?>"></td>
					</tr>
					<tr>
						<th scope="row">배송시 요청사항</th>
						<td>
						<select class="inTbl" id="requestSel" name="request1" title="배송시 요청사항 선택">
    						<option>빠른 배송 부탁드립니다.</option>
    						<option>배송 전, 연락주세요.</option>
    						<option>부재 시, 휴대폰으로 연락주세요.</option>
    						<option>부재 시, 경비실에 맡겨주세요.</option>
    						<option>경비실이 없습니다. 배송 전, 연락주세요.</option>
    						<option>직접입력</option>
						</select>
						<input type="text" class="inTbl long" name="request2" title="배송시 요청사항 기재" style="display: none;">
						</td>
					</tr>
				</tbody>
			</table>
<script type="text/javascript">
	$("#requestSel").change(function(){
		if($("#requestSel option:selected").val() == "직접입력"){
			$("input[name='request2']").show();
		}else{
			$("input[name='request2']").hide();
		}
	});
</script>
			<p class="blt01">결제정보</p>
			<table class="tblType02">
				<caption>결제정보</caption>
				<colgroup>
					<col style="width:170px;">
					<col>
				</colgroup>
				<tbody>
					<tr>
						<th scope="row">총액</th>
						<td>
							<?php 
								if($option_price!=null) echo number_format($option_price*$count+$info['fd_delivery']);
								else echo number_format($info['fd_price']*$count+$info['fd_delivery']);
							?>
						</td>
					</tr>
					<tr>
						<th scope="row">결제방법</th>
						<td>
							<div>
								<label><input type="radio" name="pay"> 신용카드</label>
								<label><input type="radio" name="pay"> 무통장 입금</label>
								<label><input type="radio" name="pay"> 핸드폰 결제</label>
							</div>
							<div class="mt05">
								<select class="inTbl">
									<option>카드사 선택</option>
								</select>
								<select class="inTbl">
									<option>할부 선택</option>
								</select>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
			<div class="mt20 fs14">
				<label><input type="checkbox"> 상품구매에 동의합니다.</label>
			</div>
			<div class="mt20 ar">
				<a href="./store_complete.php" class="btn type06">상품구매</a>
				<a href="#a" class="btn type06 st2">취소</a>
			</div>
		</div>
	</div>
</section>

<?php
	include '../footer.php'
?>

