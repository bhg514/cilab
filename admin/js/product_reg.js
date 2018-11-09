$(document).ready(function() { 
	$('#summernote').summernote();  // 웹에디터


	$('#product_reg_btn').click(function(){ //에디터 값 저장
        $('#content_hidden').val($('#summernote').summernote('code'));
    });

    $('input[type=file]').change(function(e){
    	var file_name = document.getElementById(e.target.id).files[0].name;
    	$('#'+e.target.id+'_label').text(file_name);

    })
});

function del_free(){
	$('#delivery_input').val(0);
}
function del_non_free(){
	$('#free_chk').prop('checked',false);
}



function pop_option(){
	window.name = "parentForm";
	var option = $('#option_input').val();
	
	open_win = window.open('./pop_option.php','childForm','width=800, height=500,toobar=no,scrollbars=yes,menubar=no,status=no,directories=no');	



}


							