<?php

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://api.upbit.com/v1/orderbook?markets=krw-btc");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$btc1 = explode('{"ask_price":', curl_exec($ch));
	
	for($i=1;$i<=5;$i++)
	{
		$sell[$i] = explode(",",$btc1[$i])[0];
	}
	for($i=1;$i<=5;$i++)
	{
		echo "sell:";
		echo $sell[$i];
	}
	
	$btc2 = explode('"bid_price":', curl_exec($ch));

	curl_close($ch);
	for($i=1;$i<=5;$i++)
	{
		$buy[$i] = explode(",",$btc2[$i])[0];
	}
	for($i=1;$i<=5;$i++)
	{
		echo "buy:$buy[$i]" ;
	}

	$change = curl_init();
	curl_setopt($change, CURLOPT_URL, "https://api.upbit.com/v1/candles/days?market=krw-btc");
	curl_setopt($change, CURLOPT_RETURNTRANSFER, 1);
	$change1 = explode('change_rate":', curl_exec($change));
	$change2 = explode('}]',$change1[1]);
	$changebtc = substr($change2[0],3,4);
	$percent = $change2[0] * 100;
	$percentbtc = substr($percent,0,4);
	echo "Fluctuation:$percentbtc";
	echo "%";

	

	

?>

