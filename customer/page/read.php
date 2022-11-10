<!doctype html>
	<?php
		if(isset($_GET['idx']))
		{
		}
		else
		{
			echo "<script>alert('정상적인 접근이 아닙니다.')</script>";
			exit();
		}

		include "../../config.php";
		
		session_start();
		if(isset($_SESSION['email']))
		{
			$query = mysql_query("select * from accounts WHERE email='{$_SESSION['email']}'");
			$queryinformation = mysql_fetch_array($query);
		}
		else
		{
			echo "<script>alert('로그인 후 이용하여 주세요.')</script>";
			echo "<meta http-equiv=refresh content='0 url=../../login.php'>";
			exit();	
			
		}
		$bno = mysql_real_escape_string($_GET['idx']); 
		$emailcheck = mysql_fetch_array(mysql_query("select * from customer WHERE idx='{$bno}'"));
		
		if($emailcheck['email']!=$queryinformation['email'])
		{
			echo "<script>alert('문의한 사람이 아닙니다.')</script>";
			exit();
		}
		$sql = mysql_query("select * from customer where idx='".$bno."'"); 
		$board = mysql_fetch_array($sql);
	?>
	<head>
		<link rel="shortcut icon" type="image/x-icon" href="../../icon.ico">
		<meta charset="UTF-8">
		<title><?php echo strip_tags($board['title']);?></title>
		<link rel="stylesheet" type="text/css" href="./read.css" />
		<link rel="stylesheet" type="text/css" href="./reply.css" />
		<script>
			function close_window() {
				close();
			}
		</script>
	</head>
	<body>
		<div id="board_read">
			<h2>문의제목 </h2>
			<h2><?php echo strip_tags($board['title']); ?></h2>
			<div id="bo_content">
				<h4>문의내용</h4>
				<?php
					echo strip_tags(nl2br("$board[content]"));
				?>
			</div>
			<div class="reply_view">
				<h3>답변내역</h3>
				<div class="dap_lo">
					<div class="dap_to comt_edit"><?php if($board['reply']=="") echo"관리자가 답변을 준비중 입니다."; else echo strip_tags($board['reply']); ?></div>
				</div>
			</div>
			<div align="center">
				<input type="button" onclick="javascript:close_window();" value="닫기" style="width:100%; height:50px; font-size:30px;">
			</div>
		</div>
	</body>
</html>