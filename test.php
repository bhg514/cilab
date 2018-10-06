<?php 
	include_once('common.php');
	$m_mail = "bhk514@hanmail.net";
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

	$_SESSION['mail_code'] = $code;
	// 발생한 난수 저장 

/*	$_id_mail_subject = "인증번호 입니다."; 
	$_id_mail_body = "<table cellpadding=10 cellspacing=1 bgcolor='#f8f8f8' style='margin:10;' width='550'>
			<tr>
				<td>
					<b>인증번호는 아래와 같습니다.</b><br><br>
					회언가입 요청에 의해 발송된 이메일입니다.<br>
					* 인증번호 : <b>".$code."</b><br><br>
					회원가입시 이용하세요.<br>
				</td>
			</tr>
		</table>";
	
	
	if ( send_mail_with_file($m_mail, 'CiLab',$m_mail ,$_id_mail_subject,$_id_mail_body) ) {
		echo '{"result":true, "desc":""}';
	} else {
		echo '{"result":false, "desc":""}';
	}
*/
	$message = "test";
	$emailFrom = "bhk514@hanmail.net"; // match this to the domain you are sending email from
	$email = "bhk514@hanmail.net";
	$subject = "Email Request";
	$headers = 'From:' . $emailFrom . "\r\n";
	$headers .= "Reply-To: " . $email . "\r\n";
	$headers .= "Return-path: " . $email;
	mail($email, $subject, $message, $headers);

/*	function send_mail_with_file($from_email, $from_name, $to_email, $subject2, $body) {    
		$to      = 'bhk514@hanmail.net';
		$subject = $subject2;
		$message = $body;
		$headers = 'From: bhk514@hanmail.net' . "\r\n" .
		    'Reply-To: bhk514@hanmail.net' . "\r\n" .
		    'X-Mailer: PHP/' . phpversion();

		if(!mail($to, $subject, $message, $headers)){
			return false;
		}
		return true;

	    /*if (strlen ( $to_email ) == 0)
	        return 0;
	    $mailheaders = "From: $from_name<$from_email> \r\n";
	    $mailheaders .= "Reply-To: $from_name<$from_email>\r\n";
	    $mailheaders .= "Return-Path: $from_name<$from_email>\r\n";  
	    if (! mail ( $to_email, $subject, $body, $mailheaders )) {
	        return false;
	    }
	    return true;
	}*/


?>
