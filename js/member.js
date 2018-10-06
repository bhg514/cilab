function login_chk(){
    var id = $('#input_id').val();
    var pw = $('#input_pw').val();

    $.ajax({
        type: "POST",
        url: "../ajax/login_chk.php",
        cache: false,
        async: false,
        data: { 
            id :  id,
            pw : pw
        },
        dataType: "json",
        success: function(data) {   
            if(data==1){
                alert("비번 일치");
            }else{
                alert("비번이 다름");                
            }
        }
    });
}