<html>
	<head>
		<title>마에스트로 거래소 게시글 수정페이지</title>
	</head>
	<body>
		<?php
			session_start();
			if(isset($_SESSION['email']))
			{
				include "../../../config.php";
				$query = mysql_query("select * from accounts WHERE email='{$_SESSION['email']}'");
				$queryinformation = mysql_fetch_array($query);
				
				
				$bno = mysql_real_escape_string($_POST['idx']);
				$bnoquery = mysql_query("select * from board WHERE idx='$bno'");
				$bnoinformation = mysql_fetch_array($bnoquery);
				
				if($queryinformation['email'] = $bnoinformation['pw'])
				{
					$title = mysql_real_escape_string($_POST['title']);
					$content = mysql_real_escape_string($_POST['content']);
					$sql = mysql_query("update board set title='".$title."',content='".$content."' where idx='".$bno."'");
					echo "<script>alert('게시글이 수정 되었습니다.')</script>";
					echo "<meta http-equiv=refresh content='0 url=../read.php?idx=$bno'>";
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
				exit();
			}
		?>
	</body>
</html>