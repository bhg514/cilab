$(document).ready(function() { 

	$('#sell_start').click(function(){

		var chk_arr = mk_chk_arr();	
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
		var chk_arr = mk_chk_arr();	
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
		var chk_arr = mk_chk_arr();
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
			var chk_arr = mk_chk_arr();	
			$.ajax({
				type: "POST",
				url: "../ajax/product_del.php",
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

});

function mk_chk_arr(){
	var chk_count = $('.list_chk').size();
	var chk_arr = []
	for(var i=0; i<chk_count; i++){
		if($('.list_chk')[i].checked){
			chk_arr.push($($('.list_chk')[i]).siblings()[0].value)
		}
	}
	return chk_arr;

}