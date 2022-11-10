<html>
	<head>
		<title>마에스트로거래소 자유게시판 - 게시글삭제</title>
	</head>
	<body>
		<?php
			session_start();
			if(isset($_SESSION['email']))
			{
				include "../../../config.php";
				$query = mysql_query("select * from accounts WHERE email='{$_SESSION['email']}'");
				$queryinformation = mysql_fetch_array($query);
				$bno = mysql_escape_string($_GET['idx']);
				$bnoquery = mysql_query("select * from notice WHERE idx='$bno'");
				$bnoinformation = mysql_fetch_array($bnoquery);
				
				if($queryinformation['name'] == $bnoinformation['name'])
				{
					$sql = mysql_query("delete from notice where idx='$bno';");
					echo "<script>alert('삭제완료')</script>";
					echo "<meta http-equiv=refresh content='0 url=../../../board/board.php'>";
				}
				else
				{
					echo "<script>alert('현재 로그인된 아이디와 글쓴 아이디가 다릅니다.')</script>";
					echo "<meta http-equiv=refresh content='0 url=./read.php?idx=$bno'>";
					exit();
				}
			}
			else 
			{
				echo "<script>alert('로그인 후 시도하여 주세요.')</script>";
				echo "<meta http-equiv=refresh content='0 url=../../../login.php'>";
			}
		?>
	</body>
</html>