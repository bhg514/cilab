<?php
	include_once('../common.php');
	header ( "content-type:text/html; charset=utf-8" );

	function send_mail($order_number, $date, $order_name, $user_id, $order_hp, $order_mail, $total_price, $del_name, $del_address_total ,$del_hp){
		$input_mail = 'mijung@cilab.kr';	

		$_id_mail_subject = "=?UTF-8?B?".base64_encode("[Cilab]구매 확인")."?="; 
		$_id_mail_body = "<table cellpadding=10 cellspacing=1 bgcolor='#f8f8f8' style='margin:10;' width='550'>
				<tr>
					<td>
						<b>구매자의 입금확인이 완료되었습니다.<b><br>
						<b>상품을 발송해주세요.</b><br>
						<br>주문정보	
						<br>- 주문번호 : ".$order_number."
						<br>- 주문일 : ".$date."
						<br>- 이름 : ".$order_name."		
						<br>- ID : ".$user_id."
						<br>- 연락처 : ".$order_hp." 
						<br>- 이메일 : ".$order_mail."
						<br>
						<br>
						<br>결제정보
						<br>- 결제 금액 : ".$total_price." 
						<br>
						<br>
						<br>배송정보
						<br>- 받는사람 : ".$del_name." 
						<br>- 주소 : ".$del_address_total."
						<br>- 연락처 : ".$del_hp." 
					</td>
				</tr>
			</table>";
		$header = "Content-Type: text/html; charset=utf-8\r\n";
		$header .= "MIME-Version: 1.0\r\n";


			
		$result = mail($input_mail, $_id_mail_subject, $_id_mail_body, $header);

	}
?>
