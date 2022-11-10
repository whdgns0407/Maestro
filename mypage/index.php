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
		echo "<script>alert('로그인 후 이용 해주세요.')</script>";
		echo "<meta http-equiv=refresh content='0 url=../login.php'>";
		exit();
	}
?>

<html>
	<head>
		<title>마에스트로 거래소 마이페이지</title>
		<link rel="shortcut icon" type="image/x-icon" href="../icon.ico">
		<script src='https://www.google.com/recaptcha/api.js'></script>
		<meta name="viewport" content="width=device-width", initial-scale="1">
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
		<script src="./js/bootstrap.js"></script>
		<link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<link rel="shortcut icon" type="image/x-icon" href="./icon.ico">
		<script>
			function close_window() {
				close();
			}
		</script>
	</head>
	<body>
		<div class="container">
			<div class="row vertical-offset-100">
				<div class="col-md-4 col-md-offset-4">
					<div class="panel panel-default">
						<div class="panel-heading">                                
							<h1>마에스트로거래소 - 마이페이지</h1>
						</div>
						<div class="panel-body">
							<fieldset>
								<label class="panel-login">
									<div class="login_result" align="center">이메일 주소</div>
								</label>
								<input type="text" class="form-control" value="<?php echo "{$queryinformation['email']}"; ?>" readonly>
								<label class="panel-login">
									<div class="login_result" align="center">닉네임</div>
								</label>
								<input type="text" class="form-control"  value="<?php echo "{$queryinformation['name']}"; ?>" readonly>
								<form action="./passwordchange.php" method="post">
									<label class="panel-login">
										<div class="login_result" align="center">비밀번호 변경</div>
									</label>
									<input type="password" class="form-control"  name="password" placeholder="현재 비밀번호" required>
									<input type="password" class="form-control"  name="passwordcheck" placeholder="변경할 비밀번호" required>
									<input type="password" class="form-control"  name="passwordcheck1" placeholder="변경할 비밀번호 확인" required>
									<input class="btn btn-lg btn-success btn-block" type="submit" id="login" value="비밀번호 변경">
									<div class="g-recaptcha" data-sitekey="6Lfql3IUAAAAAIPSbublCv7O46I22qKLnKNN5Cbd" align="center"></div>	
								</form>
								<form action="./passwordchange2.php" method="post">
									<label class="panel-login">
										<div class="login_result" align="center">2차 비밀번호 변경</div>
									</label>
									<input type="password" class="form-control"  name="password2" placeholder="현재 2차 비밀번호" required>
									<input type="password" class="form-control"  name="password2check" placeholder="변경할 2차 비밀번호" required>
									<input type="password" class="form-control"  name="password2check1" placeholder="변경할 2차 비밀번호 확인" required>
									<input class="btn btn-lg btn-success btn-block" type="submit" id="login" value="2차 비밀번호 변경">
									<div class="g-recaptcha" data-sitekey="6Lfql3IUAAAAAIPSbublCv7O46I22qKLnKNN5Cbd" align="center"></div>
								</form>
								<input class="btn btn-lg btn-success btn-block" onclick="javascript:close_window();" type="submit" id="login" value="닫기">
							</fieldset>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>