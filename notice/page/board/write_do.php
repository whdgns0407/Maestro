<html>
	<head>
		<title>마에스트로 거래소 공지사항 글쓰기 실행페이지</title>
	</head>
	<body>
		<?php
			session_start();
			if(isset($_SESSION['email']))
			{
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
				curl_setopt($ch, CURLOPT_POSTFIELDS, "사이트 비밀키"&response=".$_POST['g-recaptcha-response']);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POST, 1);
				$result = json_decode(curl_exec($ch), true);
				curl_close($ch);
				if($result["success"] == true)
				{
					include "../../../config.php";
					date_default_timezone_set('Asia/Seoul');
					$date = date("y-m-d");
					$datem = date("Y-m-d H:i:s");
					$query = mysql_query("select * from accounts WHERE email='{$_SESSION['email']}'");
					$queryinformation = mysql_fetch_array($query);
					
					if($queryinformation['name']=="admin")
					{

							$sss = mysql_query('INSERT INTO notice (name, pw, title, content, date, hit, datem) VALUES ( "'.$queryinformation['name'].'" , "'.$queryinformation['email'].'", "'.mysql_real_escape_string($_POST['title']).'", "'.mysql_real_escape_string($_POST['content']).'", "'.$date.'", "0", "'.$datem.'")');
							echo "<script>alert('공지사항 작성이 완료 되었습니다.')</script>";
							echo "<meta http-equiv=refresh content='0 url=../../notice.php'>";
					}
				}
				else
				{
					echo "<script>alert('로봇 방지를 체크한 후 시도하여 주십시오.')</script>";
					echo "<meta http-equiv=refresh content='0 url=./write.php'>";
				}
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