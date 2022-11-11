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
				$possiblebtc = $queryinformation['btc']-0.0001;		
				if($possiblebtc <= 0)
				{
					$possiblebtc=0;
				}
		?>
		<title>마에스트로 거래소 비트코인 출금 페이지</title>
		<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
		<meta name="viewport" content="initial-scale=1.0; maximum-scale=0.75; minimum-scale=1.0; user-scalable=1;width=device-width;"/>
		<script src="https://www.google.com/recaptcha/api.js"></script>
		<script>
			function maxbtc(){
				var btc;
				btc = parseFloat(<?php echo "{$possiblebtc}"; ?>);
				document.getElementById("btcamount").value = btc;
				
			}
			function btcamountupdate(){
				var btcamount = document.getElementById("btcamount");
				var btcamount_output = document.getElementById("btcamount_output");
				btcamount_output.innerHTML = btcamount.value;
			}
			function btcaddressupdate() {
				var address_input = document.getElementById("address_input");
				var btcaddress_output = document.getElementById("btcaddress_output");
				btcaddress_output.innerHTML = address_input.value;
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
			경찰, 검찰, 국가기관 등의 연락을 받고 비트코인을 출금 하고 있는 경우 100% 사기이오니 출금을 중단하시고, 고객센터로 즉시 신고 바랍니다.<br>
			마에스트로 거래소에서는 어떠한 경우에도 회원님에게 비밀번호, 2차 비밀번호를 절대로 요구하지 않습니다. (100% 사칭 사기)<br>
			만약, 해당 전화를 받아 아이디 비밀번호 2차비밀번호를 알려준 경우 비밀번호, 2차비밀번호 를 즉시 변경 하여 주시고, 고객센터로 신고 하여 주십시오.<br><br><br></b>
		</font>
		<form action="./btc_do.php" method="post">
			<font size="5"> 보유 BTC : <b><?php echo "{$queryinformation['btc']}"; ?> BTC</b></font><br>
			<font size="5"> 출금 가능 BTC : <b><?php echo "{$possiblebtc}"; ?> BTC   </font><font size="2px" color="gray">(출금수수료 0.0001 BTC)</font><br><br>
			출금 수량(BTC) : <input type="number" id="btcamount" onchange="btcamountupdate();" step="0.0001" onkeyup="btcamountupdate();" min="0.0001" placeholder="<?php echo "{$possiblebtc}"; ?> 가능" max="<?php echo "{$possiblebtc}"; ?>" name="btcamount" maxlength="6" size="12" required>
			BTC <input type="button" value="최대" onclick="maxbtc();">
			<font size="2" color="blue"><b><span id="btcamount_output"></span></b> BTC </font>			
			<font size="1" color="gray">(입력한 BTC 개수는 블록체인 네트워크로 그대로 전송 되며, 내 거래소 지갑에서 블록체인 네트워크 수수료 0.0001BTC가 수수료로 차감 됩니다.)</font><br>
			출금 비트코인(BTC) 주소 : <input type="text" id="address_input" name="address" onchange="btcaddressupdate();" onkeyup="btcaddressupdate();" placeholder="출금 할 외부 BTC지갑주소" required autofocus><!-- 지갑 주소 최대 길이만큼 조절할것. -->
			<font size="2" color="blue"><b><span id="btcaddress_output"></span></b></font><br>			
			로그인 비밀번호 :  <input type="password" name="password" placeholder="로그인 비밀번호" required autofocus><!-- 지갑 주소 최대 길이만큼 조절할것. --><br>
			2차 비밀번호   :  <input type="password" name="password2" placeholder="2차 비밀번호" required autofocus><!-- 지갑 주소 최대 길이만큼 조절할것. --><br><br></b>
			<input type="hidden" id="remoteip" name="remoteip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
			<div class="g-recaptcha" data-sitekey="6Lfkl3IUAAAAANzP4A06Bk7Y70RPVJ_2c-OWEz6E"></div>
			<input type="submit" value="출금신청"><br>
		</form>
		<font size="4px">
			<font size = "5px" font color="red">
				<b>출금전 아래의 주의사항을 반드시 확인 해주세요!</b><br>
			</font>
			<b>검찰, 경찰, 국가기관 등의 연락을 받고 현재 페이지에서 출금 하고 있을 경우, 절대로 출금하지 마시고 고객센터로 신고 하여주세요.</b><br>
			<a href="../../notice/page/board/read.php?idx=3" target="_blank">신종 지갑주소 입력값 변환 악성코드 주의</a><br>
			최소 출금수량은 없으며, 소숫점 4번째 자리 까지 출금가능합니다.<br>
			1회, 1일 최대 출금가능한 BTC는 무제한 입니다.<br>
			최소 출금 BTC는 0.0001BTC 입니다.<br>
			수수료는 블록체인 네트워크 사정에 따라 수시로 변경 될 수 있습니다.<br>
			출금신청 후 입금받는 지갑에서 입금내역을 확인하기까지 보통 30분~1시간 정도의 시간이 소요되며, 상황에 따라 지연이 발생할 수 있습니다.<br>
			다른 거래소 지갑으로 송금하는 경우에는 해당 거래소 정책의 영향을 받을 수 있습니다.<br>
			암호화폐의 특성상 출금 신청이 완료되면 취소할 수 없습니다.<br>
			보내기 전 주소를 꼭 확인해 주세요.<br>
			비트코인은 비트코인 지갑으로만 송금 가능합니다.<br>
			출금신청 완료 이후의 송금 과정은 블록체인 네트워크에서 처리됩니다.<br>
			이 과정에서 발생하는 송금 지연 등의 문제는 마에스트로 거래소에서 처리가 불가능합니다.<br>
			출금 수수료는 0.0001BTC 입니다.<br>
			ex) 1BTC 출금 요청 시 -> 1BTC+0.0001BTC(수수료) = 1.0001BTC 계정 잔고에서 차감 후 1BTC를 출금주소로 전송<br>
		</font>
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