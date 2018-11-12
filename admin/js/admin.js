$(document).ready(function() { 

	$('#sell_start').click(function(){

		var chk_arr = mk_chk_no_arr();	
		$.ajax({
			type: "POST",
			url: "../ajax/sell_status.php",
			cache: false,
			async: false,
			data: { 
			    arr : chk_arr,
			    type : "start"
			},
			dataType: "json",
			success: function(data) {   	        	
			    location.reload();
			}
		});
	});

	$('#sell_stop').click(function(){
		var chk_arr = mk_chk_no_arr();	
		$.ajax({
			type: "POST",
			url: "../ajax/sell_status.php",
			cache: false,
			async: false,
			data: { 
			    arr : chk_arr,
			    type : "stop"
			},
			dataType: "json",
			success: function(data) {   	        	
			    location.reload();
			    
			}
		});

    });

	$('#order_chk').click(function(){
		var chk_arr = mk_chk_no_arr();
		$.ajax({
			type: "POST",
			url: "../ajax/order_status.php",
			cache: false,
			async: false,
			data: { 
			    arr : chk_arr			    
			},
			dataType: "json",
			success: function(data) {   	        	
			    location.reload();
			    
			}
		});
	})

   	$('#list_del').click(function(){	   	
		var chk_arr = mk_chk_no_arr();	
   		if(mk_chk_no_arr.length !=0){
			if (confirm("정말 삭제하시겠습니까??") == true){    //확인
				var type = window.location.href.split('?')[0].split('admin')[1].split('/')[1]
				$.ajax({
					type: "POST",
					url: "../ajax/list_dell.php",
					cache: false,
					async: false,
					data: { 
					    arr : chk_arr,
					    type : type
					},
					dataType: "json",
					success: function(data) {   	        	
					    location.reload();
					}
				});

			}else{   //취소
				return;
			}
		}else{
			alert("체크박스를 선택하세요.");
		}
	});

	$('#chk_all').click(function(){
		if($("#chk_all").prop("checked")) { 			
			$("input[class=list_chk]").prop("checked",true); 
		} else {  
			$("input[class=list_chk]").prop("checked",false); 
		}

	});



   

    $('#search_btn').click(function(){
   		var select = document.getElementById("search_select");
   		var select_val = select.options[select.selectedIndex].value;
   		var input_val = $('#search_input').val();   		
   		
   		if(input_val!=""){
   			location.href="?"+select_val+"="+input_val;   			
   		}else{
   			location.href="?";
   		}

    });

    $('#order_search_btn').click(function(){
   		var query_string = window.location.href.split('?')[1].split('&');
   		
   		var select = document.getElementById("search_select");
   		var select_val = select.options[select.selectedIndex].value;
   		var input_val = $('#search_input').val();   		

   		var new_q_s = "?";
   		for (var i=0; i<query_string.length;i++){
   			query_string_sp =query_string[i].split('=');
			if(query_string_sp[0]=='type'){	   			
				type_val = query_string_sp[1];
				break;
			}
		}

   		if(input_val!=""){
			location.href = "?type="+type_val+"&"+select_val+"="+input_val;
	   	}else{
	   		location.href="?type="+type_val;
	   	}
    });

    $('#board_search_btn').click(function(){
   		var query_string = window.location.href.split('?')[1].split('&');
   		


   		var input_val = $('#search_input').val();   		

   		var new_q_s = "?";
   		for (var i=0; i<query_string.length;i++){
   			query_string_sp =query_string[i].split('=');
			if(query_string_sp[0]=='type'){	   			
				type_val = query_string_sp[1];
				break;
			}
		}

   		if(input_val!=""){
			location.href = "?type="+type_val+"&search="+input_val;
	   	}else{
	   		location.href="?type="+type_val;
	   	}
    });
    $('#user_search_btn').click(function(){
   		var input_val = $('#search_input').val();   		

   		if(input_val!=""){
			location.href = "?&search="+input_val;
	   	}else{
	   		location.href="?";
	   	}
    });
    

    
    $('#day_search_btn, #month_search_btn').click(function(e){
    	var start_date = $(e.target).siblings()[0].value;
    	var end_date = $(e.target).siblings()[1].value;
    	
    	location.href="?start_date="+start_date+"&end_date="+end_date;
    })

    $('#input_invoice').click(function(){
    	var chk_no_arr = mk_chk_no_arr();
    	var chk_arr = mk_chk_arr();
    	var invoice_arr = mk_invoice_arr(chk_arr);


    	$.ajax({
			type: "POST",
			url: "../ajax/order_invoice.php",
			cache: false,
			async: false,
			data: { 
			    no_arr : chk_no_arr,			    
			    invoice_arr : invoice_arr
			},
			dataType: "json",

			success: function(data) {   	        	
			    location.reload();

			    
			}
		});
    

    });

    $('#del_chk').click(function(){
		$('.wrap-loading').removeClass('display-none');
    	$.ajax({
			type: "POST",
			url: "../ajax/del_chk.php",
			cache: false,
							
			error : function(request,status,error) {
			    alert("Error!");
    		},
			success: function(data) {   	        	
		        $('.wrap-loading').addClass('display-none');
			    location.reload();
			}
		});
    });


    $('#del_finish_chk').click(function(){
		$('.wrap-loading').removeClass('display-none');
    	$.ajax({
			type: "POST",
			url: "../ajax/del_finish_chk.php",
			cache: false,
							
			error : function(request,status,error) {
			    alert("Error!");
    		},
			success: function(data) {   	        	
		        $('.wrap-loading').addClass('display-none');
			    location.reload();
			}
		});
    });

    

    $('#detail_order_chk').click(function(){
    	var no = $('#no').val();
    	$.ajax({
			type: "POST",
			url: "../ajax/detail_order_status.php",
			cache: false,
			async: false,
			data: { 
			    no : no
			},
			dataType: "text",
			error : function(request,status,error) {
			    alert("Error!");
    		},
			success: function(data) {   	        					
			    location.href ="http:\/\/"+window.location.host+"/admin/order/list.php?type=1"

			    
			}
		});

    });

    $('#show_msg').click(function(e){
    	window.name = "parentForm";			
    	var no = $(e.target).parent().siblings()[0].children[1].value
		open_win = window.open('./pop_cancel_reason.php?no='+no,'childForm','width=1060, height=700,toobar=no,scrollbars=yes,menubar=no,status=no,directories=no');	

    })

    $('#refuse_cancel').click(function(e){

    	window.name = "parentForm";			
    	var no = $(e.target).parent().siblings()[0].children[1].value
		open_win = window.open('./pop_refuse_cancel.php?no='+no,'childForm','width=1060, height=700,toobar=no,scrollbars=yes,menubar=no,status=no,directories=no');	
    })

    $('#search_select').change(function() {
    	var select_val = $('#search_select option:selected').val();
    	if(select_val==1){

    		$('.day_cal').show();
    		$('.month_cal').hide();

    	}else{
    		if($('#minical').css('display')=='block'){
    			$('#minical').hide()
    		}
    		$('.month_cal').show();
    		$('.day_cal').hide();
    	}

    })
    $('#period_select').change(function() {
    	var select_val = $('#period_select option:selected').val();
    	select_val = select_val.split('/');
    	if (select_val[1]==null)
    		location.href ="?year="+select_val[0];
    	else
    		location.href ="?year="+select_val[0]+"&month="+select_val[1];

    })
    

    $('.month_cal').click(function(){
    	$('#styles_js').remove()
    	addNewStyle('table.ui-datepicker-calendar { display: none; }')
    	//$('.ui-datepicker-calendar').hide()
    })
    $('.day_cal').click(function(){
    	$('#styles_js').remove()
    	addNewStyle('table.ui-datepicker-calendar { display: table; }')
    	//$('.ui-datepicker-calendar').show()
    })
    
    $(document).on('click', '#add_file_btn', function(event) {
    	var count = $('#add_file_btn').siblings().length +1;
        addFileForm(count);        
    });
    $(document).on('click', '.button-delete-file', function(event) {
        $(this).parent().remove();
    	var count = $('#add_file_btn').siblings().length;
        
    });

    $('#old_file_remove').click(function(){
    	$('#files_td').html("")
    	var html ='<a id="add_file_btn">파일 추가</a>';
    	$("#files_td").append(html);
    })

    $('#notice_save_btn').click(function(){ //에디터 값 저장
    	var classes = [];
    	$('#files_td div input').each(function() {
		      classes.push($(this).attr('class'));
		});
		$('#file_count').val(classes)
        $('#content_hidden').val($('#summernote').summernote('code'));
    });

    $('#save_btn').click(function(){
    	var pw = $('#pw').val();
    	var pw_re = $('#pw_re').val();
    	if(pw!=pw_re){
    		$('#wrong_pw').show();
    		return false;
    	}

    });

    $('#info_del').click(function(){
    	if (confirm("정말 삭제하시겠습니까??") == true){    //확인
    		var no = $('#no').val();
			var type = window.location.href.split('?')[0].split('admin')[1].split('/')[1];//ex. am, pm ...
			if(type=="board"){
				params = window.location.href.split('?')[1].split('&');
				for (param in params){
					param_split = params[param].split('=')
					if(param_split[0]=="type"){
						type_val = param_split[1]
						if(type_val==1) type="notice";
						else if(type_val==2) type="sw";
						else if(type_val==3) type="contents";
						break;
					}
				}
			}
			$.ajax({
				type: "POST",
				url: "../ajax/info_del.php",
				cache: false,
				async: false,
				data: { 
				    no : no,
				    type : type
				},
				dataType: "text",
				success: function(data) {   	     
					sub = window.location.href.split('admin')[1].split('/')[1]
					url = window.location.host+"/admin/"+sub+"/list.php";
					type_val = ""
					if (sub == "order" || sub=="board") {
						params = window.location.href.split('?')[1].split('&');
						for (param in params){
							param_split = params[param].split('=')
							if(param_split[0]=="type"){
								type_val = param_split[1]
								break;
							}
						}
						url +="?type="+type_val;
					}
				    location.href ="http:\/\/"+url;
				}
			});

		}else{   //취소
			return;
		}

    });

});



function addNewStyle(newStyle) {
    var styleElement = document.getElementById('styles_js');
    if (!styleElement) {
        styleElement = document.createElement('style');
        styleElement.type = 'text/css';
        styleElement.id = 'styles_js';
        document.getElementsByTagName('head')[0].appendChild(styleElement);
    }
    styleElement.appendChild(document.createTextNode(newStyle));
}



function mk_chk_no_arr(){
	var chk_count = $('.list_chk').size();
	var chk_arr = []
	for(var i=0; i<chk_count; i++){
		if($('.list_chk')[i].checked){
			chk_arr.push($($('.list_chk')[i]).siblings()[0].value)
		}
	}
	return chk_arr;

}

function mk_chk_arr(){
	var chk_count = $('.list_chk').size();
	var chk_arr = []
	for(var i=0; i<chk_count; i++){
		if($('.list_chk')[i].checked){
			chk_arr.push(i);
		}
	}
	return chk_arr;

}

function mk_invoice_arr(chk_arr){
	var invoice_arr = [];
	for(var i=0; i<chk_arr.length; i++){
		invoice_arr.push($('.input_invoice')[chk_arr[i]].value)		
	}
	return invoice_arr;

}

function addFileForm(count) {
    var html = "<div id='item_"+count+"'>";
    html += "<input type='file' name='file_"+count+"' class='file_"+count+"'/>";
    html += "<a class='button-delete-file'>삭제</a></div>";    
    $("#files_td").append(html);
}

