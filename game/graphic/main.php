<?php
	session_start();
	if(isset($_SESSION['email']))
	{
		include("../../config.php");
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
<html>
	<head>
		<style>
			body {
				font-size:20px;
				text-align:center;
			}
		</style>
	</head>
	<body>
		<font size="7">
			<b>랜덤 뽑기</b><br>
			<img id="xb" src="graphic/roller_1.png" width="800" height="600"><br>
			<img id="xb" src="arrow.png" width="800" height="150"><br>
		</font>
	</body>

</html>