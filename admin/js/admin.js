$(document).ready(function() { 
	$('#summernote').summernote();  // 웹에디터


	$('#product_reg_btn').click(function(){ //에디터 값 저장
        $('#content_hidden').val($('#summernote').summernote('code'));
    });



});

function del_free(){
	$('#delivery_input').val(0);
}
function del_non_free(){
	$('#free_chk').prop('checked',false);
}
