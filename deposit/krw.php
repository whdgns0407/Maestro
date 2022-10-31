<?php
	session_start();
	if(isset($_SESSION['email']))
	{
		include("../../config.php");
		$query = mysql_query("select * from accounts WHERE email='{$_SESSION['email']}'");
		$queryinformation = mysql_fetch_array($query);
		$walletquery = mysql_query("select * from wallet WHERE id='{$queryinformation['id']}'");
		$walletinformation = mysql_fetch_array($walletquery);
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
		<title>마에스트로거래소 원화입금페이지</title>
		<meta name="viewport" content="initial-scale=1.0; maximum-scale=0.75; minimum-scale=1.0; user-scalable=1;width=device-width;"/>
		
	</head>
	<body>
		<h1>마에스트로거래소 원화 입금 페이지</h1>

		<font color="red"><b>
			경찰, 검찰, 국가기관 등의 연락을 받고 현재페이지에서 입금 하고 있는 경우 100% 사기이오니 입금을 중단하시고, 고객센터로 즉시 신고 바랍니다.<br>
			대출, 이자의 감면을 목적으로 해당거래소에 입금을 요구하여 비트코인출금을 요구할 경우 100%사기 이오니 입금을 중단하시고, 고객센터로 즉시 신고 바랍니다.<br><br><br></b>
		</font>
		<table border="1">
			<tr>
				<th colspan="4">입금 계좌번호 안내</th>
			</tr>
			<tr>
				<td>입금 계좌번호</td>
				<td colspan="3">302-1209-0453-21</td>
			</tr>
			<tr>
				<td>입금은행</td>
				<td colspan="3">농협</td>
			</td>
			<tr>
				<td>예금주</td>
				<td colspan="3">박종훈</td>
			</tr>
		</table><br>
		입금코드 : <?php echo"{$queryinformation['realname']}{$queryinformation['id']}"; ?> <font size="2" color="gray">  (받는분 통장표시에 입금코드를 입력 하여주세요.)</font><br>
		<hr><br>
			
		<font size="5" color = "red">
			<b>입금전 아래의 주의사항을 반드시 확인 해주세요. !!</b>
		</font><br>
		- 반드시 은행명 예금주 계좌번호를 확인하시기 바랍니다. <br>
		- 입금 한도는 없습니다. <br>
		- 반드시 ‘받는분통장표시’란에 ‘이름+숫자코드’를 입력해 주시기 바랍니다.<br>
		ex) 홍길동4561 (숫자코드가 없거나 다를 경우, 메모가 없는 경우, 이름과 상관없는 메모는 입금지연 해당)<br>
		ex) 타인명의 계좌에서 입금 한 경우 확인 불가 (입금지연 해당)<br><br>

		- 충전 시 KRW는 1:1 비율로 충전됩니다.( 1000원 입금 -> 1000KRW 충전)<br>
		- KRW를 처음 충전하시는 경우 72시간 동안 KRW 및 암호화폐의 출금이 제한됩니다.<br>
		- 계좌반영은 관리자 확인 후 처리되며 입금지연은 수 일에서 수 주가 소요될 수 있습니다.<br>
		- 최소 입금 금액은 5,000원 이상입니다.<br>
		- 은행 점검 시간에는 입금이 지연 될 수도 있습니다. 은행 공통 점검시간은 매일 23:00~01:00 입니다.(은행별로 차등)<br>
		- 금액 반환 시 부과되는 은행수수료는 마에스트로에서 부담하지 않습니다.<br>

	</body>
</html>
<?php
		}
		else 
		{
			echo "<script>alert('로그인 후 시도하여 주세요.')</script>";
			echo "<meta http-equiv=refresh content='0 url=../../../login.php'>";
			exit();
		}
?>