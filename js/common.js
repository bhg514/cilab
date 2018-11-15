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


	})
	$('#btnFoldWrap').click(function(){
    	$('#daum_juso_pagemb_zip').hide()
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

// 개인정보처리방침 팝업
function perinfo(){
	window.open('/privacy.html','index','width=1060, height=700,toobar=no,scrollbars=yes,menubar=no,status=no,directories=no');
}

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