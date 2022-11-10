<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<script src="https://www.google.com/recaptcha/api.js"></script>
		<title>마에스트로거래소 자유게시판 - 글쓰기</title>
		<link rel="stylesheet" type="text/css" href="./write.css" />
	</head>
	<body>
		<?php
			session_start();
			if(isset($_SESSION['email']))
			{
			}
			else 
			{
				echo "<script>alert('로그인 후 시도하여 주세요.')</script>";
				echo "<meta http-equiv=refresh content='0 url=../../../login.php'>";
				exit();
			}
		?>
		<div id="board_write">
			<h1><a href="../../index.php">자유게시판</a></h1>
			<h4>마에스트로 거래소 자유게시판 - 글쓰기</h4>
			<div id="write_area">
				<form action="write_do.php" method="post">
					<div id="in_title">
						<textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required></textarea>
					</div>
					<div class="wi_line"></div>
					<div id="in_content">
						<textarea name="content" id="ucontent" placeholder="내용" width=500, height=100 required></textarea>
					</div>
					<input type="hidden" id="remoteip" name="remoteip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
					<div class="g-recaptcha" data-sitekey="6Lfql3IUAAAAAIPSbublCv7O46I22qKLnKNN5Cbd"></div>
					<div class="bt_se">
						<button type="submit">글 작성</button>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>