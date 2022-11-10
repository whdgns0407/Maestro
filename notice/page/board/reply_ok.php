<?php
	session_start();
	if(isset($_SESSION['email']))
		{
			include "../../../config.php";
			date_default_timezone_set('Asia/Seoul');
			$bno = mysql_real_escape_string($_POST['bno']);
			$date = date("Y-m-d H:i:s");
			$query = mysql_query("select * from accounts WHERE email='{$_SESSION['email']}'");
			$queryinformation = mysql_fetch_array($query);
			
			$sql = mysql_query('insert into notice_reply (con_num, name, pw, content, date) values ("'.$bno.'", "'.$queryinformation['name'].'" , "'.$queryinformation['email'].'", "'.mysql_real_escape_string($_POST['content']).'", "'.$date.'")');
			echo "<script>alert('댓글이 작성 되었습니다.')</script>";
			echo "<meta http-equiv=refresh content='0 url=./read.php?idx=$bno'>";
			
			
		}
		else 
		{
			echo "<script>alert('로그인 후 시도하여 주세요.')</script>";
			echo "<meta http-equiv=refresh content='0 url=../../../login.php'>";
			exit();
		}
?>

