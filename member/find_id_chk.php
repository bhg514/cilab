<?php
	include_once('../common.php');
	header ( "content-type:text/html; charset=utf-8" );
	$input_mail = $_POST['input_mail'];	
	/*$from_mail = "promise86@hanmail.net";	*/
	$nameFrom = "CiLab";
	$count = 1;
	$code =chr(mt_rand(65, 90));
	while($count <6 ){
		$chk =mt_rand(0, 1);
		if($chk == 0){
			$code.=mt_rand(0, 9);
		}else{
			$code.=chr(mt_rand(65, 90));
		}
		$count++;
	}
	$_SESSION['input_mail'] = $input_mail;
	$_SESSION['mail_code'] = $code;
	// 발생한 난수 저장 

	$_id_mail_subject = "=?UTF-8?B?".base64_encode("[Cilab]Verification code")."?="; 
	$_id_mail_body = "<table cellpadding=10 cellspacing=1 bgcolor='#f8f8f8' style='margin:10;' width='550'>
			<tr>
				<td>
					<b>The verification code is as follows.</b><br>
					<br>					
					* Verification code : <b>".$code."</b><br><br>

					Thank you.<br>
				</td>
			</tr>
		</table>";
	$header = "Content-Type: text/html; charset=utf-8\r\n";
	$header .= "MIME-Version: 1.0\r\n";
	$header .= "Return-Path: <". $from_mail .">\r\n";
/*	$header .= "From: ". $nameFrom ." <". $from_mail .">\r\n";*/
	$header .= "Reply-To: <". $from_mail .">\r\n";


		
	$result = mail($input_mail, $_id_mail_subject, $_id_mail_body, $header, $from_mail);

	if(!$result) {
		alert("Failed to send mail.\nPlease try again in a few minutes.", "https://".$http_host."/member/find_id.php");

	}else{
		header("location:https://".$http_host."/member/find_id_confirm.php");
	}
?>
