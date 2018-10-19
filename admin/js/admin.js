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
		if (confirm("정말 삭제하시겠습니까??") == true){    //확인
			var chk_arr = mk_chk_no_arr();	
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
			    //location.reload();

			    
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

});

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