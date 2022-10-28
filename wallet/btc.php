<?php
	session_start();
	if(isset($_SESSION['email']))
	{
		include("../config.php");
		$query = mysql_query("select * from accounts WHERE email='{$_SESSION['email']}'");
		$queryinformation = mysql_fetch_array($query);
		$walletquery = mysql_query("select * from wallet WHERE id='{$queryinformation['id']}'");
		$walletinformation = mysql_fetch_array($walletquery);
	?>
<!DOCTYPE html>
<html>
	<head>
	<title>마에스트로거래소 - 지갑관리 - 원화</title>
		<style>
			nav{
				width:100%;
			}
		
			content{
				width:100%;
			}
		
			a{
				font-size:30px;
				margin-right:40px;
				text-decoration:none;
				color:black;
				font-weight:bold;
			}
			a:hover{
				font-size:35px;
			}
		</style>
	</head>
	<body>
		<nav>
			<font style="text-align: center;">
			<img width="40px" height="40px" src="btc.png" alt="코인">
			<a href="./deposit/btc.php" target="cont_a">  충전</a>
			<a href="./withdraw/btc.php" target="cont_a">출금</a>
			<a href="./history/btc_inout.php" target="cont_a">내역</a>
			<iframe name="cont_a" width="100%" height="850px" src="./deposit/btc.php"></iframe>
			</font>
		</nav>
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