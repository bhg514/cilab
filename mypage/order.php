<?php
	header ( "content-type:text/html; charset=utf-8" );
	include '../header.php';
	$id = $_SESSION['user_id'];
	if(!isset($id) || $_SESSION['user_type']=="a"){
		header("location:https://".$http_host."/index.php");
	}

?>
<section class="container">
	<div class="visual store">
		<p class="subTitle">Delivery Tracking</p>
		<div class="location">
			<img src="../images/common/icon_home.png" alt="Home">
			<span>&gt;</span>
			<span>Mypage</span>
			<span>&gt;</span>
			<span>Delivery Tracking</span>
		</div>
	</div>
	<div class="contents">
		<div class="btnTab">
			<a href="./order.php" class="on">Delivery Tracking</a>
			<a href="./info.php" >Modify information</a>
		</div>
		<div class="tabletInner">
			<div class="tblType01Wrap">
				<table class="tblType01 listView">
					<caption>Order information</caption>
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
							<th scope="col">Order date</th>
							<th scope="col">Product count</th>
							<th scope="col">Total amount</th>
							<th scope="col">Condition</th>
							<th scope="col">Invoice number</th>
							<th scope="col">Delivery tracking</th>
							<th scope="col">Exchange request</th>
							<th scope="col">Request refund</th>
							<th scope="col">Confirm purchase</th>
						</tr>
					</thead>
					<tbody>
						<?php
										
							$result = user_order_list($id);		
							while ($r = mysqli_fetch_array($result)) {
						?>
						<tr>
							<td><?=$r['fd_date']?></td>
							<td class="pointer" onclick="pop_order(<?=$r['pk_no']?>,'order');"><?=$r['fd_product_count']?></td>
							<td><?=number_format($r['fd_price']+$r['fd_del_fee'])?></td>
							<td>
								<?php
								   if($r['fd_status']==1) echo "Order Completed";
								   elseif($r['fd_status']==2) echo "Preparing the product";
								   elseif($r['fd_status']==3) echo "Delivering the product";
								   elseif($r['fd_status']==4) echo "Delivery Completed";
								   elseif($r['fd_status']==5) echo "Purchase Confirmation";
								   elseif($r['fd_status']==6) echo "Cancel  Order";
								   elseif($r['fd_status']==7) echo "Exchange Standby";
								   elseif($r['fd_status']==8) echo "Refund Standby";
								   elseif($r['fd_status']==9) echo "Exchange Approval";
								   elseif($r['fd_status']==10) echo "Refund Approval";

								   if($r['fd_pre_status']==11) echo " & Refusal Exchange";
								   elseif($r['fd_pre_status']==12) echo " & Refusal Refund";
								?>
							</td>
							<td><?=$r['fd_invoice_number']?></td>
							<td>
								<?php if($r['fd_status']==3) echo '<a onclick="del_lookup(\'http://service.epost.go.kr/trace.RetrieveRegiPrclDeliv.postal?sid1='.$r['fd_invoice_number'].'\')" class="btn type05">Delivery Tracking</a>';
								?>
							</td>
							<td>
								<?php 
									if($r['fd_pre_status']==11) echo '<a onclick=pop_order('.$r['pk_no'].',"exchange_reason"); class="btn type05">Refusal Reason</a>';
									elseif($r['fd_status']==3) echo '<a onclick=pop_order('.$r['pk_no'].',"exchange"); class="btn type05">Request Exchange</a>';
								?>								
							</td>
							<td>
								<?php 
								if($r['fd_pre_status']==12) echo '<a onclick=pop_order('.$r['pk_no'].',"refund_reason"); class="btn type05">Refusal Reason</a>';
								elseif($r['fd_status']<5) echo '<a onclick=pop_order('.$r['pk_no'].',"refund"); class="btn type05">Request Refund</a>';
								?>	
							</td>
							<td>
								<?php if($r['fd_status']==3) echo '<input type="button" onclick=purchase_conf('.$r['pk_no'].') class="btn type05" value="Purchase Confirmation">';
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
  <div class="order_modal-content">
  	<div class="tabletInner">
		<fieldset>	
			<div>		
				<div>◎ Exchange/Refund Reason</div>
				<div>
					<textarea class="modal_textarea" id="modal_textarea"></textarea>
				</div>
			</div>
			<div class="modal_hp">
				<div>◎ Phone Number</div>
				<div>
					<input type="text" id="modal_hp1" class="modal_hp_input">-<input type="text" id="modal_hp2" class="modal_hp_input">-<input type="text" id="modal_hp3" class="modal_hp_input">
				</div>
			</div>
			<div class="modal_btn">
				<input type="hidden" id="modal_no" value="">
				<input type="hidden" id="modal_type" value="">
				<a onclick="exchange();" class="btn type05">Request</a>
				<a onClick="close_pop();" class="btn type05">Close</a>
			</div>												
		</fieldset>
	</div>      
  </div>
</div>
<!--End exchange_modal-->


<?php
	include '../footer.php'
?>

