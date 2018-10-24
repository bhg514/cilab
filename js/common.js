$(document).ready(function(){
	//mouse Hover
	$("").hover(function(){
		var temp2 = $(this).find("img").attr("src").replace(".png", "on.png");
		$(this).find("img").attr("src", temp2);
	}, function(){
		temp2 = $(this).find("img").attr("src").replace("on.png", ".png");
		$(this).find("img").attr("src", temp2);
	});
	
	
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




