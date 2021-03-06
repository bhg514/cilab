<?php
require_once(dirname(__DIR__).'/config/iamport.php');
include_once("../common.php");
$ex_rate = ex_rate();
$iamport = new Iamport('3711648782051850', 'njUZPJD8vJha87TYkVvwL6xoIlYCk9mHshGh0jpv3GFcNzb8vHEgNbFvwE8QNuygLexLyXhCEWPsw0B1');

$imp_uid = $_GET['imp_uid'];
$merchant_uid = $_GET['merchant_uid'];
$product_info = $_GET['product_info'];

#1. imp_uid 로 주문정보 찾기(아임포트에서 생성된 거래고유번호)
$result = $iamport->findByImpUID($imp_uid); //IamportResult 를 반환(success, data, error)

if ( $result->success ) {
	/**
	*	IamportPayment 를 가리킵니다. __get을 통해 API의 Payment Model의 값들을 모두 property처럼 접근할 수 있습니다.
	*	참고 : https://api.iamport.kr/#!/payments/getPaymentByImpUid 의 Response Model
	*/
	$payment_data = $result->data;
	/*
	echo '## 결제정보 출력 ##';
	echo '가맹점 주문번호 : ' 	. $payment_data->merchant_uid;
	echo '결제상태 : ' 		. $payment_data->status;
	echo '결제금액 : ' 		. $payment_data->amount;
	echo '결제수단 : ' 		. $payment_data->pay_method;
	echo '결제된 카드사명 : ' 	. $payment_data->card_name;
	echo '결제 매출전표 링크 : '	. $payment_data->receipt_url;
	*/
	/**
	*	IMP.request_pay({
	*		custom_data : {my_key : value}
	*	});
	*	와 같이 custom_data를 결제 건에 대해서 지정하였을 때 정보를 추출할 수 있습니다.(서버에는 json encoded형태로 저장합니다)
	*/
	#echo 'Custom Data :'	. $payment_data->getCustomData('my_key');

	# 내부적으로 결제완료 처리하시기 위해서는 (1) 결제완료 여부 (2) 금액이 일치하는지 확인을 해주셔야 합니다.
	$amount_paid = 0;
	for($k=0; $k<count($product_info['product_no']); $k++){
		$query = "select fd_option, fd_price from tb_product where pk_no = '".$product_info['product_no'][$k]."'";
		$result = query_send($query);	
	    $info = mysqli_fetch_array($result);
	    if($product_info['option'][$k]!=""){
	    	#무게(160g~169g)^-1000||무게(170g~179g)^0||무게(180g~189g...
		    $options = explode('||',$info['fd_option']);
		    for($i=0; $i<count($options);$i++){
		    	#무게(160g~169g)^-1000
		        $option = explode('^', $options[$i]);
		        if($option[0]==$product_info['option'][$k]){
		        	#-1000
		            $option_price = $option[1];
		        }
		    }
		    $tmp_paid = ($info['fd_price'] + $option_price) * $product_info['count'][$k] ;
		}else{
			$tmp_paid = $info['fd_price'] * $product_info['count'][$k] ;
		}
		$amount_paid = $amount_paid + $tmp_paid;
	}
	$query = 'SELECT fd_start, fd_end, fd_fee from tb_del_fee';
	$del_arr = [];
	$result = query_send($query);
	while($re_val = mysqli_fetch_array($result)){			
		if($amount_paid > $re_val['fd_start']*$ex_rate && $amount_paid <= $re_val['fd_end']*$ex_rate){
			$amount_paid = $amount_paid + $re_val['fd_fee'];			
			break;
		}
	}
	$return_val=new stdClass();
	if ( $payment_data->status === 'paid' && $payment_data->amount === $amount_paid ) {
		//TODO : 결제성공 처리
		$return_val->msg = 'success';
		$return_val->imp_uid = $imp_uid;
		$return_val->merchant_uid = $merchant_uid;
		
	}else{
		$result = $iamport->cancel(array(
			'imp_uid'		=> $imp_uid, 		//merchant_uid에 우선한다
			'merchant_uid'	=> $merchant_uid, 	//imp_uid 또는 merchant_uid가 지정되어야 함
			'amount' 		=> 0,					//amount가 생략되거나 0이면 전액취소. 금액지정이면 부분취소(PG사 정책별, 결제수단별로 부분취소가 불가능한 경우도 있음)
			'reason'		=> '결제 금액 위조',				//취소사유
		));
		if ( $result->success ) {
			$return_val->msg = 'forgery';			
		}else{
			$return_val->msg = 'forgery_error';
			$return_val->imp_uid = $imp_uid;
			$return_val->merchant_uid = $merchant_uid;
		}

	}
} else {
	error_log($result->error['code']);
	error_log($result->error['message']);
}

echo json_encode($return_val);