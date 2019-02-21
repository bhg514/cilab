$(document).ready(function() { 
	var url_string = window.location.href
	var url = new URL(url_string);
	var p_name = url.searchParams.get("p_name");
	var category = url.searchParams.get("category");
	var p_status = url.searchParams.get("p_status");

	if(p_name!=null){
		$("#search_input").val(p_name)
		$("#search_select").val("p_name").attr("selected","true");
	}else if(category!=null){
		$("#search_select").val("category").attr("selected","true");
		$("#search_input").hide()
		$("#cate_sel").show()
	}else if(p_status!=null){
		$("#search_input").val(p_status)
		$("#search_select").val("p_status").attr("selected","true");
	}

	$("#search_select").change(function(){
		if($("#search_select option:selected").val()=="category"){
			$("#search_input").hide()
			$("#cate_sel").show()
		}else{
			$("#search_input").show()
			$("#cate_sel").hide()
		}
	})
	
})