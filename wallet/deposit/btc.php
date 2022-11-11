<!DOCTYPE html>
<html>
	<head>
		<title>마에스트로 비트코인 입금 창</title>
		<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
		<meta name="viewport" content="initial-scale=1.0; maximum-scale=0.75; minimum-scale=1.0; user-scalable=1;width=device-width;"/>
		<script>
		function copy_to_clipboard() {
			var copyText = document.getElementById("myInput");
			copyText.select();
			document.execCommand("Copy");
		}
		</script>
	</head>
	<body>
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
		<p><?php echo "{$queryinformation['name']}";  ?>님의 비트코인 입금 주소 (비트코인 입금전용)</p>
		<p><input id="myInput" value="<?php echo "{$walletinformation['btc']}"; ?>" style="width:47%; height:7%; font-size:20px;" readonly></b></font></p>
		<input type="button" onclick="copy_to_clipboard()" value="복사하기"><br>
		<p><font size="10px"><hr>QR코드 </font></p>
		<img src="http://qrcode.kaywa.com/img.php?d=<?php echo "{$walletinformation['btc']}"; ?>" style="width:23%;" border="4"><br><br>
		<font size="3px"><hr>
		<font size="5px" color="red"><b>입금전 아래의 주의사항을 반드시 확인 해주세요!</b></font><br>
		<a href="../../notice/page/board/read.php?idx=3" target="_blank">신종 지갑주소 입력값 변환 악성코드 주의</a><br>
		위 주소로는 비트코인만 입금 가능합니다.<br>
		입금 한도는 없으며, 최소입금금액도 없습니다.<br>
		해당 주소로 다른 암호화폐를 입금 시도할 경우에 발생할 수 있는 오류/손실은 복구가 불가능합니다.<br>
		1번의 confirmation이 발생한 이후 계좌에 반영되며, 이 과정은 약 10~30분 정도 걸립니다.<br>
		위 주소는 입금전용 주소입니다.<br>
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