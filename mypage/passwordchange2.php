<?php
	session_start();
	if(isset($_SESSION['email']))
	{
		$ch = curl_init();	
		curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
		curl_setopt($ch, CURLOPT_POSTFIELDS, "secret=사이트비밀키&response=".$_POST['g-recaptcha-response']);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		$robot = json_decode(curl_exec($ch), true);
		curl_close($ch);
		if($robot["success"] == true)
		{
		}
		else
		{
			echo "<script>alert('로봇이 아닙니다. 를 체크하여 주세요.')</script>";
			echo "<meta http-equiv=refresh content='0 url=./index.php'>";
			exit();
		}
		
		include("../config.php");
		$password2 = (sha1(sha1(sha1($_POST['password2']))));
		$password2check = (sha1(sha1(sha1($_POST['password2check']))));
		$password2check1 = (sha1(sha1(sha1($_POST['password2check1']))));
		
		
		$password2result = mysql_num_rows(mysql_query('SELECT * FROM accounts WHERE email="'.mysql_real_escape_string($_SESSION['email']).'" and 2ndpassword="'.mysql_real_escape_string($password2).'"'));
		if($password2 == "")
		{
			echo "<script>alert('패스워드를 입력하여주세요.')</script>";
			echo "<meta http-equiv=refresh content='0 url=./index.php'>";
			exit();
		}
			elseif($password2check =="")
			{
				echo "<script>alert('변경할 2차비밀번호를 입력하여주세요.')</script>";
				echo "<meta http-equiv=refresh content='0 url=./index.php'>";
				exit();
			}
			elseif($password2check1 =="")
			{
				echo "<script>alert('변경할 2차비밀번호 확인을 입력하여주세요.')</script>";
				echo "<meta http-equiv=refresh content='0 url=./index.php'>";
				exit();
			}
			elseif($password2check != $password2check1)
			{
				echo "<script>alert('변경할 2차비밀번호와 변경할 2차비밀번호 확인값이 일치 하지 않습니다.')</script>";
				echo "<meta http-equiv=refresh content='0 url=./index.php'>";
				exit();
			}
			elseif($password2result != 1)
			{
				echo "<script>alert('2차비밀번호가 일치 하지 않습니다..')</script>";
				echo "<meta http-equiv=refresh content='0 url=./index.php'>";
				exit();
			}
		else
		{
			$updatepassword2 = mysql_query("update accounts set 2ndpassword='".mysql_escape_string($password2check)."' where email='".mysql_real_escape_string($_SESSION['email'])."'");
			echo "<script>alert('2차 비밀번호가 변경 되었습니다.')</script>";
			echo "<meta http-equiv=refresh content='0 url=./index.php'>";
		}
	}
	else 
	{
		echo "<script>alert('로그인 후 시도하여 주세요.')</script>";
		echo "<meta http-equiv=refresh content='0 url=../../../login.php'>";
		exit();
	}
?>