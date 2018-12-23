<?php
	
	include '../header.php';
	if(!isset($_SESSION['user_id'])||$_SESSION['user_type']=="a"){
		header("location:https://".$http_host."/index.php");
	}
	
	if($_SESSION['user_chk']=="1"){
		unset($_SESSION['user_chk']);		
	}else{
		header("location:https://".$http_host."/mypage/user_chk.php");
	}
	$id = $_SESSION['user_id'];
	$user_info = get_user_info_to_id($id);
	$hp_split = explode('-', $user_info['fd_hp']);
	$hp1 = $hp_split[0];
	$hp2 = $hp_split[1];
	$hp3 = $hp_split[2];
	$mail_split = explode('@',$user_info['fd_mail']);
	$mail = $mail_split[0];
	$mail_site = $mail_split[1];

?>
<!--달력 -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="../js/click_cal.js"></script>
<!-- 달력 -->

<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../js/additional-methods.min.js"></script>
<script type="text/javascript" src="../js/messages_ko.min.js"></script>
<script type="text/javascript" src="../js/register.js"></script>
<script type="text/javascript" src="../js/click_cal.js"></script>
<section class="container">	
	<div class="visual etc">
		<p class="subTitle">Modify information</p>
		<div class="location">
			<img src="../images/common/icon_home.png" alt="Home">
			<span>&gt;</span>
			<span>My page</span>
			<span>&gt;</span>
			<span>Modify information</span>
		</div>
	</div>

	<div class="contents">
		<div class="btnTab">
			<a href="./order.php" >Delivery Tracking</a>
			<a href="./info.php" class="on">Modify information</a>
		</div>
		<div class="tabletInner">
			<form id="info_form" action="./info_form.php" method="post">
				<fieldset>
					<table class="tblType02">
						<caption>Membership form</caption>
						<colgroup>
							<col style="width:170px;">
							<col>
						</colgroup>
						<tbody>
							<input type="hidden" name="pk_no" value="<?=$user_info['pk_no']?>">
							<tr>						
								<th scope="row">Name</th>	
								<input type="hidden" name="mb_name" value="<?=$user_info['fd_name']?>">					
								<td><?=$user_info['fd_name']?></td>
							</tr>					
							<tr>
								<th scope="row">ID</th>
								<input type="hidden" name="mb_id" value="<?=$user_info['fd_id']?>">	
								<td><?=$user_info['fd_id']?></td>
							</tr>
							<tr>
								<th scope="row">Password</th>
								<td>
									<input type="hidden" id="pw_chk" >
									<input type="password" name="mb_password" id="reg_mb_password" class="inTbl frm_input required" minlength="9" maxlength="20">
									<span id="good_pw" class="fcBl ml05 fs12 b hide">[SAFE] Password available.</span>
									<span id="bad_pw" class="fcR ml05 fs12 b hide">[Not available] Password does not meet the criteria.</span>	<!-- span tag에 hide 유무에 따라 화면에 표현이 결정됩니다.  -->
									<p class="mt05">* Please enter a mixture of 9 lower case letters, special characters, and numbers.</p>
									<label id="mb_password-error" class="error" for="mb_password" style="display:none;" >Please enter a password</label>
								</td>
							</tr>
							<tr>
								<th scope="row">Password Confirm</th>
								<td>
									<input type="password" name="mb_password_re" id="reg_mb_password_re" class="inTbl frm_input required" minlength="9" maxlength="20">
									<span id="right_pw" class="fcBl ml05 fs12 b hide">The password you entered matches.</span>
									<span id="wrong_pw" class="fcR ml05 fs12 b hide">Passwords do not match.</span> <!-- span tag에 hide 유무에 따라 화면에 표현이 결정됩니다.  -->
								</td>
							</tr>
							<tr>
								<th scope="row">Gender</th>
								<td>
									<label><input type="radio" name="mb_gender" value="m" <?php if($user_info['fd_gender']=="m"){ echo "checked";}?>> man</label>
									<label><input type="radio" name="mb_gender" value="w" <?php if($user_info['fd_gender']=="w"){ echo "checked";}?>> woman</label>
									<span id="wrong_gender" class="fcR ml05 fs12 b hide">Choose the gender.</span>									
								</td>
							</tr>
							<tr>
								<th scope="row">Birthday</th>
								<td>
									<input id="datepicker1" name="mb_bd" type="text" class="required cal_input"  value="<?=$user_info['fd_birthday']?>" readonly>
									<span id="wrong_bd" class="fcR ml05 fs12 b hide">Please enter your birthday.</span>										
								</td>
							</tr>

							
							<tr>
								<th scope="row">Phone Number</th>
								<td>
									<input type="text" name="mb_hp1" value="<?=$hp1?>" id="reg_mb_hp1" class="inTbl frm_input required reg_hp" maxlength="3" onkeyup="fn_press_han(this)">-
									<input type="text" name="mb_hp2" value="<?=$hp2?>" id="reg_mb_hp2" class="inTbl frm_input required reg_hp" maxlength="4" onkeyup="fn_press_han(this)">-
									<input type="text" name="mb_hp3" value="<?=$hp3?>" id="reg_mb_hp3" class="inTbl frm_input required reg_hp" maxlength="4" onkeyup="fn_press_han(this)">
									<span id="wrong_hp" class="fcR ml05 fs12 b hide">Please enter your phone number.</span>										
								</td>
							</tr>
							<tr>
								<th scope="row">E-mail</th>
								<td><!-- <input type="text" class="inTbl"> -->
									<input type="hidden" name="old_email" value="">
									<input type="text" name="mb_email1" id="str_email01" class="inTbl frm_input required" value="<?=$mail?>">    @
									<input type="text" name="mb_email2" id="str_email02" value="<?=$mail_site?>" class="inTbl frm_input required">
									<select name="email" id="selectEmail">
									    <option selected hidden>Select</option>
									    <option value="1">Direct input</option>
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
									<span id="wrong_mail" class="fcR ml05 fs12 b hide">Please enter your mail.</span>										
								</td>
							</tr>
							<tr>
								<th scope="row">Address</th>
								<!-- <td>
									<label for="reg_mb_zip" class="sound_only">우편번호</label>
									<input type="text" name="mb_zip" value="<?=$user_info['fd_zip']?>" id="reg_mb_zip" class="inTbl frm_input required" size="5" maxlength="6" readonly >
									<a href="javascript:win_zip('fregisterform', 'mb_zip', 'mb_addr1', 'mb_addr2', 'mb_addr3', 'mb_addr_jibeon');" class="btn type05 ml10">주소 검색</a>
									<span id="wrong_zip" class="fcR ml05 fs12 b hide">주소를 입력하세요</span><br>
									<div id="daum_juso_pagemb_zip" style="display:none; border:1px solid; left:0px; width:100%; height:267px; margin:5px 0px;position:relative;">
										<img src="//i1.daumcdn.net/localimg/localimages/07/postcode/320/close.png" id="btnFoldWrap" style="cursor:pointer;position:absolute;right:0px;top:-21px;z-index:1" class="close_daum_juso" alt="접기 버튼">
									</div>
									<input type="text" name="mb_addr1" value="<?=$user_info['fd_address1']?>" id="reg_mb_addr1"  class="inTbl frm_input frm_address required" size="50" readonly>
									<label for="reg_mb_addr1">기본주소<strong class="sound_only"> 필수</strong></label><br>
									<input type="text" name="mb_addr2" value="<?=$user_info['fd_address2']?>" id="reg_mb_addr2"  class="inTbl frm_input frm_address " size="50">
									<label for="reg_mb_addr2">상세주소</label>
									<br>							
									<input type="hidden" name="mb_addr_jibeon" value="R">
								</td> -->
								<td>
									<input type="text" name="mb_zip" value="<?=$user_info['fd_zip']?>" id="reg_mb_zip" class="inTbl frm_input required" size="5" maxlength="6" >
									<label for="reg_mb_zip">Zipcode</label><br/>
									<input type="text" name="mb_addr4" value="<?=$user_info['fd_address4']?>" id="reg_mb_addr4"  class="inTbl frm_input required" size="50" >
									<label for="reg_mb_addr4">Detail</label><br/>
									<input type="text" name="mb_addr3" value="<?=$user_info['fd_address3']?>" id="reg_mb_addr3"  class="inTbl frm_input required " size="50">
									<label for="reg_mb_addr3">District</label><br/>
									<input type="text" name="mb_addr2" value="<?=$user_info['fd_address2']?>" id="reg_mb_addr2"  class="inTbl frm_input required " size="50">
									<label for="reg_mb_addr2">City</label><br/>
									<input type="text" name="mb_addr1" value="<?=$user_info['fd_address1']?>" id="reg_mb_addr1"  class="inTbl frm_input required " size="50">
									<label for="reg_mb_addr1">Country</label>									
								</td>
							</tr>
							<tr>
								<th scope="row">Whether to <br>receive mail</th>
								<td>
									<label><input type="radio" name="mail_reception" value="y" <?php if($user_info['fd_reception']=="y"){ echo "checked";}?>> argree</label>
									<label><input type="radio" name="mail_reception" value="n"<?php if($user_info['fd_reception']=="n"){ echo "checked";}?>> disagree</label>
									<span id="wrong_mail_reception" class="fcR ml05 fs12 b hide">Choose whether to receive mail.</span>										
								</td>
							</tr>					
						</tbody>
					</table>

					<div class="mt20 ar">
						<!-- <input type="submit" value="회원가입" id="btn_submit" class="btn_submit" accesskey="s"> -->
						<input type="submit" value="Revise information" id="sub_btn" class="btn type07 st2">
						<!-- <a href="javascript:login_do();" class="btn type07 st2">회원가입</a> -->
						<a href="/" class="btn type07">Cancel</a>
					</div>
				</fieldset>
			</form>
		</div>
	</div>

</section>
<?php
	include '../footer.php'
?>

