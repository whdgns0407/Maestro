<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
		<meta name="viewport" content="initial-scale=1.0; maximum-scale=0.75; minimum-scale=1.0; user-scalable=1;width=device-width;"/>
	<div align="center">
	<title>마에스트로 회원가입</title>
	</head>
	<body>
		<a href="/join.php" target="_self"><button type="submit">뒤로가기</button></a>
		<a href="/home.php" target="_self"><button type="submit">홈으로</button></a><br>
		<?php
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
			curl_setopt($ch, CURLOPT_POSTFIELDS, "secret="비밀키 입력란"&response=".$_POST['g-recaptcha-response']);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			$result = json_decode(curl_exec($ch), true);
			curl_close($ch);
			if($result["success"] == true)
			{
				date_default_timezone_set('Asia/Seoul');
				$date = date("Y-m-d H:i:s");
				$name = $_POST['name'];
				$pass = (sha1(sha1(sha1($_POST['pass']))));
				$vpass = (sha1(sha1(sha1($_POST['vpass']))));
				$pass2 = (sha1(sha1(sha1($_POST['2pass']))));
				$v2pass = (sha1(sha1(sha1($_POST['v2pass']))));
				$email = $_POST['email'];
				$birth = $_POST['birth'];
				$realname = $_POST['realname'];
				include('config.php');
				$idcheck = ('SELECT * FROM accounts WHERE name="'.mysql_real_escape_string($name).'"');
				$emailcheck = ('SELECT * FROM accounts WHERE email="'.mysql_escape_string($email).'"');
				if($name == "")
				{
					echo "<script>alert('계정을 입력 해주세요.')</script>";
					echo "<meta http-equiv=refresh content='0 url=./join.php'>";
					exit();
				}
					elseif(mysql_num_rows(mysql_query($idcheck)) >= 1 )
					{
						echo "<script>alert('이미 사용 중인 닉네임 입니다.')</script>";
						echo "<meta http-equiv=refresh content='0 url=./join.php'>";
						exit();
					}
					elseif(mysql_num_rows(mysql_query($emailcheck)) >= 1 )
					{
						echo "<script>alert('이미사용중인 이메일 입니다.')</script>";
						echo "<meta http-equiv=refresh content='0 url=./join.php'>";
						exit();
					}
					elseif($pass == "")
					{
						echo "<script>alert('비밀번호를 입력하여 주세요.')</script>";
						echo "<meta http-equiv=refresh content='0 url=./join.php'>";
						exit();
					}
					elseif($vpass != $pass)
					{
						echo "<script>alert('비밀번호 확인이 틀렸습니다.')</script>";
						echo "<meta http-equiv=refresh content='0 url=./join.php'>";
						exit();
					}
					elseif($pass2 == "")
					{
						echo "<script>alert('2차 비밀번호를 입력하여 주세요.')</script>";
						echo "<meta http-equiv=refresh content='0 url=./join.php'>";
						exit();
					}
					elseif($pass2 != $v2pass)
					{
						echo "<script>alert('2차 비밀번호 확인이 틀립니다.')</script>";
						echo "<meta http-equiv=refresh content='0 url=./join.php'>";
						exit();
					}
				else 
				{
					$join = 'INSERT INTO accounts (name, password, 2ndpassword, email, realname, birth, btc, krw) VALUES ("'.mysql_real_escape_string($name).'", "'.$pass.'", "'.$pass2.'", "'.mysql_real_escape_string($email).'", "'.mysql_real_escape_string($realname).'", "'.mysql_real_escape_string($birth).'", "0.3", "100000")';
					$event = 'INSERT INTO txid (email, type, ledger, krwsum, changemoney, memo, date, ing, krwamount) VALUES ("'.mysql_real_escape_string($email).'", "KRW", "입금", "100000", "100000", "이벤트 입금", "'.$date.'", "3", "100000")';
					$event1 = 'INSERT INTO txid (email, type, ledger, btcsum, changebtc, memo, date, ing, btcamount, changemoney) VALUES ("'.mysql_real_escape_string($email).'", "BTC", "입금", "0.3", "0.3", "이벤트 입금", "'.$date.'", "3", "0.3", "100000")';
					mysql_query($join) OR die (mysql_error());
					mysql_query($event) OR die (mysql_error());
					mysql_query($event1) OR die (mysql_error());
					echo "<script>alert('계정이 생성 되었습니다. 로그인하여 주세요.')</script>";
					echo "<meta http-equiv=refresh content='0 url=./login.php'>";
				}
			}
			else
			{
				echo "<script>alert('로봇이 아닙니다. 를 체크하여 주세요.')</script>";
				echo "<meta http-equiv=refresh content='0 url=./join.php'>";
			}
		?>
	</body>
</html>
