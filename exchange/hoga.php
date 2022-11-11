<?php
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://api.upbit.com/v1/orderbook?markets=krw-btc");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$ch1 = curl_exec($ch);
	$btc1 = explode('{"ask_price":', $ch1);
	$btc2 = explode('"bid_price":', $ch1);
	$btc11 = explode('"ask_size":', $ch1);
	$btc22 = explode('"bid_size":', $ch1);
	curl_close($ch);
	for($i=1;$i<=10;$i++)
	{
		$sell[$i] = number_format(explode(",",$btc1[$i])[0]);
	}
	for($i=1;$i<=10;$i++)
	{
		$buy[$i] = number_format(explode(",",$btc2[$i])[0]);
	}
	for($i=1;$i<=10;$i++)
	{
		$sellamount[$i] = number_format((explode(",",$btc11[$i])[0]), 4);
	}
	for($i=1;$i<=10;$i++)
	{
		$buyamount[$i] = number_format(explode("}",$btc22[$i])[0], 4);
	}
	$information = curl_init();
	curl_setopt($information, CURLOPT_URL, "https://api.upbit.com/v1/trades/ticks?market=krw-btc&count=10");
	curl_setopt($information, CURLOPT_SSL_VERIFYPEER, FALSE); 
	curl_setopt($information, CURLOPT_SSL_VERIFYHOST, 0); 
	curl_setopt($information, CURLOPT_RETURNTRANSFER, 1);
	$information1 = curl_exec($information);
	$trade = explode('"trade_price":', $information1);
	$tradeamount = explode('"trade_volume":', $information1);
	$tradet = explode('"trade_time_utc":"', $information1);
	$tradebs = explode('"ask_bid":"', $information1);
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
				<tr>
					<td><font style="color:blue;"><?php echo"$sellamount[10]"; ?> BTC</font></td>
					<td><font style="color:blue;"><?php echo"$sell[10]"; ?></font></td>
				</tr>
				<tr>
					<td><font style="color:blue;"><?php echo"$sellamount[9]"; ?> BTC</font></td>
					<td><font style="color:blue;"><?php echo"$sell[9]"; ?></font></td>
				</tr>
				<tr>
					<td><font style="color:blue;"><?php echo"$sellamount[8]"; ?> BTC</font></td>
					<td><font style="color:blue;"><?php echo"$sell[8]"; ?></font></td>
					
				</tr>
				<tr>
					<td><font style="color:blue;"><?php echo"$sellamount[7]"; ?> BTC</font></td>
					<td><font style="color:blue;"><?php echo"$sell[7]"; ?></font></td>

				</tr>
				<tr>
					<td><font style="color:blue;"><?php echo"$sellamount[6]"; ?> BTC</font></td>
					<td><font style="color:blue;"><?php echo"$sell[6]"; ?></font></td>

				</tr>
				<tr>
					<td><font style="color:blue;"><?php echo"$sellamount[5]"; ?> BTC</font></td>
					<td><font style="color:blue;"><?php echo"$sell[5]"; ?></font></td>
	
				</tr>
				<tr>
					<td><font style="color:blue;"><?php echo"$sellamount[4]"; ?> BTC</font></td>
					<td><font style="color:blue;"><?php echo"$sell[4]"; ?></font></td>

				</tr>
				<tr>
					<td><font style="color:blue;"><?php echo"$sellamount[3]"; ?> BTC</font></td>
					<td><font style="color:blue;"><?php echo"$sell[3]"; ?></font></td>
					
				</tr>
				<tr>
					<td><font style="color:blue;"><?php echo"$sellamount[2]"; ?> BTC</font></td>
					<td><font style="color:blue;"><?php echo"$sell[2]"; ?></font></td>
				
				</tr>
				<tr>
					<td><font style="color:blue;"><?php echo"$sellamount[1]"; ?> BTC</font></td>
					<td><font style="color:blue;"><?php echo"$sell[1]"; ?></font></td>
					<td><b>매수 잔량</b>
				</tr>
				<tr>
					<td>시간 (분:초) / 체결가 / 개수 - 체결내역 </td>
					<td><font style="color:red;"><?php echo"$buy[1]"; ?> </font></td>
					<td><font style="color:red;"><?php echo "$buyamount[1]"; ?> BTC</font></td>
				</tr>
				<tr>
					<td><font style="color:<?php if($tradebs1[1]=="BID") echo"red"; else echo"blue"; ?>"><?php echo"$traderealtime[1]"; ?> <?php echo"$tradepricereal[1]"; ?>원 <?php echo"$tradeamountreal[1]"; ?> BTC</font></td>
					<td><font style="color:red;"><?php echo"$buy[2]"; ?></font></td>
					<td><font style="color:red;"><?php echo "$buyamount[2]"; ?> BTC</font></td>
				</tr>
				<tr>
					<td><font style="color:<?php if($tradebs1[2]=="BID") echo"red"; else echo"blue"; ?>"><?php echo"$traderealtime[2]"; ?> <?php echo"$tradepricereal[2]"; ?>원 <?php echo"$tradeamountreal[2]"; ?> BTC</font></td>
					<td><font style="color:red;"><?php echo"$buy[3]"; ?></font></td>
					<td><font style="color:red;"><?php echo "$buyamount[3]"; ?> BTC</font></td>
				</tr>
				<tr>
					<td><font style="color:<?php if($tradebs1[3]=="BID") echo"red"; else echo"blue"; ?>"><?php echo"$traderealtime[3]"; ?> <?php echo"$tradepricereal[3]"; ?>원 <?php echo"$tradeamountreal[3]"; ?> BTC</font></td>
					<td><font style="color:red;"><?php echo"$buy[4]"; ?></font></td>
					<td><font style="color:red;"><?php echo "$buyamount[4]"; ?> BTC</font></td>
				</tr>
				<tr>
					<td><font style="color:<?php if($tradebs1[4]=="BID") echo"red"; else echo"blue"; ?>"><?php echo"$traderealtime[4]"; ?> <?php echo"$tradepricereal[4]"; ?>원 <?php echo"$tradeamountreal[4]"; ?> BTC</font></td>
					<td><font style="color:red;"><?php echo"$buy[5]"; ?></font></td>
					<td><font style="color:red;"><?php echo "$buyamount[5]"; ?> BTC</font></td>
				</tr>
				<tr>
					<td><font style="color:<?php if($tradebs1[5]=="BID") echo"red"; else echo"blue"; ?>"><?php echo"$traderealtime[5]"; ?> <?php echo"$tradepricereal[5]"; ?>원 <?php echo"$tradeamountreal[5]"; ?> BTC</font></td>
					<td><font style="color:red;"><?php echo"$buy[6]"; ?></font></td>
					<td><font style="color:red;"><?php echo "$buyamount[6]"; ?> BTC</font></td>
				</tr>
				<tr>
					<td><font style="color:<?php if($tradebs1[6]=="BID") echo"red"; else echo"blue"; ?>"><?php echo"$traderealtime[6]"; ?> <?php echo"$tradepricereal[6]"; ?>원 <?php echo"$tradeamountreal[6]"; ?> BTC</font></td>
					<td><font style="color:red;"><?php echo"$buy[7]"; ?></font></td>
					<td><font style="color:red;"><?php echo "$buyamount[7]"; ?> BTC</font></td>
				</tr>
				<tr>
					<td><font style="color:<?php if($tradebs1[7]=="BID") echo"red"; else echo"blue"; ?>"><?php echo"$traderealtime[7]"; ?> <?php echo"$tradepricereal[7]"; ?>원 <?php echo"$tradeamountreal[7]"; ?> BTC</font></td>
					<td><font style="color:red;"><?php echo"$buy[8]"; ?></font></td>
					<td><font style="color:red;"><?php echo "$buyamount[8]"; ?> BTC</font></td>
				</tr>
				<tr>
					<td><font style="color:<?php if($tradebs1[8]=="BID") echo"red"; else echo"blue"; ?>"><?php echo"$traderealtime[8]"; ?> <?php echo"$tradepricereal[8]"; ?>원 <?php echo"$tradeamountreal[8]"; ?> BTC</font></td>
					<td><font style="color:red;"><?php echo"$buy[9]"; ?></font></td>
					<td><font style="color:red;"><?php echo "$buyamount[9]"; ?> BTC</font></td>
				</tr>
				<tr>
					<td><font style="color:<?php if($tradebs1[9]=="BID") echo"red"; else echo"blue"; ?>"><?php echo"$traderealtime[9]"; ?> <?php echo"$tradepricereal[9]"; ?>원 <?php echo"$tradeamountreal[9]"; ?> BTC</font></td>
					<td><font style="color:red;"><?php echo"$buy[10]"; ?></font></td>
					<td><font style="color:red;"><?php echo "$buyamount[10]"; ?> BTC</font></td>
				</tr>
			</table>
			
			
			<p><b><font style="color:red;">매수</font></b> 가능 가격 : <input type="text" id="buy" style="text-align:center;" value="<?php echo (int)str_replace(',', '', $sell[1]); ?>" readonly> 원 / <b><font style="color:blue;">매도</font></b> 가능 가격 : <input type="text" id="sell"style="text-align:center;"  value="<?php echo (int)str_replace(',', '', $buy[1]); ?>" readonly> 원 </p>
		</div>
	</body>
</html>