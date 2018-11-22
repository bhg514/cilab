<!-- HTML -->
<!-- jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
<!-- iamport.payment.js -->
<script type="text/javascript" src="https://cdn.iamport.kr/js/iamport.payment-1.1.5.js"></script>
<button onclick="requestPay()">결제하기</button>

<script>
function requestPay() {
	var IMP = window.IMP; // 생략해도 괜찮습니다.
	IMP.init("imp66859917"); // "imp00000000" 대신 발급받은 "가맹점 식별코드"를 사용합니다.

    // IMP.request_pay(param, callback) 호출
    IMP.request_pay({ // param
        pg: "html5_inicis",
        pay_method: "vbank",
        merchant_uid: "1811160011",
        name: "결제테스트",
        amount: 100,
        buyer_email: "bhk514@hanmail.net",
        buyer_name: "홍길동",
        buyer_tel: "010-4242-4242",
        buyer_addr: "서울특별시 강남구 신사동",
        buyer_postcode: "01181"
    }, function (rsp) { // callback
        if (rsp.success) {
            jQuery.ajax({
	            url: "http://localhost/test1.php", // 가맹점 서버
	            method: "POST",
	            headers: { "Content-Type": "application/json" },
	            data: {
	                imp_uid: rsp.imp_uid,
	                merchant_uid: rsp.merchant_uid
	            }
	        }).done(function (data) {
				switch(data.status) {
	                case "vbankIssued":
	                    alert('가상계좌!!');
	                    break;
	                case "success":
	                    alert('결제 완료!!');
	                    break;
	            }
	        })
        } else {
        	alert("결제에 실패하였습니다. 에러 내용: " +  rsp.error_msg);
        }
    });
}
</script>