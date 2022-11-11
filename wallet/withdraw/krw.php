<html>
	<head>
		<?php
			session_start();
			if(isset($_SESSION['email']))
			{
				include("../../config.php");
				$query = mysql_query("select * from accounts WHERE email='{$_SESSION['email']}'");
				$queryinformation = mysql_fetch_array($query);
				$walletquery = mysql_query("select * from wallet WHERE id='{$queryinformation['id']}'");
				$walletinformation = mysql_fetch_array($walletquery);
				$possiblekrw = $queryinformation['krw']-1000;
				if($possiblekrw <= 0)
				{
					$possiblekrw=0;
				}
		?>
		<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
		<meta name="viewport" content="initial-scale=1.0; maximum-scale=0.75; minimum-scale=1.0; user-scalable=1;width=device-width;"/>
		<title>마에스트로 거래소 원화 출금 페이지</title>
		<script src="https://www.google.com/recaptcha/api.js"></script>
		<script>
			function maxkrw() {
				var krw;
				krw = parseFloat(<?php echo "{$possiblekrw}"; ?>);
				document.getElementById("krwamount").value = krw;
				krwamount_output.innerHTML = krw;
			}
			function krwamountupdate(){
				var krwamount = document.getElementById("krwamount");
				var krwamount_output = document.getElementById("krwamount_output");
				krwamount_output.innerHTML = krwamount.value;
			}
			function krwaddressupdate() {
				var address_input = document.getElementById("address_input");
				var krwaddress_output = document.getElementById("krwaddress_output");
				krwaddress_output.innerHTML = address_input.value;
			}	
		</script>
		<style>
			body{
				font-size:20px;
			}
			input{
				font-size:20px;
				text-align:right;
			}
		</style>
	</head>
	<body>
			<font color="red" size="5"><b>
				경찰, 검찰, 국가기관 등의 연락을 받고 원화를 출금하여 다른계좌(안심계좌)로 이체하라고 하거나, 현금을 출금하여 지정된 장소에 보관하라고 하던가요?<br>
				100% 사기이오니 출금을 중단하시고, 고객센터로 즉시 신고 바랍니다.<br>
				마에스트로 거래소에서는 어떠한 경우에도 회원님에게 비밀번호, 2차 비밀번호를 절대로 요구하지 않습니다. (100% 사칭 사기)<br>
				만약, 해당 전화를 받아 아이디 비밀번호 2차비밀번호를 알려준 경우 비밀번호, 2차비밀번호 를 즉시 변경 하여 주시고, 고객센터로 신고 하여 주십시오.<br><br><br></b>
			</font>
			<form action="./krw_do.php" method="post">
				현재 보유 원화량 : <b><?php echo "{$queryinformation['krw']}"; ?> KRW</b><br>
				현재 출금 가능량 : <b><?php echo "{$possiblekrw}"; ?> KRW<br>
				<font size="2px" color="gray">(출금 수수료:1,000 KRW)</font><br><br>
				예금주 : <?php echo "{$queryinformation['realname']}"; ?><br>
				<font size="2px" color="gray">예금주와 은행명 계좌번호가 다를 경우 출금이 불가능 합니다.</font><br>
				출금금액 (KRW) : <input style="width:200px;" type="number" id="krwamount" onchange="krwamountupdate();" onkeyup="krwamountupdate();" min="5000" max="<?php echo "{$possiblekrw}"; ?>" placeholder="출금금액 입력"  size="40" name="money_out_value" required autofocus> KRW
				<input type="button" onclick="maxkrw();" value="최대">
				<font size="2" color="blue"><b><span id="krwamount_output"></span></b> KRW </font><br>
				출금 은행 : 
				<select style="font-size:20px; height:30px;" name="bankname" required autofocus>
					<option value="한국은행">한국은행 (001)</option>
					<option value="산업은행">산업은행 (002)</option>
					<option value="기업은행">기업은행 (003)</option>
					<option value="국민은행">국민은행 (004)</option>
					<option value="수협은행">수협은행 (007)</option>
					<option value="농협은행">농협중앙회 (011)</option>
					<option value="농축협은행">지역 농축협은행 (012)</option>
					<option value="우리은행">우리은행(020)</option>
					<option value="대구은행">대구은행(031)</option>
					<option value="부산은행">부산은행 (032)</option>
					<option value="광주은행">광주은행 (034)</option>
					<option value="제주은행">제주은행 (035)</option>
					<option value="전북은행">전북은행 (037)</option>
					<option value="경남은행">경남은행 (039)</option>
					<option value="새마을금고">새마을금고 (045)</option>
					<option value="신협">신협 (048)</option>
					<option value="우체국">우체국 (071)</option>
					<option value="KEB하나은행">KEB하나은행 (081)</option>
					<option value="신한은행">신한은행 (088)</option>
					<option value="케이뱅크">케이뱅크 (089)</option>
					<option value="카카오뱅크">카카오뱅크 (090)</option>
					<option value="금융결제원">금융결제원 (099)</option>
				</select><br>
				출금 계좌 번호 : 
				<input type="text" id="address_input" onchange="krwaddressupdate();" onkeyup="krwaddressupdate();" name="banknumber" placeholder="출금계좌번호 입력" required autofocus>
				<font size="2" color="blue"><b><span id="krwaddress_output"></span></b></font><br>
				
				2차 비밀번호 : <input type="password" name="password2" placeholder="2차 비밀번호" required autofocus><!-- 지갑 주소 최대 길이만큼 조절할것. --><br>
				<input type="hidden" id="remoteip" name="remoteip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
				<div class="g-recaptcha" data-sitekey="6Lfkl3IUAAAAANzP4A06Bk7Y70RPVJ_2c-OWEz6E"></div>
				<input type="submit" value="출금신청"><br></b>
			</form>
			<font size="5" color = "red">
			<b>출금전 아래의 주의사항을 반드시 확인 해주세요. !!</b>
			</font><br>
			- KRW를 처음 입금하시는 경우 3영업일(72시간) 동안 KRW 및 암호화폐의 출금이 제한됩니다.<br>
			- 출금은 최소 5,000 KRW 이상 부터 단위는 1 KRW 단위로 가능 합니다.
			- 출금은 1회 한도 100,000,000 KRW / 1일 한도 제한 없음 입니다.<br>
			- 출금요청 완료 시 등록하신 은행계좌로 출금이 되며, 타인명의 계좌로의 출금은 불가능 합니다.<br>
			- 모든 출금은 관리자 확인 후 진행이 되며, 은행 점검 시간이나 서버점검 시간 중에는 지연될 수 있습니다. (은행 공통 점검시간 매일 23:00~00:30)<br>
			- 부정 거래가 의심되는 경우 출금이 제한될 수 있습니다.<br>
			- 출금 수수료는 1,000원이며 5,000원 이상부터 출금이 가능합니다.<br>
			ex) 1,000,000원 출금 요청 시 -> 1,000,000+1,000 = 1,001,000원 계정 잔고에서 차감 후 1,000,000원 출금계좌로 입금<br>
		<?php	
			}
			else 
			{
				echo "<script>alert('로그인 후 시도하여 주세요.')</script>";
				echo "<meta http-equiv=refresh content='0 url=../../../login.php'>";
				exit();
			}
		?>
	</body>
</html>