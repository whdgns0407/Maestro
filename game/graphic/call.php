<?php
	session_start();
	if(isset($_SESSION['email']))
	{
		include("../../config.php");
		$query = mysql_query("select * from accounts WHERE email='{$_SESSION['email']}'");
		$queryinformation = mysql_fetch_array($query);
		$walletquery = mysql_query("select * from wallet WHERE id='{$queryinformation['id']}'");
		$walletinformation = mysql_fetch_array($walletquery);
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
		echo "<script>alert('값을 입력 하여 주세요.')</script>";
		echo "<meta http-equiv=refresh content='0 url=./main.php'>";
		exit();
	}
	
	
	date_default_timezone_set('Asia/Seoul');
	$date = date("Y-m-d H:i:s");
	$random = mt_rand(1,100);
	$krw = ($_POST['krw']);
	
	
	if($krw<1)
	{
		echo "<script>alert('배팅 최소금액은 1원 이상 입니다.')</script>";
		echo "<meta http-equiv=refresh content='0 url=./main.php'>";
		exit();
	}
	
	if($krw>=$queryinformation['krw'])
	{
		echo "<script>alert('현재 보유 원화보다 배팅 원화가 큽니다.')</script>";
		echo "<meta http-equiv=refresh content='0 url=./main.php'>";
		exit();
	}
	
	if($random <=54)
	{
		$randresult = 0;
	}
	elseif($random <=74)
	{
		$randresult = 1;
	}
	elseif($random <=85)
	{
		$randresult = 2;
	}
	elseif($random <=91)
	{
		$randresult = 3;
	}
	elseif($random <=96)
	{
		$randresult = 4;
	}
	else
	{
		$randresult = 5;
	}
	
	$accountkrw = $queryinformation['krw']-$krw;
	$updatekrw = mysql_query("update accounts set krw='".$accountkrw."' where email='".$_SESSION['email']."'");
	$intxid = mysql_query('INSERT INTO txid (email, type, krwamount, krwsum, ing, ledger, changemoney, date, memo, changebtc) VALUES ("'.$_SESSION['email'].'", "KRW", "-'.mysql_real_escape_string($krw).'", "-'.mysql_real_escape_string($krw).'", "3", "배팅-출금", "'.$accountkrw.'", "'.$date.'", "'.mysql_real_escape_string($krw).'원 돌림판 배팅",  "'.$queryinformation['btc'].'")');
	
	$accountkrw = $accountkrw + ($krw*$randresult);
	$sumkrw = $krw*$randresult;
	$updatekrw = mysql_query("update accounts set krw='".$accountkrw."' where email='".$_SESSION['email']."'");
	$intxid = mysql_query('INSERT INTO txid (email, type, krwamount, krwsum, ing, ledger, changemoney, date, memo, changebtc) VALUES ("'.$_SESSION['email'].'", "KRW", "'.mysql_real_escape_string($sumkrw).'", "'.mysql_real_escape_string($sumkrw).'", "3", "배팅-입금", "'.$accountkrw.'", "'.$date.'", "'.$randresult.'배 당첨금", "'.$queryinformation['btc'].'")');
	
	echo "<meta http-equiv=refresh content='0 url=./$randresult.php'>";
	
	exit();
	



?>

<html>
	<head>
	</head>
	
</html>