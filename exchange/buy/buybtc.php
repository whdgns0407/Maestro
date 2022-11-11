<?php
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://api.upbit.com/v1/orderbook?markets=krw-btc");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$btcbtc11 = curl_exec($ch);
	$btc1 = explode('{"ask_price":', $btcbtc11 );
	$btc2 = explode('"bid_price":', $btcbtc11 );
	$btc11 = explode('"ask_size":', $btcbtc11 );
	$btc22 = explode('"bid_size":', $btcbtc11 );
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
	curl_setopt($information, CURLOPT_SSL_VERIFYPEER, FALSE); 
	curl_setopt($information, CURLOPT_SSL_VERIFYHOST, 0); 
	curl_setopt($information, CURLOPT_RETURNTRANSFER, 1);
	$information1 = curl_exec($information);
	$trade = explode('"trade_price":', $information1);
	$tradeamount = explode('"trade_volume":', $information1);
	$tradet = explode('"trade_time_utc":"', $information1);
	$tradebs = explode('"ask_bid":"', $information1);
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
		$possiblebtc = substr($queryinformation['krw']/$sell[1],0,6);	
	}
	else 
	{
		echo "<script>alert('로그인 후 시도하여 주세요.')</script>";
		echo "<meta http-equiv=refresh content='0 url=../../../login.php'>";
		exit();
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<style>
			a {
				margin-left:-5px;
			}
			a#lis {
				float:right;
				margin-bottom:-5px;
			}
		</style>
		<script>
			function maxbtc()
			{
				var btc;
				btc = <?php echo $queryinformation['krw']; ?>/chart.contentWindow.document.getElementById("buy").value;
				btc = Math.floor(btc*10000, 1);
				btc = btc / 10000;
				document.getElementById("btcamount").value = btc;
				
				var sum = document.getElementById("btcamount").value;
				var a = chart.contentWindow.document.getElementById("buy").value;
				krw_output.innerHTML = sum*a;
			}

			function mountbtc()
			{
				var sum = document.getElementById("btcamount").value;
				var a = chart.contentWindow.document.getElementById("buy").value;
				var krw_output = document.getElementById("krw_output");
				krw_output.innerHTML = sum*a;
			}
		</script>
	</head>
	<body>
		<a href="../buy/btc.php" target="_parent"><img src="../mesu.png"></a>
		<a href="../sell/btc.php" target="_parent" style="margin-right:30px;"><img src="../medo.png"></a>
		<iframe src="../hoga.php" id="chart" style="min-width:700px; width:100%; min-height:650px; height:650px;"></iframe>
		<div align="center">
			<fieldset style="border-style: dashed; border-color:gray; max-width:800px">
				<legend>현재 보유 자산</legend>
				<table border="0">
					<tr>
						<td>매수 가능 원화 :</td>
						<td style="text-align:right;"><b><?php echo number_format($queryinformation['krw']); ?> KRW</b></td>
					</tr>
					<tr>
						<td>현재 보유 코인 :</td>
						<td style="text-align:right;"><?php echo number_format($queryinformation['btc'],4); ?> BTC</td>
					</tr>
				</table>
			</fieldset>
			<form action="./btc_do.php" method="POST">
				<table>
					<tr>
						<td>
							<input type="number" id="btcamount" onchange="mountbtc();" onkeyup="mountbtc();"  max="<?php echo $possiblebtc; ?>"  name="btcamount" size="8" min="0.0001" step="0.0001">
							BTC 매수 <input type="button" onclick="maxbtc()" value="최대"><br>
						</td>
					</tr>
					<tr>
						<td>
							예상 체결 금액 : <span id="krw_output"></span> KRW
						</td>
					</tr>
				</table>
				<br>
				<input type="submit" name="order" value="매수하기" style="width:200px; height:50px;">
			</form>
			<p>해당 가격은 타거래소 API와 연동 되어 있으며, 실시간으로 가격이 변동 되오니 매수 가능 가격과 실제 체결되는 매수가격은 다를 수 있습니다.</p>
			<p><b><a href="../../apibtc.php" target="blank">API시세조회</a></b></p>
			<p>마에스트로 거래소는 안전한 서비스를 제공 하기 위하여 초/분 요청 수를 제한 합니다.</p>
			<p>응답헤더에서 Remaining-Req: group=default; min=500; sec=1이 출력 된다면 초당 1개의 매수/매도요청, 분당 500개의 매수/매도 요청이 가능 합니다.</p>
			<p>만약 위의 메시지를 무시하고 계속 요청 한다면 Too Many Requests 오류가 발생 하며 일시적으로 거래가 제한 됩니다. 추가적인 패널티는 없습니다.</p>
			<p>서버 환경을 위해 초/분당 요청수는 유동적으로 조정 됩니다.</p>
		</div>
	</body>
</html>