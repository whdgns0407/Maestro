<?php
	session_start();
	if(isset($_SESSION['email']))
	{
		include("../config.php");
		$query = mysql_query("select * from accounts WHERE email='{$_SESSION['email']}'");
		$queryinformation = mysql_fetch_array($query);
		$walletquery = mysql_query("select * from wallet WHERE id='{$queryinformation['id']}'");
		$walletinformation = mysql_fetch_array($walletquery);
		date_default_timezone_set('Asia/Seoul');
	}
	else
	{
		echo "<script>alert('로그인 후 이용 해주세요.')</script>";
		echo "<meta http-equiv=refresh content='0 url=../login.php'>";
		exit();
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	<!-- 숫자놀음 -->
		<style>
			body{
				<!-- background-color:??; -->
			}
			td{
				padding-top:15px;
				padding-left:10px;
			}
			input{
				font-size:25px;
				text-align:right;
			}
			legend{
				font-weight:bold;
				font-size:15px;
			}
			td{
				text-align:center; 
				margin-left:auto; 
				margin-right:auto;
			}
		</style>
		<script>
			function krwupdate() {
				var krw = document.getElementById("krw");
				var krwmult = document.getElementById("krwmult");
				var krw_output = document.getElementById("krw_output");
				krw_output.innerHTML = (krw.value)*(krwmult.value);
			}
			
			function btcupdate() {
				var btc = document.getElementById("btc");
				var btcmult = document.getElementById("btcmult");
				var btc_output = document.getElementById("btc_output");
				btc_output.innerHTML = (btc.value)*(btcmult.value);
			}	
		</script>
	</head>
	<body>
			<table border="0" style="margin-left:auto; margin-right:auto; font-size:20px;">
				<tr style="font-size:30px;">
					<th>KRW 배팅</th>
					<th>BTC 배팅</th>
				</tr>
				<tr>
					<td>가능 KRW : <?php echo number_format($queryinformation['krw']);?> KRW</td>
					<td>가능 BTC : <?php echo number_format($queryinformation['btc'],4);?> BTC</td>
				</tr>
				<tr>
					<td>
						<form action="./numbergamekrw.php" method="POST">
							<table>
								<tr>
									<td colspan="2"><input style="font-size:40px; width:100px; text-align:right;" type="number" onkeyup="krwupdate();" onchange="krwupdate();" step="1" id="krwmult" name="krwmult" min="2" max="100"  required autofocus><b> 배</b></td>
								</tr>
								<tr>
									<td><input type="number" onkeyup="krwupdate();" onchange="krwupdate();" size="7" id="krw" name="krw" min="1000" step="1000" max="<?php echo "{$queryinformation['krw']}"; ?>"  required autofocus><b> KRW</b></td>
								</tr>
								<tr>
									<td><input type="submit" value="KRW 배팅!" style="float:center; font-weight:bold;"></td>
								</tr>
								<tr>
									<td>
										당첨시 <b><span id="krw_output"></span> KRW</b><br>
										수령 가능합니다.
									</td>
								</tr>
							</table>
						</form>
					</td>
					<td>
						<form action="./numbergamebtc.php" method="POST">
							<table>
								<tr>
									<td colspan="2"><input style="font-size:40px; width:100px; text-align:right;" onkeyup="btcupdate();" onchange="btcupdate();"  id="btcmult" type="number" name="btcmult" min="2"  required autofocus><b> 배</b></td>
								</tr>
								<tr>
									<td><input type="number" onkeyup="btcupdate();" onchange="btcupdate();" id="btc" size="7" name="btc" min="0" step="0.0001" max="<?php echo "{$queryinformation['btc']}"; ?>"  required autofocus><b> BTC</b></td>
								</tr>
									<td><input type="submit" value="BTC 배팅!" style="float:center; font-weight:bold;"></td>
								<tr>
									<td>
										당첨시 <b><span id="btc_output"></span> BTC</b><br>
										수령 가능합니다.
									</td>
								</tr>
							</table>
						</form>
					</td>
				</tr>
				<tr>
					<td colspan="2">배팅 하기 누를시 즉시 배팅 됩니다.</td>
				</tr>
			</table>
			<table border="0" style="margin-left:auto; margin-right:auto; font-size:20px;">
				<tr>
					<td colspan="2">
						<b style="font-size:30px;">-거래 내역-</b><br>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<table border="1">
							<tr>
								<th>시간</th>
								<th>자산</th>
								<th>거래</th>
								<th>KRW자산변동</th>
								<th>BTC자산변동</th>
								<th>거래금액</th>
								<th>상태</th>
								<th>비고</th>
							</tr>
							<?php
								if(isset($_GET['page']))
								{
									$page = $_GET['page'];
								}
								else
								{
									$page = 1;
								}
								$led = "배팅-출금";
								$led1 = "배팅-입금";
								$sql1 = mysql_query("select * from txid where email='{$_SESSION['email']}' AND (ledger='{$led}' OR ledger='{$led1}')");
								
								
								$row_num = mysql_num_rows($sql1);
								$list = 10;
								$block_ct = 8; 
								$block_num = ceil($page/$block_ct);
								$block_start = (($block_num - 1) * $block_ct) + 1;
								$block_end = $block_start + $block_ct - 1;
								$total_page = ceil($row_num / $list);
								if($block_end > $total_page)
								{
									$block_end = $total_page;
								}
								$total_block = ceil($total_page/$block_ct);
								$start_num = ($page-1) * $list;
								$sql2 = mysql_query("select * from txid where email='{$_SESSION['email']}' AND (ledger='{$led}' OR ledger='{$led1}') order by idx desc limit $start_num, $list");
								while($txid = mysql_fetch_array($sql2))
								{
									if($txid["email"] == $_SESSION['email'])
									{
										$ledger=(mb_substr($txid["ledger"],0,2,"utf-8"));
										if($ledger=="배팅")
										{
							?>
							<tbody align="center">
								<tr align="center">
									<td><?php echo $txid["date"]; ?></td>
									<td><?php echo $txid["type"]; ?></td>
									<td><?php echo $txid["ledger"]; ?></td>
									<td style="color: <?php if($txid["krwsum"]>=0) {echo "#0000ff";} else {echo "#ff0000";} ?>">
									<?php
										if(isset($txid["krwsum"]))
										{
											if($txid["krwsum"]>=0)
											{
												echo "+";
												echo number_format($txid['krwsum']);
												echo " KRW";
											}
											else
											{
												echo number_format($txid['krwsum']);
												echo " KRW";
											}
										}
										else
										{
											echo "-";
										}				
									?>
									</td>
									<td style="color: <?php if($txid["btcsum"]>=0) {echo "#0000ff";} else {echo "#ff0000";} ?>">
									<?php
										if(isset($txid["btcsum"]))
										{
											if($txid["btcsum"]>=0)
											{
												echo "+";
												echo number_format($txid["btcsum"],4);
												echo " BTC";
											}
											else
											{
												echo number_format($txid["btcsum"],4);
												echo " BTC";
											}
										}
										else
										{
											echo "-";
										}
									?>
									
									</td>
									<td>
										<?php
											if(isset($txid['krwamount']) & isset($txid['btcamount']))
											{
												if($txid['krwamount']>=0)
												{
													echo "+";
													echo number_format($txid['krwamount']);
													echo " KRW/";
												}
												else
												{
													echo number_format($txid['krwamount']);
													echo " KRW/";
												}
								
												if($txid['btcamount']>=0)
												{
													echo "+";
													echo number_format($txid['btcamount'],4);
													echo " BTC";
												}
												else
												{
													echo number_format($txid['btcamount'],4);
													echo " BTC";
												}		
											}
											else
											{
												if(isset($txid['krwamount']))
												{
													if($txid['krwamount']>=0)
													{
														echo "+";
														echo number_format($txid['krwamount']);
														echo " KRW";
													}
													else
													{
														echo number_format($txid['krwamount']);
														echo " KRW";
													}
												}
												else
												{
													if($txid['btcamount']>=0)
													{
														echo "+";
														echo number_format($txid['btcamount'],4);
														echo " BTC";
													}
													else
													{
														echo number_format($txid['btcamount'],4);
														echo " BTC";
													}
												}
											}
										?>
									</td>
						
									<td>
										<?php	
											switch($txid["ing"])
											{
												case 0:
												{
													echo "취소";
												}
												break;
												case 1:
												{
													echo "관리자 확인중";
												}
												break;
												case 2:
												{
													echo "관리자 승인완료";
												}
												break;
												case 3:
												{
													echo "계정 반영완료";	
												}
												break;
											}
										?>							
									</td>
									<td>
										<?php
											if($txid["ledger"]=="외부입금")
											{
										?>
										<a href="https://btc.com/<?php echo $txid['memo']; ?>" target="_blank">
								
										<?php
											}
											if(isset($txid["memo"]))
											{
												if(strlen($txid["memo"])>20)
												{
													$memo=str_replace($txid["memo"],mb_substr($txid["memo"],0,20,"utf-8")."...",$txid["memo"]);
												}
												else
												{
													$memo=$txid["memo"];
												}
												echo $memo; 
											}
											else
											{
												echo "-";
											}
											if($txid["ledger"]=="외부입금")
											{
												echo "</a>";
											}
										?>
									</td>
								</tr>
							</tbody>
						<?php
										}
									}
								}
						?>	
						</table>
					</td>
					<tr>
					<td>
						<div align="center" style="color:black; text-align:center;" >
							<ul>
								<?php
									if($page <= 1)
									{
										echo "<span style='color:black;'>처음 </span>";
									}
									else
									{
										echo "<a href='?page=1' style='color:black;'> 처음 </a>";
									}
									if($page <= 1)
									{
									}
									else
									{
										$pre = $page-1;
										echo "<a href='?page=$pre' style='color:black;'> 이전 </a>";
									}
									for($i=$block_start; $i<=$block_end; $i++){ 
										if($page == $i)
										{								
											echo "<span style='color:black;'> [$i] </span>";
										}
										else
										{
											echo "<a href='?page=$i' style='color:black;'> [$i] </a>";
										}
									}
									if($block_num >= $total_block)
									{
									}
									else
									{
										$next = $page + 1;
										echo "<span><a href='?page=$next' style='color:black;'>다음 </a></span>";
									}
									if($page >= $total_page)
									{
										echo "<span style='color:black;'>마지막</span>";
									}
									else
									{
										echo "<a href='?page=$total_page' style='color:black;'> 마지막 </a>";
									}
								?>
							</ul>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<b style="font-size:30px;">-게임 설명-</b><br>
						<font style="font-size:13px;">
							<p>입력 숫자*배팅금액 만큼 당청금이 지급 됩니다.</p>
							<p>확률은 1/입력숫자 입니다.</p><br>
							<p>예시</p>
							<p>만약 2 배를 입력 하고 배팅 후 당첨 시 배팅금액의 2배 만큼 계정에 반영 됩니다.</p>
							<p>당첨 확률은 2분의 1입니다.</p><br>
							<p>만약 3 배를 입력 하고 배팅 후 당첨 시 배팅금액의 3배 만큼 계정이 반영 됩니다.</p>
							<p>당첨 확률은 3분의 1입니다.</p><br>
							<p>배팅 후 당첨확인은 거래내역에서 즉시 확인 가능 합니다.</p>
							<p>배수는 최소 2배 이상 최대 100배 이하인 정수만 입력 가능합니다.</p>
							<p>KRW 배팅 최소 금액은 원화 1000 KRW원 이상이며, 1000원 단위로 가능 합니다.</p>
							<p>BTC 배팅 최소 금액은 비트코인 0.0001 BTC 이상이며, 0.0001BTC 단위로 가능 합니다.</p>
							<font size="30"color="blue">
								<b>한국 도박 문제 관리센터 : 
							</font> 
							<font color="red" size="30">
								1336</b>
							</font>
						</font>
					</td>
				</tr>
					<td>ㅡㅡ</td>
				<tr>
				</tr>
			</table>
	</body>
</html>