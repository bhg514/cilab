<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../header.php';

	$chk_info = $_POST['chk_info'];
	if($chk_info==null){
		header("location:http://".$http_host."/mypage/cart.php");
	};
	$chk_infos = json_decode($chk_info, true);
	$result = while_del_fee();
	$del_arr = [];
	while($re_val = mysqli_fetch_array($result)){
		array_push($del_arr, $re_val);
	}
	$user = get_user_info_to_id($_SESSION['user_id']);
	$ex_rate = ex_rate();
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
			<form id="store_form" action="../menu/store_form.php" method="post">
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
							</tr>
						</thead>

						<tbody>
						<input type="hidden" id="product_name" value="<?php
							if(count($chk_infos['id'])>1){
								echo $chk_infos['name'][0].' 외 '.count($chk_infos['id'][0]-1).'건';
							}else{
								echo $chk_infos['name'][0];
							}
						?>"
						>
						<?php 
							$total_price = 0;
							for($i=0; $i<count($chk_infos['id']); $i++){
								$total_price = $total_price + str_replace(',','',$chk_infos['price'][$i]);
						?>
									<tr>
										<td><?=$chk_infos['name'][$i]?></td>
										<td name="product_option"><?=$chk_infos['option'][$i]?></td>
										<td name="product_count"><?=$chk_infos['count'][$i]?></td>
										<td><?=$chk_infos['price'][$i]?>(<?=round(str_replace(',','',$chk_infos['price'][$i])/$ex_rate,2)?>$)</td>
									</tr>
						<?php
							}
						?>
						</tbody>
					</table>
				</div>

				<p class="blt01 mt00">Order total</p>
					<table class="tblType01">
						<caption>Order total</caption>
						<colgroup>
							<col style="width:105px;">
							<col style="width:115px;">
							<col style="width:105px;">
						</colgroup>
						<thead>
							<tr>
								<th scope="col">Total product price</th>
								<th scope="col">Delivery Charge</th>
								<th scope="col">Order total</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?=number_format($total_price)?>(<?=round($total_price/$ex_rate,2)?>$)</td>
								<input type="hidden" name="total_price" id="total_price" value="<?=$total_price?>">
								<?php
									$del_fee = end($del_arr)[2] ;
									foreach($del_arr as $del_fee_info){
										if(floor($del_fee_info[0]*$ex_rate)<$total_price and floor($del_fee_info[1]*$ex_rate)>=$total_price){
											$del_fee = $del_fee_info[2];
											break;
										}
									}

								?>
								<td><?=number_format($del_fee)?>(<?=round($del_fee/$ex_rate,2)?>$)</td>
								<input type="hidden" name="del_fee" id="del_fee" value="<?=$del_fee?>">
								<td name="product_count"><?=number_format($total_price+$del_fee)?>(<?=round(($total_price+$del_fee)/$ex_rate,2)?>$)</td>
							</tr>
						</tbody>
					</table>

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
							<td>
								<?=number_format($total_price+$del_fee)?>(<?=round(($total_price+$del_fee)/$ex_rate,2)?>$)
							</td>
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
				<div>
					<input type="hidden" name="infos" id="infos" value='<?=$chk_info?>'>
					<input type="hidden" name="imp_uid" id="imp_uid" value="">
					<input type="hidden" name="merchant_uid" id="merchant_uid" value="">
					<input type="hidden" name="order_type" value="cart">

				</div>
			</form>
		</div>
	</div>
</section>
<?php
	include '../footer.php'
?>

