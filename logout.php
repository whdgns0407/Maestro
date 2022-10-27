<html>
	<head>
	</head>
	<body>
		<?php
		session_start();        
		if(isset($_SESSION['email'])){
			echo "로그아웃 중입니다.";
			unset($_SESSION['email']);
			session_destroy();
			echo "<script> window.top.location.reload(); </script>";
			echo "<meta http-equiv=refresh content='0 url=./index.php'>";
			
			exit();
		}
			echo "<meta http-equiv=refresh content='0 url=./index.php'>";
		?>
	</body>
<html>
