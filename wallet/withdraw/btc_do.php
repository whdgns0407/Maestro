<html>
	<head>
		<?php
		
			if(isset($_POST['btcamount']))
			{	
		
			}
			else
			{
				echo "<script>alert('정상 적인 접근이 아닙니다.')</script>";
				echo "<meta http-equiv=refresh content='0 url=./btc.php'>";
				exit();
			}
			if(isset($_POST['address']))
			{
				
			}
			else
			{
				echo "<script>alert('정상 적인 접근이 아닙니다.')</script>";
				echo "<meta http-equiv=refresh content='0 url=./btc.php'>";
				exit();
			}
			if(isset($_POST['password']))
			{
				
			}
			else
			{
				echo "<script>alert('정상 적인 접근이 아닙니다.')</script>";
				echo "<meta http-equiv=refresh content='0 url=./btc.php'>";
				exit();
			}
			if(isset($_POST['password2']))
			{
				
			}
			else
			{
				echo "<script>alert('정상 적인 접근이 아닙니다.')</script>";
				echo "<meta http-equiv=refresh content='0 url=./btc.php'>";
				exit();
			}
			
			
			date_default_timezone_set('Asia/Seoul');
			$btcamount = ($_POST['btcamount']);
			$date = date("Y-m-d H:i:s");
			$address = ($_POST['address']);
			$password = sha1(sha1(sha1($_POST['password'])));
			$password2 = sha1(sha1(sha1($_POST['password2'])));
			$sumbtc = $btcamount + 0.0001;
			$type = "BTC";
			$ledger = "출금";
		
		
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
			curl_setopt($ch, CURLOPT_POSTFIELDS, "secret=웹사이트 비밀키&response=".$_POST['g-recaptcha-response']);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			$result = json_decode(curl_exec($ch), true);
			curl_close($ch);
			if($result["success"] == true)
			{
				session_start();
				if(isset($_SESSION['email']))
				{
					include("../../config.php");
					$query = mysql_query("select * from accounts WHERE email='{$_SESSION['email']}'");
					$queryinformation = mysql_fetch_array($query);
					
					$password2check = ('SELECT * FROM accounts WHERE email="'.($_SESSION['email']).'" and 2ndpassword="'.mysql_real_escape_string($password2).'"');
					$password2checkresult = mysql_num_rows(mysql_query($password2check));
					
					
					$passwordcheck = ('SELECT * FROM accounts WHERE email="'.($_SESSION['email']).'" and password="'.mysql_real_escape_string($password).'"');
					$passwordcheckresult = mysql_num_rows(mysql_query($passwordcheck)); 

					if(($password2checkresult==1) & ($passwordcheckresult==1))
					{
						if($queryinformation['btc']>=$sumbtc)
						{
							$accountbtc = $queryinformation['btc']-$sumbtc;
							$updatebtc = mysql_query("update accounts set btc='".$accountbtc."' where email='".$_SESSION['email']."'");
							$intxid = mysql_query('INSERT INTO txid (email, type, address, btcamount, commission, btcsum, ing, ledger, changebtc, date, changemoney) VALUES ("'.$_SESSION['email'].'", "'.$type.'", "'.mysql_real_escape_string($address).'", "-'.mysql_real_escape_string($btcamount).'", "-0.0001", "-'.mysql_real_escape_string($sumbtc).'", "1", "출금", "'.$accountbtc.'", "'.$date.'", "'.$queryinformation['krw'].'")');
							echo "<script>alert('출금 신청이 완료 되었습니다.')</script>";
							echo "<script> parent.parent.parent.account.location.reload(true); ;</script>"; 
							echo "<meta http-equiv=refresh content='0 url=../history/btc_inout.php'>";
						}
						else
						{
							echo "<script>alert('현재 비트코인(BTC) 보다 출금요청값이 더 큽니다.')</script>";
							echo "<meta http-equiv=refresh content='0 url=./btc.php'>";
						}	
					}
					else
					{
						echo "<script>alert('비밀번호 또는 2차비밀번호가 일치 하지 않습니다.')</script>";
						echo "<meta http-equiv=refresh content='0 url=./btc.php'>";
					}		
		?>
		<title>마에스트로거래소 - 비트코인(BTC) 출금 실행 페이지<title>
	</head>
	<body>
		<?php
				}
				else 
				{
					echo "<script>alert('로그인 후 시도하여 주세요.')</script>";
					echo "<meta http-equiv=refresh content='0 url=../../../login.php'>";
					exit();
				}
			}
			else
			{
				echo "<script>alert('로봇이 아닙니다. 를 체크하여 주세요.')</script>";
				echo "<meta http-equiv=refresh content='0 url=./krw.php'>";
			}
		?>
	</body>
</html>
