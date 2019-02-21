<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../header.php';
	if(!isset($_SESSION['user_id'])){
		alert('Please try again after login.','https://'.$http_host.'/member/login.php');
	}

	$no = $_POST['no'];
	$option_name = $_POST['select_name'] ?? null;
	$option_price = $_POST['select_price'] ?? null;
	$option_price = str_replace(",","",$option_price);
	$count = $_POST['select_count'];
	if($no==null){
		header("location:https://".$http_host."/menu/store.php?type=5");		
	}elseif($count==null||$count==0){		
		header("location:https://".$http_host."/menu/store_view.php?no=".$no);		
	}
	$info = product_info($no);
	if($option_name==null&&$option_price==null){// 옵션 없는 상품
		if($info['fd_option']!=null){//db에서 진짜 없는지 확인 
			header("location:https://".$http_host."/menu/store_view.php?no=".$no);		
		}

	}elseif($option_name==null||$option_price==null){
		header("location:https://".$http_host."/menu/store_view.php?no=".$no);	
	}

	$user = get_user_info_to_id($_SESSION['user_id']);

	if($option_price!=null) 
		$total_price = $option_price*$count;
	else 
		$total_price = $info['fd_price']*$count;
	$ex_rate = ex_rate();
	//배송비 호출
	$result = while_del_fee();
	$del_arr = [];
	while($re_val = mysqli_fetch_array($result)){
		array_push($del_arr, $re_val);
	}
	$del_fee = end($del_arr)[2] ;
	foreach($del_arr as $del_fee_info){
		if(floor($del_fee_info[0]*$ex_rate)<$total_price and floor($del_fee_info[1]*$ex_rate)>=$total_price){
			$del_fee = $del_fee_info[2];
			break;
		}
	}
?>
<script type="text/javascript" src="../js/register.js"></script><!-- 우편 --> 
<!-- iamport.payment.js -->
<script type="text/javascript" src="https://cdn.iamport.kr/js/iamport.payment-1.1.5.js"></script>
<!-- iamport.payment.js -->
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
			<form id="store_form" action="./store_form.php" method="post">
				<p class="blt01 mt00">Order information</p>
				<div class="tblType01Wrap">
					<table class="tblType01">
						<caption>Order information</caption>
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
								<th scope="col">Product name</th>
								<th scope="col">Option</th>
								<th scope="col">Quantity</th>
								<th scope="col">Price</th>
								<th scope="col">Delivery Charge</th>
								<th scope="col">Order total</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<input type="hidden" id="product_name" value="<?=$info['fd_name']?>">
								<td><?=$info['fd_name']?></td>
								<td name="product_option"><?=$option_name?></td>
								<td name="product_count"><?=$count?></td>
								<td><?=number_format($total_price).'($'.number_format($total_price/$ex_rate,2).')'?>								
								<input type="hidden" id="total_price" name="total_price" value="<?=$total_price?>">
								</td>
								<td><?=number_format($del_fee).'($'.number_format($del_fee/$ex_rate,2).')'?></td>
								<input type="hidden" id="del_fee" name="del_fee" value="<?=$del_fee?>">
								<td><?=number_format($total_price+$del_fee).'($'.number_format(($total_price+$del_fee)/$ex_rate,2).')'?></td>
																	
								<input type="hidden" name="imp_uid" id="imp_uid" value="">
								<input type="hidden" name="merchant_uid" id="merchant_uid" value="">

								<input type="hidden" name="infos" id="infos" value='<?php	
								echo '{"product_no":["'.$info['pk_no'].'"],"option":["'.$option_name.'"],"count":["'.$count.'"],"price":["'.$total_price.'"],"name":["'.$info['fd_name'].'"]}'
								?>
								'>
								<input type="hidden" name="order_type" value="store">
								
							</tr>
						</tbody>
					</table>
				</div>
				<p class="blt01">Purchaser information</p>
				<table class="tblType02">
					<caption>Purchaser information</caption>
					<colgroup>
						<col style="width:170px;">
						<col>
					</colgroup>
					<tbody>
						<tr>
							<th scope="row">Name</th>
							<td>
								<input type="text" name="order_name" id="order_name" class="order_input" value=<?=$user['fd_name']?>>
								<label class="req_label" id="label_order_name">Please enter your name</label>
							</td>
						</tr>
						<tr>
							<th scope="row">Phone Number</th>
							<td>
								<input type="text" name="order_hp" id="order_hp" class="order_input" value=<?=$user['fd_hp']?>>
								<label class="req_label" id="label_order_hp">Please enter your phone number.</label>
							</td>
						</tr>
						<tr>
							<th scope="row">E-mail</th>
							<td>
								<input type="text" name="order_mail" id="order_mail" class="order_input" value="<?=$user['fd_mail']?>">
								<label class="req_label" id="label_order_mail">Please enter your E-mail.</label>
							</td>
						</tr>
					</tbody>
				</table>
				<p class="blt01">Shipping information</p>			
				<table class="tblType02">
					<caption>Shipping information</caption>
					<colgroup>
						<col style="width:170px;">
						<col>
					</colgroup>
					<tbody>
						<tr>
							<th scope="row">Recipient</th>
							<td>
								<input type="text" class="inTbl" placeholder="이름" name="del_name" id="del_name" value="<?=$user['fd_name']?>">
								<label class="req_label" id="label_name">Please enter the recipient.</label>
							</td>
						</tr>
						<tr>
							<th scope="row">Address</th>
							<td>
								<!-- <label for="reg_mb_zip" class="sound_only">우편번호</label>
								<input type="text" name="mb_zip" value="<?=$user['fd_zip']?>" id="reg_mb_zip" class="inTbl frm_input required" size="5" maxlength="6" readonly >
								<a href="javascript:win_zip('fregisterform', 'mb_zip', 'mb_addr1', 'mb_addr2', 'mb_addr3', 'mb_addr_jibeon');" class="btn type05 ml10">주소 검색</a><br/>
								<div id="daum_juso_pagemb_zip" style="display:none; border:1px solid; left:0px; width:100%; height:267px; margin:5px 0px;position:relative;">
									<img src="//i1.daumcdn.net/localimg/localimages/07/postcode/320/close.png" id="btnFoldWrap" style="cursor:pointer;position:absolute;right:0px;top:-21px;z-index:1" class="close_daum_juso" alt="접기 버튼">
								</div>
								<input type="text" name="mb_addr1" value="<?=$user['fd_address1']?>" id="reg_mb_addr1"  class="inTbl frm_input frm_address required" size="50" readonly>
								<label for="reg_mb_addr1">기본주소<strong class="sound_only"> 필수</strong></label><br>
								<input type="text" name="mb_addr2" value="<?=$user['fd_address2']?>" id="reg_mb_addr2"  class="inTbl frm_input frm_address " size="50">
								<label for="reg_mb_addr2">상세주소</label>
								<br>							
								<input type="hidden" name="mb_addr_jibeon" value="R">
								<label class="req_label" id="label_addr">주소를 입력해주세요.</label> -->
								<input type="text" name="mb_zip" value="<?=$user['fd_zip']?>" id="reg_mb_zip" class="inTbl frm_input required" size="5" maxlength="6" >
								<label for="reg_mb_zip">zip</label><br/>
								<input type="text" name="mb_addr4" value="<?=$user['fd_address4']?>" id="reg_mb_addr4"  class="inTbl frm_input required" size="50" >
								<label for="reg_mb_addr4">Address line</label><br/>
								<input type="text" name="mb_addr3" value="<?=$user['fd_address3']?>" id="reg_mb_addr3"  class="inTbl frm_input required " size="50">
								<label for="reg_mb_addr3">City</label><br/>
								<input type="text" name="mb_addr2" value="<?=$user['fd_address2']?>" id="reg_mb_addr2"  class="inTbl frm_input required " size="50">
								<label for="reg_mb_addr2">State</label><br/>
								<input type="text" name="mb_addr1" value="<?=$user['fd_address1']?>" id="reg_mb_addr1"  class="inTbl frm_input required " size="50">
								<label for="reg_mb_addr1">Country</label>
							</td>
						</tr>
						<tr>
							<th scope="row">Phone Number</th>
							<td>
								<input type="text" class="inTbl" name="del_hp" id="del_hp" value="<?=$user['fd_hp']?>">
								<label class="req_label" id="label_hp">Please enter the phone number.</label>
							</td>
						</tr>
					</tbody>
				</table>

				<p class="blt01">Payment information</p>
				<table class="tblType02">
					<caption>Payment information</caption>
					<colgroup>
						<col style="width:170px;">
						<col>
					</colgroup>
					<tbody>
						<tr>
							<th scope="row">Order total</th>
							<td><?=number_format($total_price+$del_fee).'($'.number_format(($total_price+$del_fee)/$ex_rate,2).')'?></td>
						</tr>
					</tbody>
				</table>
				<div class="mt20 fs14">
					<label><input type="checkbox" id="pur_chk">Payment agree</label>
					<label class="req_label" id="label_chk">Accept payment agreement.</label>
				</div>
				<div class="mt20 ar">
					<input type="button" id="store_pur_btn" class="btn type06" value="proceed to checkout">
					<a href="#" onclick="history.back()" class="btn type06 st2">Cancel</a>
				</div>
			</form>
		</div>
	</div>
</section>
<?php
	include '../footer.php'
?>

