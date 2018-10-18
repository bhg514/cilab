$(document).ready(function() { 
	var pre_option =  opener.document.getElementById("option_input").value;	
	if( pre_option != ""){
		var option_split = pre_option.split("||")
		var option_arr= new Array()
		for (var i=0; i<option_split.length ; i++){
			option_name = option_split[i].split('^')[0]
			option_value = option_split[i].split('^')[1]
			option_price = option_split[i].split('^')[2]
			option_arr[i] = new Array(option_name,option_value,option_price);
		}
		var pre_option_name=""
		var same_option_count = 0
		var same_name_count = 0
		insert_val(option_arr,0,0,0);
		
		for (var i=0; i<option_arr.length ; i++){
			if(pre_option_name == option_arr[i][0]){ //같은 이름 
				$('#tbody').children().eq(same_option_count).children().eq(1).find('.add_value_btn')[same_name_count].click()
				same_name_count++;
				$('#tbody').children().eq(same_option_count).children().eq(1).find('.option_value')[same_name_count].value=option_arr[i][1];
				$('#tbody').children().eq(same_option_count).children().eq(1).find('.option_price')[same_name_count].value=option_arr[i][2];
			}else if(pre_option_name != option_arr[i][0] && pre_option_name!="") { //다른 이름
				add_option_btn()
				same_name_count=0;
				same_option_count ++;
				insert_val(option_arr,i,same_option_count,same_name_count)		
			}
			pre_option_name = option_arr[i][0]
		}

	}



})

function insert_val(arr,for_count,option_count,name_count){
	$('#tbody').children().eq(option_count).children().eq(0).find('.option_name').val(arr[for_count][0])
	if(arr[for_count][1]!=null)	$('#tbody').children().eq(option_count).children().eq(1).find('.option_value')[name_count].value=arr[for_count][1];
	if(arr[for_count][2]!=null) $('#tbody').children().eq(option_count).children().eq(1).find('.option_price')[name_count].value=arr[for_count][2];
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
					'<input type="text" class="option_value">/ * <input type="text" class="option_price">원'+
					'<input type="button" class="add_value_btn" value="+" onclick="add_value_btn(this)">'+
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

function add_value_btn(e){
	if($(e).parents().eq(2).children().length<10){
	
		var html =  '<tr>'+
					'<td>'+
					'<input type="text" class="option_value">/ * <input type="text" class="option_price">원'+
					'<input type="button"  value="-" onclick="remove_value_btn(this)">'+
					'<input type="button" class="add_value_btn" value="+" onclick="add_value_btn(this)">'+
					'</td>'+
					'</tr>';

		$(e).parents().eq(3).append(html); 
	}else{
		alert("옵션값은 최대 10개까지 입니다.")
	}


}

function remove_value_btn(e){
	$(e).parents().eq(1).remove();
}

function form_data(){
	// 전송 데이터 포맷 : 옵션명^옵셥값^추가금액||옵션명^옵셥값^추가금액||옵션명^옵셥값^추가금액||옵션명^옵셥값^추가금액
	// ex. 가^a^1||가^b^2||나^c^3||나^d^4||다^e^5	

	var option_len = $('#tbody').children().length // 옵션 수 
	var form_data = ""
	for (var i=0; i<option_len; i++){
		option_name = $('#tbody').children().eq(i).children().eq(0).find('.option_name').val();
		sub_option_len = $('#tbody').children().eq(i).children().eq(1).find('.option_price').length; //옵션 하위 값 갯수 

		for(var k=0; k<sub_option_len; k++){
			option_value = $('#tbody').children().eq(i).children().eq(1).find('.option_value')[k].value;
			option_price = $('#tbody').children().eq(i).children().eq(1).find('.option_price')[k].value;
			if(option_name==""){
				alert((i+1)+"번째 옵션명에 값을 입력해주세요. ")
				return false;
			}else if(option_value==""||option_price==""){
				alert((i+1)+"번쨰 옵션의 "+(k+1)+"번째 옵션값에 값을 입력해주세요.")
				return false;
			}
			form_data +=option_name+"^"+option_value+"^"+option_price+"||";
		}

	}	
	opener.document.getElementById("option_input").value = form_data.slice(0,-2); // 데이터 전송	
	window.close();
}


