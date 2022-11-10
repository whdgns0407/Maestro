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
		<script>
			function button_down() {
				document.getElementById("ad").src = "graphic/button_clicked.png";
			}
	
			function button_up() {
				document.getElementById("ad").src = "graphic/button_stand.png";
			}
	</script>
	<style>
		body{
			<!-- background-color:??; -->
			font-size:20px;
			text-align:center;
		}
	
	</style>
	</head>
	<body>
		<iframe name="rollgame" width="100%" height="820px" src="./graphic/main.php"></iframe>	
		<form action="./graphic/call.php" method="POST" target="rollgame">
			<p style="font-size:35px;"><b>배팅 원화 입력</b></p>
			<p>사용 가능 원화 : <?php echo number_format($queryinformation['krw']) ?> KRW</p>
			<input type="number" name="krw" style="width:200px; height:50px; font-size:30px;"><b style="font-size:30px;"> KRW</b><br>
			<input id="ad" type="image" src="graphic/button_stand.png"  onclick="roll()" onmousedown="button_down()" onmouseup="button_up()">
		</form>
		<br><b>최소 1KRW 이상 배팅이 가능 합니다.</b>
		<br>공정성을 위하여 당첨확률을 공개합니다.
		<br>0배 : 54%, 1배 : 20%, 2배 : 11%, 3배 : 6%, 4배 : 5%, 5배 : 4%
		<br>해당 확률로 1원씩 100번 배팅 했을시 100원이 되는 공정성 있는 게임입니다.
	</body>
</html>