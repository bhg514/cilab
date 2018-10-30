$(document).ready(function() { 
	/*이전데이터가 있다면 값 넣기*/
	var pre_option =  opener.document.getElementById("option_input").value;	
	if( pre_option != ""){
		var option_split = pre_option.split("||")
		var option_arr= new Array()
		for (var i=0; i<option_split.length ; i++){
			option_name = option_split[i].split('^')[0]			
			option_price = option_split[i].split('^')[1]
			option_arr[i] = new Array(option_name,option_price);
		}
		

		
		for (var i=0; i<option_arr.length ; i++){	
			if(i!=0) add_option_btn();						
			insert_val(option_arr,i);		
			
		}

	}



})

function insert_val(arr,for_count){
	$('#tbody').children().eq(for_count).children().eq(0).find('.option_name').val(arr[for_count][0])
	if(arr[for_count][1]!=null) $('#tbody').children().eq(for_count).children().eq(1).find('.option_price')[0].value=arr[for_count][1];
}
function add_option_btn(){
	if($('#tbody').children().length<3){
		var html =  '<tr >'+
					'<td scope="row">'+
					'<input type="text" class="option_name" placeholder="색상">'+
					'<input type="button" class="add_option_btn" value="+" onClick="add_option_btn()">'+
					'<input type="button" value="-" onClick="remove_option_btn(this)">'+
					'</td>'+
					'<td>'+
					'<table>'+
					'<tr>'+
					'<td>'+
					'<input type="text" class="option_price">원'+					
					'</td>'+
					'</tr>'+
					'</table>'+
					'</td>'+
					'</tr>';


		$('#tbody').append(html);
	}else{
		alert("옵션은 최대 3개까지 입니다.");
	}
}

function remove_option_btn(e){
	$(e).parents().eq(1).remove();
}




function form_data(){
	// 전송 데이터 포맷 : 옵션명^추가금액||옵션명^추가금액||옵션명^추가금액||옵션명^추가금액
	// ex. 가^1000||나^3000||다^2000	

	var option_len = $('#tbody').children().length // 옵션 수 
	var form_data = ""
	for (var i=0; i<option_len; i++){
		option_name = $('#tbody').children().eq(i).children().eq(0).find('.option_name').val();	

		option_price = $('#tbody').children().eq(i).children().eq(1).find('.option_price')[0].value

		
			
		if(option_name==""){
			alert((i+1)+"번째 옵션명에 값을 입력해주세요. ")
			return false;
		}else if(option_price==""){
			alert((i+1)+"번쨰 옵션의 값을 입력해주세요.")
			return false;
		}
		form_data +=option_name+"^"+option_price+"||";
	}	
	opener.document.getElementById("option_input").value = form_data.slice(0,-2); // 데이터 전송	
	window.close();
}


