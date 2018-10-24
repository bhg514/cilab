$(document).ready(function() { 


	$('#send_msg').click(function(){
		var input_msg = $('#input_msg').val()
		var no = $('#no').val()
		if(input_msg==""){
			return false;
		}
		$.ajax({
			type: "POST",
			url: "../ajax/refuse_msg.php",
			cache: false,
			async: false,
			data: { 
			    input_msg : input_msg,
			    no : no			    
			},
			dataType: "text",
			error : function(request,status,error) {
			    alert("Error!");
    		},
			success: function(data) {   
				opener.parent.location.reload();
				window.close();
			    
			}
		});		

	});




})