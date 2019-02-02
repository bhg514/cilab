<?php
	include_once('../common.php');
	header ( "content-type:text/html; charset=utf-8" );
	$input_mail = 'hkb514@naver.com';	

	$_id_mail_subject = "=?UTF-8?B?".base64_encode("[Cilab]구매 메일 제목")."?="; 
	$_id_mail_body = "<table cellpadding=10 cellspacing=1 bgcolor='#f8f8f8' style='margin:10;' width='550'>
			<tr>
				<td>
					<b>구매 메일 입니다</b><br>
					<br>구매 메일 내용1				
					<br>구매 메일 내용2
				</td>
			</tr>
		</table>";
	$header = "Content-Type: text/html; charset=utf-8\r\n";
	$header .= "MIME-Version: 1.0\r\n";


		
	$result = mail($input_mail, $_id_mail_subject, $_id_mail_body, $header);
?>
