<?php
	session_start();
	if(isset($_SESSION['email']))
	{
		include("../config.php");
		$query = mysql_query("select * from accounts WHERE email='{$_SESSION['email']}'");
		$queryinformation = mysql_fetch_array($query);
	}
	else 
	{
		echo "<script>alert('로그인 후 시도하여 주세요.')</script>";
		echo "<meta http-equiv=refresh content='0 url=../../../login.php'>";
		exit();
	}
	
	
	if(isset($_POST['krw']))
	{
		
	}
	else
	{
		echo "<script>alert('정상 적인 접근이 아닙니다.')</script>";
		echo "<meta http-equiv=refresh content='0 url=./numbergamemain.php'>";
		exit();
	}
	if(isset($_POST['krwmult']))
	{
		
	}
	else
	{
		echo "<script>alert('정상 적인 접근이 아닙니다.')</script>";
		echo "<meta http-equiv=refresh content='0 url=./numbergamemain.php'>";
		exit();
	}

	date_default_timezone_set('Asia/Seoul');
	$date = date("Y-m-d H:i:s");
	$random = mt_rand(1,10000);
	$krw = ($_POST['krw']);
	$krwmult = $_POST['krwmult'];
	$randomresult = $random % $krwmult;
	
	if($krw<=0)
	{
		echo "<script>alert('KRW 배팅 값이 0원 이하 입니다.')</script>";
		echo "<meta http-equiv=refresh content='0 url=./numbergamemain.php'>";
		exit();
	}
	
	if($krwmult< 2)
	{
		echo "<script>alert(' KRW 배당 값이 2 미만 입니다.')</script>";
		echo "<meta http-equiv=refresh content='0 url=./numbergamemain.php'>";
		exit();
		
	}

	if($krw == "")
	{
		echo "<script>alert('배팅 할 원화를 입력 하여주세요.')</script>";
		echo "<meta http-equiv=refresh content='0 url=./numbergamemain.php'>";
		exit();
	}
	
	if($krwmult =="")
	{
		echo "<script>alert('배당 값이 없습니다.')</script>";
		echo "<meta http-equiv=refresh content='0 url=./numbergamemain.php'>";
		exit();
	}	


	if($queryinformation['krw']<$krw)
	{
		echo "<script>alert('현재 원화보다 입력된 원화 값이 큽니다.')</script>";
		echo "<meta http-equiv=refresh content='0 url=./numbergamemain.php'>";
		exit();
	}
	echo "난수 값: $random<br>";
	echo "입력 값 : $krwmult<br>";
	echo "나머지 : $randomresult (나머지값 0일시 당첨)<br>";

	if($randomresult == 0)
	{
		$accountkrw = $queryinformation['krw']-$krw;
		$updatekrw = mysql_query("update accounts set krw='".$accountkrw."' where email='".$_SESSION['email']."'");
		$intxid = mysql_query('INSERT INTO txid (email, type, krwamount, krwsum, ing, ledger, changemoney, date, memo, changebtc) VALUES ("'.$_SESSION['email'].'", "KRW", "-'.mysql_real_escape_string($krw).'", "-'.mysql_real_escape_string($krw).'", "3", "배팅-출금", "'.$accountkrw.'", "'.$date.'", "'.mysql_real_escape_string($krw).'원 '.mysql_real_escape_string($krwmult).'배 배팅",  "'.$queryinformation['btc'].'")');
		$accountkrw = $accountkrw + ($krw*$krwmult);
		$sumkrw = $krw*$krwmult;
		$updatekrw = mysql_query("update accounts set krw='".$accountkrw."' where email='".$_SESSION['email']."'");
		$intxid = mysql_query('INSERT INTO txid (email, type, krwamount, krwsum, ing, ledger, changemoney, date, memo, changebtc) VALUES ("'.$_SESSION['email'].'", "KRW", "'.mysql_real_escape_string($sumkrw).'", "'.mysql_real_escape_string($sumkrw).'", "3", "배팅-입금", "'.$accountkrw.'", "'.$date.'", "당첨금", "'.$queryinformation['btc'].'")');

		echo "<script>alert('당첨되었습니다. 축하 합니다.')</script>";
		echo "<meta http-equiv=refresh content='0 url=./numbergamemain.php'>";
		exit();
	}
	
	else
	{
		$accountkrw = $queryinformation['krw']-$krw;
		$updatekrw = mysql_query("update accounts set krw='".$accountkrw."' where email='".$_SESSION['email']."'");
		$intxid = mysql_query('INSERT INTO txid (email, type, krwamount, krwsum, ing, ledger, changemoney, date, memo, changebtc) VALUES ("'.$_SESSION['email'].'", "KRW", "-'.mysql_real_escape_string($krw).'", "-'.mysql_real_escape_string($krw).'", "3", "배팅-출금", "'.$accountkrw.'", "'.$date.'", "미당첨 '.mysql_real_escape_string($krw).'원 '.mysql_real_escape_string($krwmult).'배 배팅", "'.$queryinformation['btc'].'")');
		echo "<script>alert('당첨되지 않았습니다.')</script>";
		echo "<meta http-equiv=refresh content='0 url=./numbergamemain.php'>";
		exit();
	}	
?>
