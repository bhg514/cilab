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
			    if(data==1){
			    	location.reload();
			    }else{
			        alert("error");                
			    }
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
			    if(data==1){
			    	location.reload();
			    }else{
			        alert("error");                
			    }
			}
		});

   });

   $('#list_del').click(function(){

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