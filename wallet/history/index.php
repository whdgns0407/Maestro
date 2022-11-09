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
			$sql1 = mysql_query("select * from txid where email='{$_SESSION['email']}'");
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
			$sql2 = mysql_query("select * from txid order by idx desc limit $start_num, $list"); 
	?>
	<head>
		<style>
			table{
				background-color:white;
			}
			thead th{
				background-color:green;
				color : white;
			}
		</style>
		<title>마에스트로거래소 - 거래내역</title>
	</head>
	<body>
		<table border="1">
			<tr align="center">
				<thead>
					<th>시간</th>
					<th>자산</th>
					<th>거래</th>
					<th>KRW자산변동</th>
					<th>BTC자산변동</th>
					<th>계정 KRW자산</th>
					<th>계정 BTC자산</th>
					<th>거래금액</th>
					<th>수수료</th>
					<th>주소(계좌, BTC주소)</th>
					<th>상태</th>
					<th>비고</th>
				</thead>
			</tr>
			<?php
				while($txid = mysql_fetch_array($sql2))
				{
					if($txid["email"] == $_SESSION['email'])
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
									echo "{$txid["krwsum"]} KRW";
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
								echo "{$txid["btcsum"]} BTC";
							}
							else
							{
								echo "-";
							}
						?>
					</td>
					<td style="color: <?php if($txid["changemoney"]>=0) echo "black"; else echo "red"; ?>">
						<?php
							if(isset($txid["changemoney"]))
							{
								echo "{$txid["changemoney"]} KRW";
							}
							else
							{
								echo "-";
							}
						?>
					</td>
					<td>
						<?php
							if(isset($txid["changebtc"]))
							{
								echo "{$txid["changebtc"]} BTC";
							}
							else
							{
								echo "-";
							}
						?>
					</td>
					<td>
					<?php
						if(isset($txid['krwamount']))
						{
							echo "{$txid['krwamount']} KRW";
						}
					
						else
						{
							echo "{$txid['btcamount']} BTC";
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
							if(isset($txid["memo"]))
							{
								echo $txid["memo"]; 
							}
							else
							{
								echo "-";
							}
						?>
					</td>
				</tr>
			</tbody>
			<?php
					}
				}
			?>
		</table>
		<div id="page_num">
			<ul>
				<?php
					if($page <= 1)
					{
						echo "<span'>처음</span>";
					}
					else
					{
						echo "<a href='?page=1'>처음</a>";
					}
					if($page <= 1)
					{
					}
					else
					{
						$pre = $page-1;
						echo "<a href='?page=$pre'>이전</a>";
					}
					for($i=$block_start; $i<=$block_end; $i++){ 
						if($page == $i)
						{								
							echo "<span>[$i]</span>";
						}
						else
						{
							echo "<a href='?page=$i'>[$i]</a>";
						}
					}
					if($block_num >= $total_block)
					{
					}
					else
					{
						$next = $page + 1;
						echo "<span><a href='?page=$next'>다음</a></span>";
					}
					if($page >= $total_page)
					{
						echo "<span>마지막</span>";
					}
					else
					{
						echo "<a href='?page=$total_page'>마지막</a>";
					}
				?>
			</ul>
		</div>
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