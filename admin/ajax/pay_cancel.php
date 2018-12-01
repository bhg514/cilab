<?php
	include_once('../../common.php');	
	require_once(dirname(__DIR__).'../../config/iamport.php');
	$iamport = new Iamport('3711648782051850', 'njUZPJD8vJha87TYkVvwL6xoIlYCk9mHshGh0jpv3GFcNzb8vHEgNbFvwE8QNuygLexLyXhCEWPsw0B1');

	$no = $_POST['no'];
	$query = "select fd_merchant_uid, fd_imp_uid from tb_order where pk_no = ".$no;

	$result = query_send($query);
	$info = mysqli_fetch_array($result);

	$result = $iamport->cancel(array(
		'imp_uid'		=> $info['fd_imp_uid'], 		//merchant_uid에 우선한다
		'merchant_uid'	=> $info['fd_merchant_uid'], 	//imp_uid 또는 merchant_uid가 지정되어야 함
		'amount' 		=> 0,					//amount가 생략되거나 0이면 전액취소. 금액지정이면 부분취소(PG사 정책별, 결제수단별로 부분취소가 불가능한 경우도 있음)
		'reason'		=> '환불 진행',				//취소사유
	));
	if ( $result->success ) {
		echo 'success';			
	}else{
		echo 'error';
	}
