<html>
	<head>
		<?php
			if(isset($_POST['banknumber']))
			{	
		
			}
			else
			{
				echo "<script>alert('정상 적인 접근이 아닙니다.')</script>";
				echo "<meta http-equiv=refresh content='0 url=./krw.php'>";
				exit();
			}
			if(isset($_POST['bankname']))
			{
				
			}
			else
			{
				echo "<script>alert('정상 적인 접근이 아닙니다.')</script>";
				echo "<meta http-equiv=refresh content='0 url=./krw.php'>";
				exit();
			}
			if(isset($_POST['money_out_value']))
			{
				
			}
			else
			{
				echo "<script>alert('정상 적인 접근이 아닙니다.')</script>";
				echo "<meta http-equiv=refresh content='0 url=./krw.php'>";
				exit();
			}
			if(isset($_POST['password2']))
			{
				
			}
			else
			{
				echo "<script>alert('정상 적인 접근이 아닙니다.')</script>";
				echo "<meta http-equiv=refresh content='0 url=./krw.php'>";
				exit();
			}
			
			
			
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
			curl_setopt($ch, CURLOPT_POSTFIELDS, "웹사이트 비밀키".$_POST['g-recaptcha-response']);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			$result = json_decode(curl_exec($ch), true);
			curl_close($ch);
			if($result["success"] == true)
			{
				session_start();
				if(isset($_SESSION['email']))
				{
					date_default_timezone_set('Asia/Seoul');
					$date = date("Y-m-d H:i:s");
					$banknumber = ($_POST['banknumber']);
					$bankname = ($_POST['bankname']);				
					$amount = ($_POST['money_out_value']);
					$password2 = sha1(sha1(sha1($_POST['password2'])));
					$sumkrw = $amount + 1000;
					$type = "KRW";
					$ledger = "출금";
					$address = "$bankname"." "."$banknumber";
					include("../../config.php");
					$query = mysql_query("select * from accounts WHERE email='{$_SESSION['email']}'");
					$queryinformation = mysql_fetch_array($query);
					$password2check = ('SELECT * FROM accounts WHERE email="'.($_SESSION['email']).'" and 2ndpassword="'.mysql_real_escape_string($password2).'"');
					$password2checkresult = mysql_num_rows(mysql_query($password2check));
					if($password2checkresult ==1)
					{
						if($queryinformation['krw']>=$sumkrw)
						{
							$accountkrw = $queryinformation['krw']-$sumkrw;
							$updatekrw = mysql_query("update accounts set krw='".$accountkrw."' where email='".$_SESSION['email']."'");
							$intxid = mysql_query('INSERT INTO txid (email, type, address, krwamount, commission, krwsum, ing, ledger, changemoney, date, changebtc) VALUES ("'.$_SESSION['email'].'", "'.$type.'", "'.mysql_real_escape_string($address).'", "-'.mysql_real_escape_string($amount).'", "-1000", "-'.mysql_real_escape_string($sumkrw).'", "1", "출금", "'.$accountkrw.'", "'.$date.'", "'.$queryinformation['btc'].'")');
							echo "<script>alert('출금 신청이 완료 되었습니다.')</script>";
							echo "<script> parent.parent.parent.account.location.reload(true); ;</script>"; // 
							echo "<meta http-equiv=refresh content='0 url=../history/krw_inout.php'>";
						}
						else
						{
							echo "<script>alert('현재 원화(KRW) 보다 출금요청값이 더 큽니다.')</script>";
							echo "<meta http-equiv=refresh content='0 url=./krw.php'>";
						}	
					}
					else
					{
						echo "<script>alert('2차 비밀번호가 일치 하지 않습니다.')</script>";
						echo "<meta http-equiv=refresh content='0 url=./krw.php'>";
					}		
		?>
		<title>마에스트로거래소 - 원화(KRW) 출금 실행 페이지<title>
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
