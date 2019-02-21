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
		var product_price = $('#product_price').val()
		var select_count = $('#select_count').val();
		var del_fee = Number(uncomma($('#del_fee').text()));
		$('#select_title').prop("selected", true);
		$('#select_title').val(select_price);
		$('#select_name').val(select_val);
		$('#select_price').val(select_price);		
		$('#select_title').text(select_val);
		if(select_count!=0){
			price_update(select_price,select_count,del_fee);
		}
	});


	$('#select_count').change(function(){
		var max = Number($('#select_count')[0].max)
	    var num = Number($("#select_count").val());
		if(num>max){
			$("#select_count").val(max);
		}
		if ($('#option_select option:selected').val() != "옵션을 선택하세요"){
			var select_price = $('#select_title').val();
			var product_price = $('#product_price').val()
			if (select_price==null) 
				select_price = Number(product_price)
			var select_count = $('#select_count').val();
			var del_fee = Number(uncomma($('#del_fee').text()));
			if(select_price!=0){
				price_update(select_price,select_count,del_fee);
			}
			
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
			alert("Please select quantity and options.");
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
		/*document.forms["store_form"].submit()*/
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

	$("input[type=checkbox]").click(function(e){
		var ex_rate = $('#ex_rate').val()
		if (e.target.id == 'all_select'){
			if($("#all_select").prop("checked")) { 			
				$("input[class=cart_checkbox]").prop("checked",true); 
			} else {  
				$("input[class=cart_checkbox]").prop("checked",false); 
			}
		}
		var chk_arr = $('"input[class=cart_checkbox]":checked').siblings().find('.product_price');
		var product_total = 0;	
		for(var i=0; i< chk_arr.length; i++){
			product_total = product_total + Number(uncomma($(chk_arr[i]).text()));
		}
		$('#chk_price').text(numberWithCommas(product_total)+"("+numberWithCommas((product_total/ex_rate).toFixed(2))+"$)");
		$('#chk_del').text(0);
		$('#total_order_price').text(0);
		if(product_total>0){
			for(var i=0; i<del_arr.length; i++){
				if(Math.floor(del_arr[i][0]*ex_rate)<product_total && Math.floor(del_arr[i][1]*ex_rate)>=product_total){
					$('#chk_del').text(numberWithCommas(del_arr[i][2])+"("+numberWithCommas((del_arr[i][2]/ex_rate).toFixed(2))+"$)")
					$('#total_order_price').text(numberWithCommas(product_total+Number(del_arr[i][2]))+"("+numberWithCommas(((product_total+Number(del_arr[i][2]))/ex_rate).toFixed(2))+"$)")
					break;
				}
			}
		}
		$('#chk_count').text(chk_arr.length);

	})

	$('#del_select').click(function(){
		var checked = $('"input[class=cart_checkbox]":checked');
		var chk_str = [];
		if(checked.length>0){
			for (var i=0; i<checked.length; i++){
				chk_str.push('"'+checked[i].id+'"');
			}
			chk_str = chk_str.join(',');
			$.ajax({
				type: "POST",
				url: "../ajax/cart_del.php",
				cache: false,
				async: false,
				data: { 			    
				    no : chk_str
				},
				dataType: "text",
				success: function(data) {   	        	
				    location.reload();			    
				}
			});
		}else{
			alert("Please check item to delete");
		}

	})

	$('#order_btn').click(function(){
		//$($('"input[class=cart_checkbox]":checked').siblings().find('.pro_name')[0]).text()
		//$(chk.siblings().find('.pro_name')[0]).text()

		var chk = $('"input[class=cart_checkbox]":checked');
		var option = []
		var count = []
		var price = []
		var name = []
		var id = []
		var product_no = []

		for(var i=0; i<chk.length; i++){
			option.push($(chk.siblings().find('.option')[i]).text());
			count.push($(chk.siblings().find('.count')[i]).text());
			price.push($(chk.siblings().find('.product_price')[i]).text());
			name.push($(chk.siblings().find('.pro_name')[i]).text());
			id.push($('"input[class=cart_checkbox]":checked')[i].id);
			product_no.push($(chk.siblings('.product_no')[i]).val());

		}
		

		var chk_info = {'id':id,'option':option, 'count':count, 'price':price, 'name':name, 'product_no':product_no};
		$('#chk_info').val(JSON.stringify(chk_info));
		document.forms["cart_order_form"].submit()

	})

});
function close_pop(flag) {
	$('#exchange_modal').hide();
};
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
    return str.replace(/,/gi, '');
}


function pop_order(no,type){
	window.name = "parentForm";	
		
	if(type == "order"){
		open_win = window.open('./pop_order.php?no='+no,'childForm','width=730, height=730,toobar=no,scrollbars=yes,menubar=no,status=no,directories=no');	
	}else{ 
		$('#modal_textarea').val("")
		$('#modal_hp1').val("")
		$('#modal_hp2').val("")
		$('#modal_hp3').val("")
		$('#modal_no').val(no);
		$('#modal_type').val(type);
		if(type=="exchange"){
			$('#exchange_modal').show();
		}else if(type=="refund"){
			$('#exchange_modal').show();
		}else if(type=="exchange_reason"){
			open_win = window.open('./pop_reason.php?no='+no,'childForm','width=1050, height=300,toobar=no,scrollbars=yes,menubar=no,status=no,directories=no');	
			
		}else if(type=="refund_reason"){
			open_win = window.open('./pop_reason.php?no='+no,'childForm','width=1050, height=300,toobar=no,scrollbars=yes,menubar=no,status=no,directories=no');	
			
		}
	}
}

function pay_pop(){
	product_name = $('#product_name').val()
	amount = Number($('#del_fee').val()) + Number($('#total_price').val())
	buyer_name = $('#order_name').val()
	buyer_mail = $('#order_mail').val()
	buyer_tel = $('#order_hp').val()
	buyer_addr = $('#reg_mb_addr1').val()+$('#reg_mb_addr2').val()+$('#reg_mb_addr3').val()+$('#reg_mb_addr4').val()
	buyer_postcode = $('#reg_mb_zip').val()
/*
	no = $('#no').val()
	count = $('#product_count').val()
	option_name = $('#product_option').val()*/
	/*product_info={"no":no,"count":count,"option":option_name,"amount":amount}*/
	product_info = JSON.parse($('#infos').val())

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
	        		
	        		document.forms["store_form"].submit()						        		
	        	}else if(data.msg=="forgery"){
	        		alert("Payment failed. \nError description: Forged payment amount has been detected.");
	        	}else if(data.msg=="forgery_error"){
	        		alert("Payment failed. \nError description: Forged payment amount has been detected.\nThe payment will canceled after the administrator has confirmed it.");
	        		$('#imp_uid').val(data.imp_uid)
	        		$('#merchant_uid').val(data.merchant_uid)

	        		document.forms["store_form"].submit()
	        	}
	        })
        } else {
        	alert("Payment failed. \nError description: " +  rsp.error_msg);
        }
    });
}

function purchase_conf(no){
	if (confirm("Would you like to confirm your purchase?\nAfter purchase confirmation, exchange / refund is not possible.") == true){
		
		$.ajax({
			type: "POST",
			url: "../ajax/purchase_conf.php",
			cache: false,
			async: false,
			data: { 			    
			    no : no
			},
			dataType: "text",
			success: function(data) {   	        	
			    location.reload();			    
			}
		});

	}else{
		return;
	}

}

function exchange(){
	var reason = $('#modal_textarea').val()
	var hp1 = $('#modal_hp1').val()
	var hp2 = $('#modal_hp2').val()
	var hp3 = $('#modal_hp3').val()

	var no = $('#modal_no').val()
	var modal_type = $('#modal_type').val()

	if(reason!="" && hp1!="" && hp2!="" && hp3!=""){
		if(modal_type=="exchange"){
			msg = "Would you really exchange it??"
		}else if(modal_type=="refund"){
			msg = "Would you really refund it?"
		}
		if (confirm(msg) == true){
			
			$.ajax({
				type: "POST",
				url: "../ajax/exchange.php",
				cache: false,
				async: false,
				data: { 			    
				    reason : reason,
				    phone : hp1+"-"+hp2+"-"+hp3,
				    no : no,
				    modal_type : modal_type,
				},
				dataType: "text",
				success: function(data) {   	        	
				    location.reload();			    
				}
			});

		}else{
			return;
		}
	}else{
		if(reason==""){
			alert("Please enter the reason.")
		}else{
			alert("Please enter your phone number.")
		}
	}

}

function price_update(select_price,select_count,del_fee){
	var ex_rate = $('#ex_rate').val();
	var total = uncomma(select_price)*select_count +del_fee;	
	$('#dollar').text(numberWithCommas((total/ex_rate).toFixed(2)));
	$('#without_del').val(uncomma(select_price)*select_count);			
	$('#total_price').text(numberWithCommas(total));
}


function add_cart(){
	var count = $('#select_count').val();
	var option = $('#select_name').val();
	var total = $('#without_del').val();
	var no = $('#pro_no').val();

	if (total!=0){		
		$.ajax({
			type: "POST",
			url: "../ajax/add_cart.php",
			cache: false,
			async: false,
			data: { 			    
			    no : no,
			    count : count,
			    option : option,
			    total : total
			},
			dataType: "text",
			success: function(data) {   
				if (data=="false"){
					alert('Please try again after login.')
				}else{
			    	alert('success');			    
				}        	
			}
		});

	}else{
		alert("Please select quantity or option and try again.");
	}

}