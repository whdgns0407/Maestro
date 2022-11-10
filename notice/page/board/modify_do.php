<html>
	<head>
		<title>마에스트로 거래소 공지사항 수정페이지</title>
	</head>
	<body>
		<?php
		
			include "../../../config.php";
			session_start();
			if(isset($_SESSION['email']))
			{
				$query = mysql_query("select * from accounts WHERE email='{$_SESSION['email']}'");
				$queryinformation = mysql_fetch_array($query);
				$bno = mysql_real_escape_string($_POST['idx']);
				$bnoquery = mysql_query("select * from notice WHERE idx='$bno'");
				$bnoinformation = mysql_fetch_array($bnoquery);
			
				if($queryinformation['name'] == "admin")
				{
					$bno = mysql_real_escape_string($_POST['idx']);
					$title = mysql_real_escape_string($_POST['title']);
					$content = mysql_real_escape_string($_POST['content']);
					$sql = mysql_query("update notice set title='".$title."',content='".$content."' where idx='".$bno."'");
					echo "<script>alert('게시글이 수정 되었습니다.')</script>";
					echo "<meta http-equiv=refresh content='0 url=../read.php?idx=$bno'>";
				}
				else
				{
					echo "<script>alert('관리자가 아닙니다.')</script>";
					echo "<meta http-equiv=refresh content='0 url=./read.php?idx=$bno'>";
					exit();
				}
			}
			else 
			{
				header("Location: ../../../login.php");
				exit();
			}	
		?>
	</body>
</html>