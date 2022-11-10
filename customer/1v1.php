<?php
	session_start();
	if(isset($_SESSION['email']))
	{
		include("../config.php");
		$query = mysql_query("select * from accounts WHERE email='{$_SESSION['email']}'");
		$queryinformation = mysql_fetch_array($query);
		$walletquery = mysql_query("select * from wallet WHERE id='{$queryinformation['id']}'");
		$walletinformation = mysql_fetch_array($walletquery);
	}
	else 
	{
		echo "<script>alert('로그인 후 시도하여 주세요.')</script>";
		echo "<meta http-equiv=refresh content='0 url=../../../login.php'>";
		exit();
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>마에스트로거래소 - 1:1 문의</title>
		<link rel="shortcut icon" type="image/x-icon" href="../icon.ico">
		<style>
			th{
				font-size:50px;
				font-weight:bold;
				text-align:left;
			}
			table{

				font-size:25px;
			}
		</style>
	</head>
	<body>
		<form action="./1v1_do.php" method="POST" accept-charset="UTF-8">
			<table border="0">
				<tr>
					<th></th>
					<th>1:1 문의</th>
				</tr>
				<tr>
					<td style="font-weight:bold;">제목 :</td>
					<td><input type="text" name="title" size="68" style="height:25px; font-size:20px;" required></td>
				</tr>
				<tr>
					<td style="font-weight:bold;">유형 :</td>
					<td>
						<select name="type" style="height:30px; font-size:20px;" required autofocus>
							<option value="입금출금 관련">입금/출금 관련</option>
							<option value="거래 관련">거래 관련</option>
							<option value="기술지원 및 버그 신고">기술지원 및 버그 신고</option>
							<option value="기타 문의 사항">기타 문의 사항</option>
							<option value="건의 관련">건의 관련</option>
							<option value="건의 관련">회원탈퇴 관련</option>
						</select><br>
					</td>
				</tr>
				<tr>
					<td style="font-weight:bold; vertical-align:text-top;">내용 :</td>
					<td><textarea name="content" cols="
					70" rows="40" style="font-size:20px;" placeholder="문의 내용 또는 문제 상황을 최대한 자세하게 기술해주십시오.

1. 발생 일시
2. 오류 시 발생한 페이지 명
3. 암호화폐 입/출금 누락시 TXID / 입금 주소 / 암호화폐명 을 반드시 기재해주시기 바랍니다.
4. [회원 탈퇴시] 탈퇴 사유" required></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" value="문의하기" style="font-size:30px; font-weight:bold; float:right; width:160px; height:60px;">
					</td>
				</tr>
	
			</table>
		</form>
	</body>
</html>