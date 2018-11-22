$(document).ready(function(){
	//mouse Hover
	$("").hover(function(){
		var temp2 = $(this).find("img").attr("src").replace(".png", "on.png");
		$(this).find("img").attr("src", temp2);
	}, function(){
		temp2 = $(this).find("img").attr("src").replace("on.png", ".png");
		$(this).find("img").attr("src", temp2);
	});
	
	/*메뉴 active*/
	var newURL = window.location.pathname;
	//console.log(newURL);
	
	if(newURL.indexOf("introWD") != -1){
		$("#cssmenu > ul > li").removeClass("active");
		$("#cssmenu > ul > li:nth-child(1)").addClass("active");
	}else if(newURL.indexOf("store") != -1){
		$("#cssmenu > ul > li").removeClass("active");
		$("#cssmenu > ul > li:nth-child(2)").addClass("active");
	}else if(newURL.indexOf("list") != -1 || newURL.indexOf("detail") != -1 || newURL.indexOf("qna") != -1){
		$("#cssmenu > ul > li").removeClass("active");
		$("#cssmenu > ul > li:nth-child(3)").addClass("active");
	}else if(newURL.indexOf("introCilab") != -1){
		$("#cssmenu > ul > li").removeClass("active");
		$("#cssmenu > ul > li:nth-child(4)").addClass("active");
	}else{
		$("#cssmenu > ul > li").removeClass("active");
	}
	
	$(".neographBoard").click(function(){
		$("#clientBoard").hide();
		$("#neographBoard").show();
		$(".clientBoard").parent().removeClass();
		$(".neographBoard").parent().addClass("on");
	});
	$(".clientBoard").click(function(){
		$("#neographBoard").hide();
		$("#clientBoard").show();
		$(".neographBoard").parent().removeClass();
		$(".clientBoard").parent().addClass("on");
	});

	$("#neographBoard > li > a").click(function(){
		$("#neographBoard > li > ul").hide();
		$("#neographBoard > li").removeClass();
		$(this).parent().addClass("on");
		$(this).parent().children("ul").slideToggle(200);
	});
	$("#clientBoard > li > a").click(function(){
		$("#clientBoard > li > ul").hide();
		$("#clientBoard > li").removeClass();
		$(this).parent().addClass("on");
		$(this).parent().children("ul").slideToggle(200);
	});
	
	$(".mainPeopleIn").click(function(){
		$(".mainPeopleInner .out").hide();
		$(".mainPeopleInner .in").show();
		$(".mainPeopleOut").parent().removeClass();
		$(".mainPeopleIn").parent().addClass("on");
	});
	$(".mainPeopleOut").click(function(){
		$(".mainPeopleInner .in").hide();
		$(".mainPeopleInner .out").show();
		$(".mainPeopleIn").parent().removeClass();
		$(".mainPeopleOut").parent().addClass("on");
	});

	var tmp = document.body.scrollHeight;
	$(".layerBox").css({
		"height" : tmp
	});
	$(".mobileMenuBtn").click(function(){
		$(".mainLeft").show();
		$(".utilWrap").show();
		$(".mobileMenuBtnClose").show();
		$(".layerBox").show();
	});

	$(".mobileMenuBtnClose").click(function(){
		$(".mainLeft").hide();
		$(".utilWrap").hide();
		$(".mobileMenuBtnClose").hide();
		$(".layerBox").hide();
	});
	
	$(".layerBox").click(function(){
		$(".mainLeft").hide();
		$(".utilWrap").hide();
		$(".mobileMenuBtnClose").hide();
		$(this).hide();
	});


	$('#option_select').change(function(){
		var select_val = $('#option_select option:selected').attr('name');
		var select_price = $('#option_select option:selected').val();
		var select_count = $('#select_count').val();
		var del_fee = Number(uncomma($('#del_fee').text()));
		$('#select_title').prop("selected", true);
		$('#select_title').val(select_price);
		$('#select_name').val(select_val);
		$('#select_price').val(select_price);		
		$('#select_title').text(select_val);
		if(select_count!=0){
			var total = numberWithCommas(select_price*select_count +del_fee);
			$('#total_price').text(total);
		}
	});


	$('#select_count').change(function(){
		var select_price = $('#select_title').val();
		if (select_price==null) select_price = Number(uncomma($('#pro_price').text()))
		var select_count = $('#select_count').val();
		var del_fee = Number(uncomma($('#del_fee').text()));
		if(select_price!=0){
			var total = numberWithCommas(select_price*select_count +del_fee);
			$('#total_price').text(total);
		}
	});
	
	/*수량 +/-*/
	$('.bt_up').click(function(){ 
	    var n = $('.bt_up').index(this);
	    var num = $("#select_count:eq("+n+")").val();
	    num = $("#select_count:eq("+n+")").val(num*1+1); 
	    $('#select_count').change();
	  });
	  $('.bt_down').click(function(){ 
	    var n = $('.bt_down').index(this);
	    var num = $("#select_count:eq("+n+")").val();
	    if(num > 1){
	    	num = $("#select_count:eq("+n+")").val(num*1-1);
	    	$('#select_count').change();
	    }
	  });

	$('.pro_detail_sub').click(function(e){
		var click_img = e.target.src;		
		pd_main_img.src = click_img;
		
	})

	$('#buy_btn').click(function(){
		if($('#total_price').text()==0){
			alert("수량 및 옵션을 선택해주세요.");
			return false;
		}
	})
	$('#store_pur_btn').click(function(){
		var return_chk=0
		if($('#order_name').val()==""){
			return_chk = 1
			$('#label_order_name').show()
		}else
			$('#label_order_name').hide()

		if($('#order_hp').val()==""){
			return_chk = 1
			$('#label_order_hp').show()
		}else
			$('#label_order_hp').hide()

		if($('#order_mail').val()==""){
			return_chk = 1
			$('#label_order_mail').show()
		}else
			$('#label_order_mail').hide()

		if($('#del_name').val()==""){
			return_chk = 1
			$('#label_name').show()
		}else
			$('#label_name').hide()

		if($('#add_zip').val()=="" || $('#addr1').val()=="" || $('#addr2').val()==""){
			return_chk = 1
			$('#label_addr').show()
		}else
			$('#label_addr').hide()

		if($('#del_hp').val()==""){
			return_chk = 1
			$('#label_hp').show()
		}else
			$('#label_hp').hide()

		if($('#pur_chk').is(":checked")==false){
			return_chk = 1
			$('#label_chk').show()
		}else
			$('#label_chk').hide()
		
		if(return_chk==1)
			return false;
		pay_pop()
	})
	$('#btnFoldWrap').click(function(){
    	$('#daum_juso_pagemb_zip').hide()
    })
	$('#terms_sel').change(function(){
		var select_terms = $('#terms_sel option:selected').val();
		if(select_terms ==1){
			window.open('/privacy.html','index','width=1060, height=700,toobar=no,scrollbars=yes,menubar=no,status=no,directories=no');
		}else{
			window.open('/TOS.html','index','width=1060, height=700,toobar=no,scrollbars=yes,menubar=no,status=no,directories=no');
		}
		$('#terms_sel').val('0').prop('selected', true)
	})

});

// mouse Hover
function mmover(obj) {
	obj.src = obj.src.replace(".png","on.png");
}
function mmout(obj) {
	obj.src = obj.src.replace("on.png",".png");
}

//tab
function tab(name, tot, num) {
	var obj;
	for (var z=1; z<=tot; z++){
		obj = document.getElementById(name + z);
		obj.style.display="none";
		if (z == num){
			obj.style.display="block";
		}
	}
}

// 기본 팝업
function popup(url,id,width,height) {
	window.open(url,id,"toolbar=no,location=no,status=no,menubar=no,scrollbars=no,left=0, top=0, resizable=no,width=" + width + "px,height=" + height + "px");
}

/*// 개인정보처리방침 팝업
function perinfo(){
	window.open('/TOS.html','index','width=1060, height=700,toobar=no,scrollbars=yes,menubar=no,status=no,directories=no');
}*/

//숫자 콤마
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}


function del_lookup(url){
	window.open(url,'childForm','width=800, height=500,toobar=no,scrollbars=yes,menubar=no,status=no,directories=no');
}

//금액 콤마 제거
function uncomma(str) {
    str = String(str);
    return str.replace(/[^\d]+/g, '');
}


function pop_order(no,type){
	window.name = "parentForm";	
	if(type == "order")
		open_win = window.open('./pop_order.php?no='+no,'childForm','width=730, height=730,toobar=no,scrollbars=yes,menubar=no,status=no,directories=no');	
	else if(type=="exchange")
		open_win = window.open('./pop_exchange.php?no='+no,'childForm','width=730, height=730,toobar=no,scrollbars=yes,menubar=no,status=no,directories=no');	
	else if(type=="refund")
		open_win = window.open('./pop_refund.php?no='+no,'childForm','width=730, height=730,toobar=no,scrollbars=yes,menubar=no,status=no,directories=no');	

}

function pay_pop(){
	product_name = $('#product_name').val()
	amount = Number($('#del_fee').val()) + Number($('#price').val())
	buyer_name = $('#order_name').val()
	buyer_mail = $('#order_mail').val()
	buyer_tel = $('#order_hp').val()
	buyer_addr = $('#reg_mb_addr1').val()+$('#reg_mb_addr2').val()+$('#reg_mb_addr3').val()+$('#reg_mb_addr4').val()
	buyer_postcode = $('#reg_mb_zip').val()
	no = $('#no').val()
	count = $('#product_count').val()
	option_name = $('#product_option').val()

	product_info={"no":no,"count":count,"option":option_name,"amount":amount}

	var IMP = window.IMP; // 생략해도 괜찮습니다.
	IMP.init("imp66859917"); // "imp00000000" 대신 발급받은 "가맹점 식별코드"를 사용합니다.

    // IMP.request_pay(param, callback) 호출
    IMP.request_pay({ // param
        pg: "html5_inicis",
        pay_method: "card",
        merchant_uid: 'merchant_' + new Date().getTime(),
        name: product_name,
        amount: amount,
        buyer_email: buyer_mail,
        buyer_name: buyer_name,
        buyer_tel: buyer_tel,
        buyer_addr: buyer_addr,
        buyer_postcode: buyer_postcode
    }, function (rsp) { // callback
        if (rsp.success) {
            jQuery.ajax({
	            url: "../ajax/pay_chk.php", // 가맹점 서버
	            method: "POST",
	            headers: { "Content-Type": "application/json" },
	            data: {
	                imp_uid: rsp.imp_uid,
	                merchant_uid: rsp.merchant_uid,
	                product_info: product_info
	            }
	        }).done(function (data) {
	        	data = JSON.parse(data)
	        	if(data.msg=="success"){
	        		$('#imp_uid').val(data.imp_uid)
	        		$('#merchant_uid').val(data.merchant_uid)
	        		
	        		document.forms["sotre_form"].submit()						        		
	        	}else if(data.msg=="forgery"){
	        		alert("결제에 실패하였습니다. 에러 내용: 결제금액 위조가 감지되었습니다.");
	        	}else if(data.msg=="forgery_error"){
	        		alert("결제에 실패하였습니다. 에러 내용: 결제금액 위조가 감지되었습니다.\n관리자 확인 후 결제 취소처리 될 예정입니다.");
	        		$('#imp_uid').val(data.imp_uid)
	        		$('#merchant_uid').val(data.merchant_uid)

	        		document.forms["sotre_form"].submit()
	        	}
	        })
        } else {
        	alert("결제에 실패하였습니다. 에러 내용: " +  rsp.error_msg);
        }
    });
}