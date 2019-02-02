<?php
// 옵션 사이즈 늘리기
	header ( "content-type:text/html; charset=utf-8" );

	include_once("../common.php");
	$no = $_GET['no'];

	if($no==null){
		header("location:https://".$http_host."/");
	};
	$info = order_detail($no);

?>
<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../css/popup.css">
<script type="text/javascript" src="../js/common.js"></script>
<section class="container">	
	<div class="">
		<div class="tabletInner">
			<fieldset>			
				<h4>■ Order information</h4>
				<table class="pop_table">
					<tbody>
						<tr>
							<th>Product name</th>
							<th>Option</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Delivery Charge</th>
							<th>Order total</th>															
						</tr>							
						<tr>
							<td><?=$info['fd_product_name']?></td>
							<td><?=$info['fd_product_option']?></td>
							<td><?=number_format($info['fd_product_count'])?></td>
							<td><?=number_format($info['fd_price'])?></td>								
							<td><?=number_format($info['fd_del_fee'])?></td>								
							<td><?=number_format($info['fd_price']+$info['fd_del_fee'])?></td>								
						</tr>
					</tbody>
				</table>	
				<h4>■ Purchaser information</h4>
				<table class="pop_table">
					<tbody>
						<tr>
							<th>Name</th>
							<td colspan="3"><?=$info['fd_order_name']?></td>							
						</tr>
						<tr>
							<th>Phone Number</th>
							<td colspan="3"><?=$info['fd_order_hp']?></td>							
						</tr>
						<tr>
							<th>E-mail</th>
							<td colspan="3"><?=$info['fd_order_mail']?></td>							
						</tr>
						<tr>
							<th>address</th>
							<td colspan="3">[<?=$info['fd_del_zip']?>] <?=$info['fd_del_address1']?> <?=$info['fd_del_address2']?><?=$info['fd_del_address3']?><?=$info['fd_del_address4']?></td>							
						</tr>												
					</tbody>
				</table>	
				<h4>■ Shipping information</h4>
				<table class="pop_table">
					<tbody>
						<tr>
							<th>Name</th>
							<td colspan="3">
								<input type="text" name="" value="<?=$info['fd_del_name']?>">	
							</td>
						</tr>
						<tr>
							<th rowspan="5">Address</th>
							<td colspan="3">
								<input type="text" name="" value="<?=$info['fd_del_zip']?>"><label>zip</label>
							</td>
						</tr>	
						<tr >
							<td colspan="3">
								<input type="text" name="" value="<?=$info['fd_del_address4']?>"><label>Address line</label>
							</td>
						</tr>						
						<tr>
							<td colspan="3">
								<input type="text" name="" value="<?=$info['fd_del_address3']?>"><label>City</label>
							</td>
						</tr>						
						<tr>
							<td colspan="3">
								<input type="text" name="" value="<?=$info['fd_del_address2']?>"><label>State</label>
							</td>
						</tr>						
						<tr>
							<td colspan="3">
								<input type="text" name="" value="<?=$info['fd_del_address1']?>"><label>Country</label>
							</td>
						</tr>						
						<tr>
							<th>Phone Number</th>
							<td colspan="3">
								<input type="text" name="" value="<?=$info['fd_del_hp']?>">
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