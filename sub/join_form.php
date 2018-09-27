<?php
	header ( "content-type:text/html; charset=utf-8" );
	include_once('../common.php');	
	$a = mysql_query( 'SELECT * from tb_contents');
	
	include '../header.php';

?>
<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
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
			<table class="tblType02">
				<caption>구매자정보</caption>
				<colgroup>
					<col style="width:170px;">
					<col>
				</colgroup>
				<tbody>
					<tr>
						<?php
			                while($row = mysql_fetch_array($a)){
			            ?>
						<th scope="row"><?php echo $row['fd_title'] ?></th>
						<?php
							}
						?>
						<td>
							<input type="text" id="reg_mb_name" name="mb_name" value="" required="" class="inTbl frm_input required " size="10">
						</td>
					</tr>					
					<tr>
						<th scope="row"><?php echo $a ?></th>
						<td><input type="text" name="mb_id" value="" id="reg_mb_id" required="" class="inTbl frm_input required " minlength="3" maxlength="20">
							<a href="javascript:id_chk();" class="btn type05 ml10">중복체크</a>
							<p class="mt05">* 6~12자의 영문 소문자와 숫자를 입력해주세요. </p>
						</td>
					</tr>
					<tr>
						<th scope="row">비밀번호</th>
						<td>
							<input type="password" name="mb_password" id="reg_mb_password" required="" class="inTbl frm_input required" minlength="3" maxlength="20">
							<span id="good_pw" class="fcBl ml05 fs12 b hide">[안전] 사용 가능한 비밀번호입니다.</span>
							<span id="bad_pw" class="fcR ml05 fs12 b hide">[사용불가]비밀번호 기준에 맞지 않습니다.</span>	<!-- span tag에 hide 유무에 따라 화면에 표현이 결정됩니다.  -->
							<p class="mt05">* 9자리 이상의 영문 소문자,특수문자,숫자를 혼합하여 입력해주세요.</p>
						</td>
					</tr>
					<tr>
						<th scope="row">비밀번호 확인</th>
						<td>
							<input type="password" name="mb_password_re" id="reg_mb_password_re" required="" class="inTbl frm_input required" minlength="3" maxlength="20">
							<span id="right_pw" class="fcBl ml05 fs12 b hide">입력한 비밀번호가 일치합니다.</span>
							<span id="wrong_pw" class="fcR ml05 fs12 b hide">비밀번호가 일치하지 않습니다.</span> <!-- span tag에 hide 유무에 따라 화면에 표현이 결정됩니다.  -->
						</td>
					</tr>
					<tr>
						<th scope="row">휴대전화번호</th>
						<td>
							<input type="text" name="mb_hp1" value="" id="reg_mb_hp1" required="" class="inTbl frm_input required reg_hp" maxlength="3">-
							<input type="text" name="mb_hp2" value="" id="reg_mb_hp2" required="" class="inTbl frm_input required reg_hp" maxlength="4">-
							<input type="text" name="mb_hp3" value="" id="reg_mb_hp3" required="" class="inTbl frm_input required reg_hp" maxlength="4">
						</td>
					</tr>
					<tr>
						<th scope="row">이메일</th>
						<td><!-- <input type="text" class="inTbl"> -->
							<input type="hidden" name="old_email" value="">
							<input type="text" name="email1" id="str_email01" class="inTbl frm_input email required">   @
							<input type="text" name="email2" id="str_email02" value="" disabled  class="inTbl frm_input email required">
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
						</td>
					</tr>
					<tr>
						<th scope="row">주소</th>
						<td>
							<label for="reg_mb_zip" class="sound_only">우편번호</label>
							<input type="text" name="mb_zip" value="" id="reg_mb_zip" required="" class="inTbl frm_input required" size="5" maxlength="6">
							<a href="javascript:win_zip('fregisterform', 'mb_zip', 'mb_addr1', 'mb_addr2', 'mb_addr3', 'mb_addr_jibeon');" class="btn type05 ml10">주소 검색</a><br>
							<div id="daum_juso_pagemb_zip" style="display: none; border: 1px solid; left: 0px; width: 100%; height: 267px; margin: 5px 0px; position: relative;"><img src="//i1.daumcdn.net/localimg/localimages/07/postcode/320/close.png" id="btnFoldWrap" style="cursor:pointer;position:absolute;right:0px;top:-21px;z-index:1" class="close_daum_juso" alt="접기 버튼"></div><input type="text" name="mb_addr1" value="" id="reg_mb_addr1" required="" class="inTbl frm_input frm_address required" size="50">
							<label for="reg_mb_addr1">기본주소<strong class="sound_only"> 필수</strong></label><br>
							<input type="text" name="mb_addr2" value="" id="reg_mb_addr2" class="inTbl frm_input frm_address" size="50">
							<label for="reg_mb_addr2">상세주소</label>
							<br>							
							<input type="hidden" name="mb_addr_jibeon" value="R">
						</td>
					</tr>
					<tr>
						<th scope="row">메일수신여부</th>
						<td>
							<label><input type="radio"> 동의함</label>
							<label><input type="radio"> 동의하지 않음</label>
						</td>
					</tr>					
				</tbody>
			</table>

			<div class="mt20 ar">
				<!-- <input type="submit" value="회원가입" id="btn_submit" class="btn_submit" accesskey="s"> -->
				<a href="javascript:login_do();" class="btn type07 st2">회원가입</a>
				<a href="/" class="btn type07">취소</a>
			</div>
		</div>
	</div>

</section>

<?php include '../footer.php' ?>

<?php
	
	if (!isset($_POST['agree1']) || !$_POST['agree1']) {
		echo "<script>alert(\"회원가입약관의 내용에 동의하셔야 회원가입 하실 수 있습니다.\");location.replace('http://localhost/sub/join.php');</script>";	
	}elseif (!isset($_POST['agree2']) || !$_POST['agree2']) {
	    echo "<script>alert(\"개인정보수집 이용동의 내용에 동의하셔야 회원가입 하실 수 있습니다.\");location.replace('http://localhost/sub/join.php');</script>";	
	}
?>