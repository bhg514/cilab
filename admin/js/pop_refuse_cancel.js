$(document).ready(function() { 


	$('#send_msg').click(function(){
		var input_msg = $('#pop_input_text').val()
		var no = $('#no').val()
		var type = $('#type').val()

		if(input_msg==""){
			alert("내용을 입력해주세요")
			return false;
		}
		$.ajax({
			type: "POST",
			url: "../ajax/refuse_msg.php",
			cache: false,
			async: false,
			data: { 
			    input_msg : input_msg,
			    no : no,
			    type : type,			    
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