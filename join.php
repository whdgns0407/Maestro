<?php
	session_start();
	if(isset($_SESSION['email']))
	{
		echo "<script>alert('로그인 되어 있습니다. 로그아웃 후 회원가입 가능합니다.')</script>";
		echo "<meta http-equiv=refresh content='0 url=./index.php'>";
		exit();
	}
?>



<html>
	<head>
		<title>마에스트로 거래소 회원가입 신청 페이지</title>
		<meta charset="UTF-8">
		<link rel="shortcut icon" type="image/x-icon" href="./icon.ico">
		<script src='https://www.google.com/recaptcha/api.js'></script>
		<meta name="viewport" content="width=device-width", initial-scale="1">
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
		<script src="./js/bootstrap.js"></script>
		<link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<link rel="shortcut icon" type="image/x-icon" href="./icon.ico">
	</head>
	<body>
		<div class="container">
			<div class="row vertical-offset-100">
				<div class="col-md-4 col-md-offset-4">
					<div class="panel panel-default">
						<div class="panel-heading">                                
							<div class="row-fluid user-row" style="background-color:white;">
								<img src="./logo.png" class="img-responsive" alt="Conxole Admin" style="background-color:white;">
							</div>
						</div>
						<div class="panel-body">
							<form action="./join_do.php" method="POST" accept-charset="UTF-8" role="form" class="form-signin">
								<fieldset>
									<label class="panel-login">
										<div class="login_result">마에스트로거래소 회원가입</div>
									</label>
									<input type="email" class="form-control" id="email" name="email" maxlength="30" placeholder="사용할 이메일 주소" required autofocus>
									<input type="text" class="form-control" id="name" name="name" maxlength="30" placeholder="사용할 닉네임" required autofocus>
									<input type="password" class="form-control" id="pass" name="pass" maxlength="30" placeholder="비밀번호" required>
									<input type="password" class="form-control" id="vpass" name="vpass" maxlength="30" placeholder="비밀번호 확인" required>
									<input type="password" class="form-control" id="2pass" name="2pass" maxlength="30"placeholder="2차비밀번호" required>
									<input type="password" class="form-control" id="v2pass" name="v2pass" maxlength="30" placeholder="2차비밀번호 확인" required>
									<input type="text" class="form-control" id="realname" name="realname" maxlength="30" placeholder="성명" required autofocus>
									<input type="text" class="form-control" id="birth" name="birth" maxlength="6" placeholder="주민등록 앞 6자리" required autofocus>
									<br>
									<input class="btn btn-lg btn-success btn-block" type="submit" id="login" value="회원가입 »">
								</fieldset>
								<div class="g-recaptcha" data-sitekey="6Lfql3IUAAAAAIPSbublCv7O46I22qKLnKNN5Cbd" align="center"></div>
							</form>	
						</div>
						<a href="./login.php"><input class="btn btn-lg btn-success btn-block" type="button" value="로그인"></a>
						<a href="./index.php"><input class="btn btn-lg btn-success btn-block" type="button" value="메인화면"></a>
					</div>
				</div>
			</div>
		</div>
	
	
		<!--
		<div align="center">
			<form action="./join_do.php" method="POST" autocomplete="off">
				<table cellspacing="1" cellpadding="5">
					<tr>
						<td class="list title" colspan="2" align="center">
						<b>마에스트로 거래소 회원가입</b>
						</td>
					</tr>
					<tr>
						<td class="list" align="right">
							<label for="name">이메일주소 : </label>
						</td>
						<td class="list">
							<input type="email" id="email" name="email" maxlength="30" placeholder="이메일주소" required autofocus>
						</td>
					</tr>
					<tr>
						<td class="list" align="right">
							<label for="name">닉네임 :</label>
						</td>
						<td class="list">
							<input type="text" id="name" name="name" maxlength="30" placeholder="닉네임" required autofocus>
						</td>
					</tr>
					<tr>
						<td class="list" align="right">
						<label for="pass">비밀번호 :</label>
						</td>
						<td class="list">
							<input type="password" id="pass" name="pass" maxlength="30" placeholder="비밀번호" required>
						</td>
					</tr>
					<tr>
						<td class="list" align="right">
							<label for="vpass">비밀번호 확인 :</label>
						</td>
						<td class="list">
							<input type="password" id="vpass" name="vpass" maxlength="30" placeholder="비밀번호 확인" required>
						</td>
					</tr>
					<tr>
						<td class="list" align="right">
							<label for="2pass">2차비밀번호 :</label>
						</td>
						<td class="list">
							<input type="password" id="2pass" name="2pass" maxlength="30"placeholder="2차비밀번호" required>
						</td>
					</tr>
					<tr>
						<td class="list" align="right">
							<label for="v2pass">2차비밀번호 확인 :</label>
						</td>
						<td class="list">
							<input type="password" id="v2pass" name="v2pass" maxlength="30" placeholder="2차비밀번호 확인" required>
						</td>
					</tr>
					<tr>
						<td class="list" align="right">
							<label for="birth">성명 : </label>+
						</td>
						<td class="list">
							<input type="text" id="realname" name="realname" maxlength="30" placeholder="성명" required autofocus>
						</td>
					</tr>					
					<tr>
						<td class="list" align="right">
							<label for="birth">생년월일 : </label>
						</td>
						<td class="list">
							<input type="date" id="birth" name="birth" maxlength="30" required autofocus>
						</td>
					</tr>
					<tr>
						<td class="list" align="middle" colspan="2">
							<button type="submit">회원가입</button>

							<input type="hidden" id="remoteip" name="remoteip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
							<div class="g-recaptcha" data-sitekey="6Lfql3IUAAAAAIPSbublCv7O46I22qKLnKNN5Cbd"></div>
						</td>
					</tr>
				</table>
			</form>
		</div>
		-->
		
	</body>
</html>