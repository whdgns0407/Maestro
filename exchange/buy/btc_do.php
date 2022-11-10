<?php
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://api.upbit.com/v1/orderbook?markets=krw-btc");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$btc1 = explode('{"ask_price":', curl_exec($ch));
	$btc2 = explode('"bid_price":', curl_exec($ch));
	$btc11 = explode('"ask_size":', curl_exec($ch));
	$btc22 = explode('"bid_size":', curl_exec($ch));
	curl_close($ch);
	for($i=1;$i<=8;$i++)
	{
		$sell[$i] = explode(",",$btc1[$i])[0];
	}
	for($i=1;$i<=8;$i++)
	{
		$buy[$i] = explode(",",$btc2[$i])[0];
	}
	for($i=1;$i<=8;$i++)
	{
		$sellamount[$i] = explode(",",$btc11[$i])[0];
	}
	for($i=1;$i<=8;$i++)
	{
		$buyamount[$i] = explode("},",$btc22[$i])[0];
	}
	$information = curl_init();
	curl_setopt($information, CURLOPT_URL, "https://api.upbit.com/v1/trades/ticks?market=krw-btc&count=7");
	curl_setopt($information, CURLOPT_RETURNTRANSFER, 1);
	$trade = explode('"trade_price":', curl_exec($information));
	$tradeamount = explode('"trade_volume":', curl_exec($information));
	$tradet = explode('"trade_time_utc":"', curl_exec($information));
	$tradebs = explode('"ask_bid":"', curl_exec($information));
	curl_close($information);
	for($i=1;$i<=7;$i++)
	{
		$tradeprice[$i] = explode(",", $trade[$i])[0];
		$tradepricereal[$i] = substr($tradeprice[$i],0,7);
	}	
	for($i=1;$i<=7;$i++)
	{
		$tradeamount1[$i] = explode(",", $tradeamount[$i])[0];
		$tradeamountreal[$i] = substr($tradeamount1[$i],0,6);
	}
	for($i=1;$i<=7;$i++)
	{
		$tradetime[$i] = explode('"', $tradet[$i])[0];
		$traderealtime[$i] = substr($tradetime[$i],3,6);
	}
	for($i=1;$i<=7;$i++)
	{
		$tradebs1[$i] = explode('"', $tradebs[$i])[0];
	}
	
	session_start();
	if(isset($_SESSION['email']))
	{
		
		include("../../config.php");
		$query = mysql_query("select * from accounts WHERE email='{$_SESSION['email']}'");
		$queryinformation = mysql_fetch_array($query);
	}
	else 
	{
		echo "<script>alert('로그인 후 시도하여 주세요.')</script>";
		echo "<meta http-equiv=refresh content='0 url=../../../login.php'>";
		exit();
	}
	
	
	if(isset($_POST['btcamount']))
	{
	}
	else
	{
		echo "<script>alert('비정상 적인 접근입니다.')</script>";
		echo "<meta http-equiv=refresh content='0 url=./buybtc.php'>";
		exit();
	}
	

	date_default_timezone_set('Asia/Seoul');
	$date = date("Y-m-d H:i:s");
	$btcamount = $_POST['btcamount'];
	$sum = ceil($btcamount * $sell[1]);
	
	if($btcamount <=0)
	{
		echo "<script>alert('0보다 작은 값은 입력 할 수 없습니다.')</script>";
		echo "<meta http-equiv=refresh content='0 url=./buybtc.php'>";
		exit();
	}
	
	if ($sum <= $queryinformation['krw'])
	{
		$accountkrw = $queryinformation['krw'] - $sum;
		$accountbtc = $queryinformation['btc'] + $btcamount;
		$updatekrw = mysql_query("update accounts set krw='".$accountkrw."' where email='".$_SESSION['email']."'");
		$updatebtc = mysql_query("update accounts set btc='".$accountbtc."' where email='".$_SESSION['email']."'");
		$intxid = mysql_query('INSERT INTO txid (email, type, krwamount, krwsum, ing, ledger, changemoney, date, btcamount, changebtc, btcsum, memo) VALUES ("'.$_SESSION['email'].'", "KRW-BTC", "-'.mysql_real_escape_string($sum).'", "-'.mysql_real_escape_string($sum).'", "3", "매수-BTC", "'.mysql_real_escape_string($accountkrw).'", "'.$date.'", "'.mysql_real_escape_string($btcamount).'", "'.mysql_real_escape_string($accountbtc).'", "'.mysql_real_escape_string($btcamount).'", "'.$sell[1].'원/'.mysql_real_escape_string($btcamount).'BTC")');
		echo "<script>alert('$sell[1]원에 $btcamount BTC가 매수 되었습니다.')</script>";
		echo "<meta http-equiv=refresh content='0 url=./buybtc.php'>";
		exit();
	
	}
	else
	{
		echo "<script>alert('비트코인 가격이 변동 하여, 현재 시세로 구매가 불가능 합니다. 재시도하여 주십시오.')</script>";
		echo "<meta http-equiv=refresh content='0 url=./buybtc.php'>";
		exit();
	}
	
	
	
	
	

	
	
	
	
?>
<html>
	<head>
	</head>
	<body>
	</body>
</html>