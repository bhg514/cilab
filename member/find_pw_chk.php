<?php
	include_once('../common.php');
	header ( "content-type:text/html; charset=utf-8" );
	$input_id = $_POST['input_id'];	
	$user_info = get_user_info_to_id($input_id);
	$to_mail = $user_info['fd_mail'];
	$_SESSION['pk_no'] = $user_info['pk_no'];

	$from_mail = "mmx001@cilab.kr";	
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
	$_SESSION['mail'] = $to_mail;
	$_SESSION['mail_code'] = $code;
	// 발생한 난수 저장 



	$_id_mail_subject = "=?UTF-8?B?".base64_encode("인증번호 입니다.")."?="; 
	$_id_mail_body = "<table cellpadding=10 cellspacing=1 bgcolor='#f8f8f8' style='margin:10;' width='550'>
			<tr>
				<td>
					<b>안녕하세요 CiLab입니다.</b><br>
					<b>인증번호는 아래와 같습니다.</b><br>
					<br>					
					* 인증번호 : <b>".$code."</b><br><br>

					감사합니다.<br>
				</td>
			</tr>
		</table>";
	$header = "Content-Type: text/html; charset=utf-8\r\n";
	$header .= "MIME-Version: 1.0\r\n";
	$header .= "Return-Path: <". $from_mail .">\r\n";
	$header .= "From: ". $nameFrom ." <". $from_mail .">\r\n";
	$header .= "Reply-To: <". $from_mail .">\r\n";


		
	$result = mail($to_mail, $_id_mail_subject, $_id_mail_body, $header, $from_mail);

	if(!$result) {
		alert("메일 전송을 실패했습니다. 잠시 후 다시 시도해주세요.", 'http://localhost/member/find_pw.php');

	}else{
		header('location:http://localhost/member/find_pw_confirm.php');
	}
?>
