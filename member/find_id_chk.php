<?php
	include_once('../common.php')
	$input_mail = $_POST['input_mail'];	
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

	$_id_mail_subject = "인증번호 입니다."; 
	$_id_mail_body = "<table cellpadding=10 cellspacing=1 bgcolor='#f8f8f8' style='margin:10;' width='550'>
			<tr>
				<td>
					<b>인증번호는 아래와 같습니다.</b><br><br>
					회언가입 요청에 의해 발송된 이메일입니다.<br>
					* 인증번호 : <b>".$P_TRADE_CODE."</b><br><br>
					회원가입시 이용하세요.<br>
				</td>
			</tr>
		</table>";
		
	
	if ( send_e_mail($input_mail,$input_mail ,$Mconfig["tx6_3"],$Mconfig["tx6_4"],$_id_mail_subject,$_id_mail_body) ) {
		echo '{"result":true, "desc":""}';
	} else {
		echo '{"result":false, "desc":""}';
	}

?>	