<?php
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://api.upbit.com/v1/orderbook?markets=krw-xrp");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$btc1 = explode('{"ask_price":', curl_exec($ch));
	$btc2 = explode('"bid_price":', curl_exec($ch));
	$btc11 = explode('"ask_size":', curl_exec($ch));
	$btc22 = explode('"bid_size":', curl_exec($ch));
	curl_close($ch);
	for($i=1;$i<=10;$i++)
	{
		$sell[$i] = explode(",",$btc1[$i])[0];
	}
	for($i=1;$i<=10;$i++)
	{
		$buy[$i] = explode(",",$btc2[$i])[0];
	}
	for($i=1;$i<=10;$i++)
	{
		$sellamount[$i] = explode(",",$btc11[$i])[0];
	}
	for($i=1;$i<=10;$i++)
	{
		$buyamount[$i] = explode("}",$btc22[$i])[0];
	}
	$information = curl_init();
	curl_setopt($information, CURLOPT_URL, "https://api.upbit.com/v1/trades/ticks?market=krw-eth&count=10");
	curl_setopt($information, CURLOPT_RETURNTRANSFER, 1);
	$trade = explode('"trade_price":', curl_exec($information));
	$tradeamount = explode('"trade_volume":', curl_exec($information));
	$tradet = explode('"trade_time_utc":"', curl_exec($information));
	$tradebs = explode('"ask_bid":"', curl_exec($information));
	curl_close($information);
	for($i=1;$i<=10;$i++)
	{
		$tradeprice[$i] = explode(",", $trade[$i])[0];
		$tradepricereal[$i] = substr($tradeprice[$i],0,7);
	}	
	for($i=1;$i<=10;$i++)
	{
		$tradeamount1[$i] = explode(",", $tradeamount[$i])[0];
		$tradeamountreal[$i] = substr($tradeamount1[$i],0,6);
	}
	for($i=1;$i<=10;$i++)
	{
		$tradetime[$i] = explode('"', $tradet[$i])[0];
		$traderealtime[$i] = substr($tradetime[$i],3,6);
	}
	for($i=1;$i<=10;$i++)
	{
		$tradebs1[$i] = explode('"', $tradebs[$i])[0];
	}
?>
<html>
	<head>
		<META HTTP-EQUIV="refresh" CONTENT="0.5">
	</head>
	<body>
		<div align="center">
			<table border="1" style="height:87%; width:700px; text-align:center;">
				<tr style="border:1;">
					<th sytle="text-align:right;"><font style="color:blue;">매도 잔량</font></th>
					<th>호&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;가</th>
					<th rowspan="10"></th>
				</tr>
			</table>
			<p><b><font style="color:red;">매수</font></b> 가능 가격 : <input type="text" id="buy" style="text-align:center;" value="<?php echo"$sell[1]"; ?>" readonly> 원 / <b><font style="color:blue;">매도</font></b> 가능 가격 : <input type="text" id="sell"style="text-align:center;"  value="<?php echo"$buy[1]"; ?>" readonly> 원 </p>
		</div>
	</body>
</html>