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
				btc = parseFloat(<?php echo $queryinformation['btc']; ?>);
				document.getElementById("btcamount").value = btc;
				
				var sum = document.getElementById("btcamount").value;
				var a = chart.contentWindow.document.getElementById("sell").value;
				krw_output.innerHTML = sum*a;
			}
			
			function mountbtc()
			{
				var sum = document.getElementById("btcamount").value;
				var a = chart.contentWindow.document.getElementById("sell").value;
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
						<td>매도 가능 비트코인 :</td>
						<td style="text-align:right;"><b><?php echo number_format($queryinformation['btc'],4); ?> BTC</b></td>
					</tr>
					<tr>
						<td>현재 보유 원화 :</td>
						<td style="text-align:right;"><?php echo number_format($queryinformation['krw']); ?> KRW</td>
					</tr>
				</table>
			</fieldset>
			<form action="./btc_do.php" method="POST">
				<table>
					<tr>
						<td>
							<input type="number" id="btcamount" onchange="mountbtc();" onkeyup="mountbtc();" name="btcamount" max="<?php echo $queryinformation['btc']; ?>" size="10" min="0.0001" step="0.0001">
							BTC 매도 <input type="button" onclick="maxbtc();" value="최대"><br>
						</td>
					</tr>
					<tr>
						<td>
							예상 체결 금액 : <span id="krw_output"></span> KRW
						</td>
					</tr>
				</table>
				<br>
				<input type="submit" name="order" value="매도하기" style="width:200px; height:50px;">
			</form>
			<p>해당 가격은 타거래소 API와 연동 되어 있으며, 실시간으로 가격이 변동 되오니 매도 가능 가격과 실제 체결되는 매도가격은 다를 수 있습니다.</p>
			<p><b><a href="../../apibtc.php" target="blank">API시세조회</a></b></p>
			<p>마에스트로 거래소는 안전한 서비스를 제공 하기 위하여 초/분 요청 수를 제한 합니다.</p>
			<p>응답헤더에서 Remaining-Req: group=default; min=500; sec=1이 출력 된다면 초당 1개의 매수/매도요청, 분당 500개의 매수/매도 요청이 가능 합니다.</p>
			<p>만약 위의 메시지를 무시하고 계속 요청 한다면 Too Many Requests 오류가 발생 하며 일시적으로 거래가 제한 됩니다. 추가적인 패널티는 없습니다.</p>
			<p>서버 환경을 위해 초/분당 요청수는 유동적으로 조정 됩니다.</p>
		</div>
	</body>
</html>