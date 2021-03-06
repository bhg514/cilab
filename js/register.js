$(document).ready(function(){

//이메일 선택 

$('#selectEmail').change(function(){

$("#selectEmail option:selected").each(function () {

if($(this).val()== '1'){ //직접입력일 경우

 $("#str_email02").val('');                        //값 초기화

                 document.getElementById('str_email02').readOnly = false;

}else{ //직접입력이 아닐경우

 $("#str_email02").val($(this).text());      //선택값 입력

                 document.getElementById('str_email02').readOnly = true;

}

   });

});



//비밀번호 확인 

$('#reg_mb_password_re').change(function(){

var pw_origin = $('#reg_mb_password').val();

var pw_re = $('#reg_mb_password_re').val();

if(pw_origin == pw_re){

$('#right_pw').show();

$('#wrong_pw').hide();

}else{

$('#right_pw').hide();

$('#wrong_pw').show();

}

});



    //비밀번호 합부판정

$('#reg_mb_password').change(function(){

var pw = $('#reg_mb_password').val();

var re = /^(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{9,}$/;



if(re.test(pw)){

            $("#pw_chk").val(1);

$('#good_pw').show();

$('#bad_pw').hide();

}else{

            $("#pw_chk").val(0);

$('#good_pw').hide();

            $('#bad_pw').text('[Do not use] It does not suitable the password reference.');

$('#bad_pw').show();

}

});



    $('#sub_btn').click(function(){

        msg_hide()

        var chk_val = input_chk();

        if(chk_val == 1) {

            return false;

        }



    });



    $('#change_pw_sub').click(function(){

        var pw = $("#reg_mb_password").val();

        var pw_re = $("#reg_mb_password_re").val();

        if(pw != pw_re || $("#pw_chk").val()!=1){            

            return false;

        }



    });



})

function msg_hide() {

    $('#mb_name-error').hide()

    $('#r_id').hide()    

    $('#bad_pw').hide()

    $('#wrong_pw').hide()

    $('#wrong_gender').hide()

    $('#wrong_bd').hide()

    $('#wrong_hp').hide()

    $('#wrong_mail').hide()

    $('#wrong_zip').hide()

    $('#wrong_mail_reception').hide()

}

function input_chk(){

    var chk_val = 0;

    var name = $("#reg_mb_name").val();

    var id = $("#reg_mb_id").val();

    var id_chk = $('#id_chk_val').val();

    var pw = $("#reg_mb_password").val();

    var pw_re = $("#reg_mb_password_re").val();

    var gender = $('input[name="mb_gender"]:checked').val();

    var birthday = $('#datepicker1').val();

    var hp1 = $("#reg_mb_hp1").val()

    var hp2 = $("#reg_mb_hp2").val()

    var hp3 = $("#reg_mb_hp3").val();

    var mail1= $("#str_email01").val()

    var mail2= $("#str_email02").val();



    var zip= $("#reg_mb_zip").val();

    var addr1= $("#reg_mb_addr1").val();

    var addr2= $("#reg_mb_addr2").val();

    var mail_reception= $('input[name="mail_reception"]:checked').val();

    if (name==""){

        $('#mb_name-error').show()

        chk_val=1;

    }

    if (id==""){

        $('#r_id').text("Write down the ID.")

        $('#r_id').show()   

        chk_val=1;

    }else if(id_chk==0){

        $('#r_id').text("Check the duplicate inspection.")

        $('#r_id').show()

        chk_val=1;

    }



    if (pw==""){

        $('#bad_pw').text("Write down the password.") 

        $('#bad_pw').show()   

        chk_val=1;

    }

    if(pw!=pw_re){

        $('#wrong_pw').show()

        chk_val=1;

    }

    if (gender==null){

        $('#wrong_gender').show()   

        chk_val=1;

    }

    if (birthday==""){

        $('#wrong_bd').show()   

        chk_val=1;

    }

    if (hp1==""||hp2==""||hp3==""){

        $('#wrong_hp').show()   

        chk_val=1;

    }

    if (mail1==""||mail2==""){

        $('#wrong_mail').show() 

        chk_val=1;

    }

    if (zip==""||addr1==""||addr2==""){

        $('#wrong_zip').show() 

        chk_val=1;

    }    

    if (mail_reception==null){

        $('#wrong_mail_reception').show() 

        chk_val=1;

    }

    return chk_val;



}

//회원정보 전달

function reg_form(){

    var name = $("#reg_mb_name").val();

    var id = $("#reg_mb_id").val();

    var pw = $("#reg_mb_password").val();

    var hp = $("#reg_mb_hp1").val()+"-"+$("#reg_mb_hp2").val()+"-"+$("#reg_mb_hp3").val();

    var gender = $('input[name="mb_gender"]:checked').val();

    var birthday = $('#datepicker1').val();

    var mail= $("#str_email01").val()+"@"+$("#str_email02").val();

    var zip= $("#reg_mb_zip").val();

    var addr1= $("#reg_mb_addr1").val();

    var addr2= $("#reg_mb_addr2").val();

    var mail_reception= $('input[name="mail_reception"]:checked').val();

    $.ajax({

        type: "POST",

        url: "../ajax/join_form_result.php",

        cache: false,

        async: false,

        data: { 

            name : name,

            id :  id,

            pw : pw,

            hp : hp,

            gender : gender,

            birthday : birthday,

            mail : mail,

            zip : zip,

            addr1 : addr1,

            addr2 : addr2,

            mail_reception : mail_reception

        },

        dataType: "json",

        success: function(data) {   

            if(data==1){

                window.location.href = "https://cilab.kr/register/result.php";

            }else{

                alert("error");                

            }

        }

    });

}



//이메일 선택 

function email_change(){

if(document.join.email.options[document.join.email.selectedIndex].value == '0'){

 document.join.email2.disabled = true;

document.join.email2.value = "";

}

if(document.join.email.options[document.join.email.selectedIndex].value == '1'){

document.join.email2.disabled = false;

document.join.email2.value = "";

document.join.email2.focus();



}else{

document.join.email2.disabled = true;

document.join.email2.value = document.join.email.options[document.join.email.selectedIndex].value;

}

}



//우편번호 창 

var win_zip = function(frm_name, frm_zip, frm_addr1, frm_addr2, frm_addr3, frm_jibeon) {

    if(typeof daum === 'undefined'){

        alert("It does not load postcode.v2.js file.");

        return false;

    }



    var zip_case = 1;   //0이면 레이어, 1이면 페이지에 끼워 넣기, 2이면 새창



    var complete_fn = function(data){

        // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.



        // 각 주소의 노출 규칙에 따라 주소를 조합한다.

        // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.

        var fullAddr = ''; // 최종 주소 변수

        var extraAddr = ''; // 조합형 주소 변수



        // 사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.

        if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우

            fullAddr = data.roadAddress;



        } else { // 사용자가 지번 주소를 선택했을 경우(J)

            fullAddr = data.jibunAddress;

        }



        // 사용자가 선택한 주소가 도로명 타입일때 조합한다.

        if(data.userSelectedType === 'R'){

            //법정동명이 있을 경우 추가한다.

            if(data.bname !== ''){

                extraAddr += data.bname;

            }

            // 건물명이 있을 경우 추가한다.

            if(data.buildingName !== ''){

                extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);

            }

            // 조합형주소의 유무에 따라 양쪽에 괄호를 추가하여 최종 주소를 만든다.

            extraAddr = (extraAddr !== '' ? ' ('+ extraAddr +')' : '');

        }



        // 우편번호와 주소 정보를 해당 필드에 넣고, 커서를 상세주소 필드로 이동한다.

        $('#reg_mb_zip').val(data.zonecode)

        $('#reg_mb_addr1').val(fullAddr)       



        if($('input[name$="mb_addr_jibeon"]').val() !== undefined){

        $('input[name$="mb_addr_jibeon"]').val(data.userSelectedType)            

        }



        $('#reg_mb_addr2').focus()

    };



    switch(zip_case) {

        case 1 :    //iframe을 이용하여 페이지에 끼워 넣기

            var daum_pape_id = 'daum_juso_page'+frm_zip,

                element_wrap = document.getElementById(daum_pape_id),

                currentScroll = Math.max(document.body.scrollTop, document.documentElement.scrollTop);

            if (element_wrap == null) {

                element_wrap = document.createElement("div");

                element_wrap.setAttribute("id", daum_pape_id);

                element_wrap.style.cssText = 'display:none;border:1px solid;left:0;width:100%;height:300px;margin:5px 0;position:relative;-webkit-overflow-scrolling:touch;';

                element_wrap.innerHTML = '<img src="//i1.daumcdn.net/localimg/localimages/07/postcode/320/close.png" id="btnFoldWrap" style="cursor:pointer;position:absolute;right:0px;top:-21px;z-index:1" class="close_daum_juso" alt="Folding button">';

                jQuery('form[name="'+frm_name+'"]').find('input[name="'+frm_addr1+'"]').before(element_wrap);

                jQuery("#"+daum_pape_id).off("click", ".close_daum_juso").on("click", ".close_daum_juso", function(e){

                    e.preventDefault();

                    jQuery(this).parent().hide();

                });

            }



            new daum.Postcode({

                oncomplete: function(data) {

                    complete_fn(data);

                    // iframe을 넣은 element를 안보이게 한다.

                    element_wrap.style.display = 'none';

                    // 우편번호 찾기 화면이 보이기 이전으로 scroll 위치를 되돌린다.

                    document.body.scrollTop = currentScroll;

                },

                // 우편번호 찾기 화면 크기가 조정되었을때 실행할 코드를 작성하는 부분.

                // iframe을 넣은 element의 높이값을 조정한다.

                onresize : function(size) {

                    element_wrap.style.height = size.height + "px";

                },

                width : '100%',

                height : '100%'

            }).embed(element_wrap);



            // iframe을 넣은 element를 보이게 한다.

            element_wrap.style.display = 'block';

            break;

        case 2 :    //새창으로 띄우기

            new daum.Postcode({

                oncomplete: function(data) {

                    complete_fn(data);

                }

            }).open();

            break;

        default :   //iframe을 이용하여 레이어 띄우기

            var rayer_id = 'daum_juso_rayer'+frm_zip,

                element_layer = document.getElementById(rayer_id);

            if (element_layer == null) {

                element_layer = document.createElement("div");

                element_layer.setAttribute("id", rayer_id);

                element_layer.style.cssText = 'display:none;border:5px solid;position:fixed;width:300px;height:460px;left:50%;margin-left:-155px;top:50%;margin-top:-235px;overflow:hidden;-webkit-overflow-scrolling:touch;z-index:10000';

                element_layer.innerHTML = '<img src="//i1.daumcdn.net/localimg/localimages/07/postcode/320/close.png" id="btnCloseLayer" style="cursor:pointer;position:absolute;right:-3px;top:-3px;z-index:1" class="close_daum_juso" alt="closing button">';

                document.body.appendChild(element_layer);

                jQuery("#"+rayer_id).off("click", ".close_daum_juso").on("click", ".close_daum_juso", function(e){

                    e.preventDefault();

                    jQuery(this).parent().hide();

                });

            }



            new daum.Postcode({

                oncomplete: function(data) {

                    complete_fn(data);

                    // iframe을 넣은 element를 안보이게 한다.

                    element_layer.style.display = 'none';

                },

                width : '100%',

                height : '100%'

            }).embed(element_layer);



            // iframe을 넣은 element를 보이게 한다.

            element_layer.style.display = 'block';

    }

}



function isNumber(s) {

  s += ''; // 문자열로 변환

  s = s.replace(/^\s*|\s*$/g, ''); // 좌우 공백 제거

  if (s == '' || isNaN(s)) return false;

  return true;

}



function fn_press_han(obj){

    if(!isNumber(obj.value) && obj.value!=""){

        alert("Please, Write down the only number.");

        obj.value="";

    }

}





function id_chk(){



    var chk_type = $('#id_chk_val').val()//id_chk 여부  0:체크 전 , 1: 체크 후



    if (chk_type==0){ 

        var id = $('#reg_mb_id').val()

        var re = /^(?=.*?[A-z])(?=.*?[0-9]).{6,12}$/;



        if(re.test(id)){

            $.ajax({

                type: "POST",

                url: "../ajax/id_chk.php",

                cache: false,

                async: false,

                data: { id: id },

                dataType: "json",

                success: function(data) {   

                    if(data==1){

                        $('#r_id').text("[Do not use]The ID duplicated.")

                        $('#bl_id').hide();

                        $('#r_id').show();

                    }else{

                        $('#bl_id').text("[Possible]")

                        $('#r_id').hide();

                        $('#bl_id').show();

                        $('#id_chk_val').val(1);

                        document.getElementById('reg_mb_id').readOnly = true;

                        $('#id_chk_btn').text("ID change");

                        

                    }

                }

            });

        }else{

            $('#r_id').text("[Do not use]It does not suitable ID reference.")

            $('#bl_id').hide();

            $('#r_id').show();

        }



    }else{

        $('#bl_id').hide();

        $('#id_chk_val').val(0);

        $('#id_chk_btn').text("Duplicate Inspection");

        document.getElementById('reg_mb_id').readOnly = false;

    }







    

    

}