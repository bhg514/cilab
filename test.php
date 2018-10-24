<script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
<script>
$(function(){
    $('#button-add-file').click(function(){
        addFileForm(1)
    });
    $(document).on('click', '.button-delete-file', function(event) {
        $(this).parent().remove();
    });
});

function addFileForm(count) {
    var html = "<div id='item_"+count+"'>";
    html += "<input type='file' name='fileup[]' />";
    html += "<button class='button-delete-file'>삭제</button></div>";
    count++;
    $("#my-form").append(html);
}

</script>
<button id='button-add-file'>파일 추가</button>
<form id='my-form'></form>