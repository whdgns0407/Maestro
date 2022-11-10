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
<html>
	<head>
		<title>마에스트로거래소 - 1:1 문의 글쓰기 실행 페이지</title>
		<link rel="shortcut icon" type="image/x-icon" href="../icon.ico">
	</head>
	
	
	<body>
		<?php
			date_default_timezone_set('Asia/Seoul');
			$date = date("Y-m-d H:i:s");
			
			
			if($_POST['title']=="")
			{
				echo "<script>alert('제목을 입력 하여 주세요.')</script>";
				echo "<meta http-equiv=refresh content='0 url=./1v1.php'>";
				exit();
			}
			if($_POST['content']=="")
			{
				echo "<script>유형을 입력 하여 주세요.')</script>";
				echo "<meta http-equiv=refresh content='0 url=./1v1.php'>";
				exit();
			}
			if($_POST['type']=="")
			{
				echo "<script>alert('내용을 입력 하여 주세요.')</script>";
				echo "<meta http-equiv=refresh content='0 url=./1v1.php'>";
				exit();
			}
			
			
			$d = mysql_query('INSERT INTO customer (title, content, type, email, date, ing) VALUES ("'.mysql_real_escape_string($_POST['title']).'", "'.mysql_real_escape_string($_POST['content']).'", "'.mysql_real_escape_string($_POST['type']).'", "'.mysql_real_escape_string($_SESSION['email']).'", "'.mysql_real_escape_string($date).'", "0")');
			echo "<meta http-equiv=refresh content='0 url=./co_list.php'>";
		?>
	</body>
</html>