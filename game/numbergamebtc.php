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
	
	
	if(isset($_POST['btc']))
	{
		
	}
	else
	{
		echo "<script>alert('정상 적인 접근이 아닙니다.')</script>";
		echo "<meta http-equiv=refresh content='0 url=./numbergamemain.php'>";
		exit();
	}
	if(isset($_POST['btcmult']))
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
	$btc = ($_POST['btc']);
	$btcmult = $_POST['btcmult'];
	$randomresult = $random % $btcmult;
	
	if($btc<=0)
	{
		echo "<script>alert('BTC값이 0보다 적습니다.')</script>";
		echo "<meta http-equiv=refresh content='0 url=./numbergamemain.php'>";
		exit();
	}
	
	if($btcmult<2)
	{
		echo "<script>alert('BTC 배당값이 2미만 입니다.')</script>";
		echo "<meta http-equiv=refresh content='0 url=./numbergamemain.php'>";
		exit();
	}
	
	if($btc == "")
	{
		echo "<script>alert('배팅 할 원화를 입력 하여주세요.')</script>";
		echo "<meta http-equiv=refresh content='0 url=./numbergamemain.php'>";
		exit();
	}
	
	if($btcmult =="")
	{
		echo "<script>alert('배당 값이 없습니다.')</script>";
		echo "<meta http-equiv=refresh content='0 url=./numbergamemain.php'>";
		exit();
	}	

	if($queryinformation['btc']<$btc)
	{
		echo "<script>alert('현재 비트코인보다 입력된 비트코인 값이 큽니다.')</script>";
		echo "<meta http-equiv=refresh content='0 url=./numbergamemain.php'>";
		exit();
	}
	echo "난수 값: $random<br>";
	echo "입력 값 : $btcmult<br>";
	echo "나머지 : $randomresult (나머지값 0일시 당첨)<br>";

	if($randomresult == 0)
	{
		$accountbtc = $queryinformation['btc']-$btc;
		$updatebtc = mysql_query("update accounts set btc='".$accountbtc."' where email='".$_SESSION['email']."'");
		$intxid = mysql_query('INSERT INTO txid (email, type, btcamount, btcsum, ing, ledger, changebtc, date, memo, changemoney) VALUES ("'.$_SESSION['email'].'", "BTC", "-'.mysql_real_escape_string($btc).'", "-'.mysql_real_escape_string($btc).'", "3", "배팅-출금", "'.$accountbtc.'", "'.$date.'", "'.mysql_real_escape_string($btc).'BTC '.mysql_real_escape_string($btcmult).'배 배팅", "'.$queryinformation['krw'].'")');
		
		
		
		$accountbtc = $accountbtc + ($btc*$btcmult);
		$sumbtc = $btc*$btcmult;
		$updatebtc = mysql_query("update accounts set btc='".$accountbtc."' where email='".$_SESSION['email']."'");
		$intxid = mysql_query('INSERT INTO txid (email, type, btcamount, btcsum, ing, ledger, changebtc, date, memo, changemoney) VALUES ("'.$_SESSION['email'].'", "BTC", "'.mysql_real_escape_string($sumbtc).'", "'.mysql_real_escape_string($sumbtc).'", "3", "배팅-입금", "'.$accountbtc.'", "'.$date.'", "당첨금", "'.$queryinformation['krw'].'")');

		echo "<script>alert('당첨되었습니다. 축하 합니다.')</script>";
		echo "<meta http-equiv=refresh content='0 url=./numbergamemain.php'>";
		exit();
	}
	
	else
	{
		$accountbtc = $queryinformation['btc']-$btc;
		$updatebtc = mysql_query("update accounts set btc='".$accountbtc."' where email='".$_SESSION['email']."'");
		$intxid = mysql_query('INSERT INTO txid (email, type, btcamount, btcsum, ing, ledger, changebtc, date, memo, changemoney) VALUES ("'.$_SESSION['email'].'", "BTC", "-'.mysql_real_escape_string($btc).'", "-'.mysql_real_escape_string($btc).'", "3", "배팅-출금", "'.$accountbtc.'", "'.$date.'", "미당첨 '.mysql_real_escape_string($btc).'BTC '.mysql_real_escape_string($btcmult).'배 배팅", "'.$queryinformation['krw'].'")');
		
		echo "<script>alert('당첨되지 않았습니다.')</script>";
		echo "<meta http-equiv=refresh content='0 url=./numbergamemain.php'>";
		exit();
	}	
?>
