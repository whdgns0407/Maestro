<html>
	<?php
		session_start();
		if(isset($_SESSION['email']))
		{
			include("../../config.php");
			if(isset($_GET['page']))
			{
				$page = mysql_escape_string($_GET['page']);
			}
			else
			{
				$page = 1;
			}
			$sql1 = mysql_query("select * from txid where email='{$_SESSION['email']}' AND type='BTC' AND ledger!='배팅-출금' AND ledger!='배팅-입금'");
			$row_num = mysql_num_rows($sql1);
			$list = 10000000;
			$block_ct = 8; 
			$block_num = ceil($page/$block_ct);
			$block_start = (($block_num - 1) * $block_ct) + 1;
			$block_end = $block_start + $block_ct - 1;
			$total_page = ceil($row_num / $list);
			if($block_end > $total_page) $block_end = $total_page;
			$total_block = ceil($total_page/$block_ct);
			$start_num = ($page-1) * $list;
			$sql2 = mysql_query("select * from txid  where email='{$_SESSION['email']}' AND type='BTC' AND ledger!='배팅-출금' AND ledger!='배팅-입금' order by idx desc limit $start_num, $list"); 
	?>
	<head>
		<title>마에스트로거래소 - 비트코인 - 입출금내역</title>
		<style>
			table{
				background-color:white;
			}
			thead th{
				background-color:green;
				color : white;
			}
		</style>
	</head>
	<body>
		<table border="1">
			<tr align="center">
				<thead>
					<th>구분</th>
					<th>주소</th>
					<th>요청금액</th>
					<th>수수료</th>
					<th>총 금액</th>
					<th>일자</th>
					<th>상태</th>
					<th>비고</th>
				</thead>
			</tr>
			<?php
				while($txid = mysql_fetch_array($sql2))
				{
					if($txid["email"] == $_SESSION['email'])
					{
						if($txid["type"] == "BTC")
						{
			?>
			<tbody align="center">
				<tr align="center">
					<td><?php echo $txid["ledger"]; ?></td>
					<td>
						<?php
							if(isset($txid["address"]))
							{
								echo $txid["address"]; 
							}
							else
							{
								echo "-";
							}
						?>
					</td>
					<td>
						<?php
							if(isset($txid["btcamount"]))
							{
								if($txid["btcamount"]>=0)
								{
									echo "+";
									echo number_format($txid["btcamount"],4);
									echo " BTC";
								}
								else
								{
									echo number_format($txid["btcamount"],4);
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
							if(isset($txid['commission']))
							{
								if(isset($txid['krwamount']))
								{
									echo "{$txid["commission"]} KRW";
								}
					
								else
								{
									echo "{$txid["commission"]} BTC";
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
							echo $txid["date"];
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
								echo $txid["memo"]; 
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
	</body>
	<?php	
		}
		else
		{
			echo "<script>alert('로그인 후 시도하여 주세요.')</script>";
			echo "<meta http-equiv=refresh content='0 url=../../../login.php'>";
			exit();
		}
	?>
</html>