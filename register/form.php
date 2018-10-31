<?php
	header ( "content-type:text/html; charset=utf-8" );
	include_once('../common.php');		
	include '../header.php';
	if(isset($_SESSION['user_id'])){
		header("location:http://".$http_host."/index.php");
	}

?>
<!--달력 -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="../js/click_cal.js"></script>
<!-- 달력 -->

<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script><!-- 우편 --> 

<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../js/additional-methods.min.js"></script>
<script type="text/javascript" src="../js/messages_ko.min.js"></script>
<script type="text/javascript" src="../js/register.js"></script>

<section class="container">	
	<div class="visual etc">
		<p class="subTitle">회원가입</p>
		<div class="location">
			<img src="../images/common/icon_home.png" alt="Home">
			<span>&gt;</span>
			<span>회원가입</span>
		</div>
	</div>
	<div class="contents">
		<div class="tabletInner">
			<form id="reg_form" action="./form_send.php" method="post">
				<fieldset>
					<table class="tblType02">
						<caption>회원가입 정보</caption>
						<colgroup>
							<col style="width:170px;">
							<col>
						</colgroup>
						<tbody>
							<tr>						
								<th scope="row">이름</th>						
								<td>
									<input type="text" id="reg_mb_name" name="mb_name" value="" class="inTbl frm_input required" minlength="1" size="10">
									<span id="mb_name-error" class="fcR ml05 fs12 b hide">이름을 입력하세요</span>
									
								</td>
							</tr>					
							<tr>
								<th scope="row">아이디</th>
								<td><input type="text" name="mb_id" value="" id="reg_mb_id" class="inTbl frm_input required " minlength="6" maxlength="12">
									<a href="javascript:id_chk();" id="id_chk_btn" class="btn type05 ml10">중복체크</a>
									<input type="hidden" id="id_chk_val" value="0">
									<span id="bl_id" class="fcBl ml05 fs12 b hide"></span>
									<span id="r_id" class="fcR ml05 fs12 b hide"></span>	
									<p class="mt05">* 6~12자의 영문 소문자와 숫자를 입력해주세요. </p>																		
									
								</td>
							</tr>
							<tr>
								<th scope="row">비밀번호</th>
								<td>
									<input type="hidden" id="pw_chk" >
									<input type="password" name="mb_password" id="reg_mb_password" class="inTbl frm_input required" minlength="9" maxlength="20">
									<span id="good_pw" class="fcBl ml05 fs12 b hide">[안전] 사용 가능한 비밀번호입니다.</span>
									<span id="bad_pw" class="fcR ml05 fs12 b hide">[사용불가]비밀번호 기준에 맞지 않습니다.</span>	<!-- span tag에 hide 유무에 따라 화면에 표현이 결정됩니다.  -->
									<p class="mt05">* 9자리 이상의 영문 소문자,특수문자,숫자를 혼합하여 입력해주세요.</p>
									<label id="mb_password-error" class="error" for="mb_password" style="display:none;" >비밀번호를 입력하세요</label>
								</td>
							</tr>
							<tr>
								<th scope="row">비밀번호 확인</th>
								<td>
									<input type="password" name="mb_password_re" id="reg_mb_password_re" class="inTbl frm_input required" minlength="9" maxlength="20">
									<span id="right_pw" class="fcBl ml05 fs12 b hide">입력한 비밀번호가 일치합니다.</span>
									<span id="wrong_pw" class="fcR ml05 fs12 b hide">비밀번호가 일치하지 않습니다.</span> <!-- span tag에 hide 유무에 따라 화면에 표현이 결정됩니다.  -->
								</td>
							</tr>
							<tr>
								<th scope="row">성별</th>
								<td>
									<label><input type="radio" name="mb_gender" value="m"> 남자</label>
									<label><input type="radio" name="mb_gender" value="w"> 여자</label>
									<span id="wrong_gender" class="fcR ml05 fs12 b hide">성별을 선택하세요</span>									
								</td>
							</tr>
							<tr>
								<th scope="row">생일</th>
								<td>									
									<input id="datepicker1" name="mb_bd" type="text" class="required cal_input" readonly>
									<span id="wrong_bd" class="fcR ml05 fs12 b hide">생일을 입력하세요</span>										
								</td>
							</tr>

							
							<tr>
								<th scope="row">전화번호</th>
								<td>
									<input type="text" name="mb_hp1" value="" id="reg_mb_hp1" class="inTbl frm_input required reg_hp" maxlength="3" onkeyup="fn_press_han(this);">-
									<input type="text" name="mb_hp2" value="" id="reg_mb_hp2" class="inTbl frm_input required reg_hp" maxlength="4" onkeyup="fn_press_han(this);">-
									<input type="text" name="mb_hp3" value="" id="reg_mb_hp3" class="inTbl frm_input required reg_hp" maxlength="4" onkeyup="fn_press_han(this);">
									<span id="wrong_hp" class="fcR ml05 fs12 b hide">전화번호를 입력하세요</span>										
								</td>
							</tr>
							<tr>
								<th scope="row">이메일</th>
								<td><!-- <input type="text" class="inTbl"> -->
									<input type="hidden" name="old_email" value="">
									<input type="text" name="mb_email1" id="str_email01" class="inTbl frm_input required">   @
									<input type="text" name="mb_email2" id="str_email02" class="inTbl frm_input required">
									<select name="email" id="selectEmail">
									    <option selected hidden>선택하세요</option>
									    <option value="1">직접입력</option>
									    <option value="naver.com" >naver.com</option> 
									    <option value="hanmail.net">hanmail.net</option> 
									    <option value="hotmail.com">hotmail.com</option> 
									    <option value="nate.com">nate.com</option> 
									    <option value="yahoo.co.kr">yahoo.co.kr</option> 
									    <option value="empas.com">empas.com</option> 
									    <option value="dreamwiz.com">dreamwiz.com</option> 
									    <option value="freechal.com">freechal.com</option> 
									    <option value="lycos.co.kr">lycos.co.kr</option> 
									    <option value="korea.com">korea.com</option> 
									    <option value="gmail.com">gmail.com</option> 
									    <option value="hanmir.com">hanmir.com</option> 
									    <option value="paran.com">paran.com</option>
									</select>	
									<span id="wrong_mail" class="fcR ml05 fs12 b hide">메일을 입력하세요</span>										
								</td>
							</tr>
							<tr>
								<th scope="row">주소</th>
								<td>
									<label for="reg_mb_zip" class="sound_only">우편번호</label>
									<input type="text" name="mb_zip" value="" id="reg_mb_zip" class="inTbl frm_input required" size="5" maxlength="6" readonly >
									<a href="javascript:win_zip('fregisterform', 'mb_zip', 'mb_addr1', 'mb_addr2', 'mb_addr3', 'mb_addr_jibeon');" class="btn type05 ml10">주소 검색</a>
									<span id="wrong_zip" class="fcR ml05 fs12 b hide">주소를 입력하세요</span><br>
									<div id="daum_juso_pagemb_zip" style="display:none; border:1px solid; left:0px; width:100%; height:267px; margin:5px 0px;position:relative;">
										<img src="//i1.daumcdn.net/localimg/localimages/07/postcode/320/close.png" id="btnFoldWrap" style="cursor:pointer;position:absolute;right:0px;top:-21px;z-index:1" class="close_daum_juso" alt="접기 버튼">
									</div>
									<input type="text" name="mb_addr1" value="" id="reg_mb_addr1"  class="inTbl frm_input frm_address required" size="50" readonly>
									<label for="reg_mb_addr1">기본주소<strong class="sound_only"> 필수</strong></label><br>
									<input type="text" name="mb_addr2" value="" id="reg_mb_addr2"  class="inTbl frm_input frm_address " size="50">
									<label for="reg_mb_addr2">상세주소</label>
									<br>							
									<input type="hidden" name="mb_addr_jibeon" value="R">
								</td>
							</tr>
							<tr>
								<th scope="row">메일수신여부</th>
								<td>
									<label><input type="radio" name="mail_reception" value="y"> 동의함</label>
									<label><input type="radio" name="mail_reception" value="n"> 동의하지 않음</label>
									<span id="wrong_mail_reception" class="fcR ml05 fs12 b hide">메일 수신 여부를 선택하세요</span>										
								</td>
							</tr>					
						</tbody>
					</table>

					<div class="mt20 ar">
						<!-- <input type="submit" value="회원가입" id="btn_submit" class="btn_submit" accesskey="s"> -->
						<input type="submit" value="회원가입" id="sub_btn" class="btn type07 st2">
						<!-- <a href="javascript:login_do();" class="btn type07 st2">회원가입</a> -->
						<a href="/" class="btn type07">취소</a>
					</div>
				</fieldset>
			</form>
		</div>
	</div>

</section>

<?php include '../footer.php' ?>

<?php
	
	if (!isset($_POST['agree1']) || !$_POST['agree1']) {
		alert("회원가입약관의 내용에 동의하셔야 회원가입 하실 수 있습니다.","http://".$http_host."/register/agree.php");
		//echo "<script>alert(\"회원가입약관의 내용에 동의하셔야 회원가입 하실 수 있습니다.\");location.replace(\"http://\".$http_host.\"/register/agree.php");</script>";	
	}elseif (!isset($_POST['agree2']) || !$_POST['agree2']) {
		alert("개인정보수집 이용동의 내용에 동의하셔야 회원가입 하실 수 있습니다.","http://".$http_host."/register/agree.php");
	    //echo "<script>alert(\"개인정보수집 이용동의 내용에 동의하셔야 회원가입 하실 수 있습니다.\");location.replace("http://".$http_host."/register/agree.php");</script>";	
	}
?>