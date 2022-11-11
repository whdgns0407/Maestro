<?php
	date_default_timezone_set('Asia/Seoul');
	session_start();
	if(isset($_SESSION['email']))
	{
		include("./config.php");
		date_default_timezone_set('Asia/Seoul');		
		$query = mysql_query("select * from accounts WHERE email='{$_SESSION['email']}'");
		$queryinformation = mysql_fetch_array($query);
	}
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://api.upbit.com/v1/orderbook?markets=krw-btc");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$btc1 = explode('{"ask_price":', curl_exec($ch));
	for($i=1;$i<=5;$i++)
	{
		$sell[$i] = explode(",",$btc1[$i])[0];
	}	
	$change = curl_init();
	curl_setopt($change, CURLOPT_URL, "https://api.upbit.com/v1/candles/days?market=krw-btc");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$change1 = explode('change_rate":', curl_exec($change));
	$change2 = explode('}]',$change1[0]);
	
	$btc2 = explode('"bid_price":', curl_exec($ch));
	curl_close($ch);
	for($i=1;$i<=5;$i++)
	{
		$buy[$i] = explode(",",$btc2[$i])[0];
	}
	$change = curl_init();
	curl_setopt($change, CURLOPT_URL, "https://api.upbit.com/v1/candles/days?market=krw-btc");
	curl_setopt($change, CURLOPT_SSL_VERIFYPEER, FALSE); 
	curl_setopt($change, CURLOPT_SSL_VERIFYHOST, 0); 
	curl_setopt($change, CURLOPT_RETURNTRANSFER, 1);
	$change1 = explode('change_rate":', curl_exec($change));
	$change2 = explode('}]',$change1[1]);
	
	$percent = $change2[0] * 100;
	$percentbtc = substr($percent,0,4);
	$percentbtc1 = substr($percent,0,5);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width", initial-scale="1">
		<title>마에스트로거래소 - 컴퓨터 과학과</title>
		<link rel="stylesheet" href="./css/bootstrap.css">
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.js"></script>
		<link rel="shortcut icon" type="image/x-icon" href="./icon.ico">
	</head>
	<body style="background-color:#FAFAD2; width:100%;">
		<style type="text/css">
			div#nav{
				position: fixed;
				width: 600;
				height: 250;
				right: 0px;
				
				bottom: 0px;
				background-image: url('fake_back.png');
				background-repeat: no-repeat; 
				background-position: left bottom;
			}
			
			.jumbotron
			{
				background: url(./backgroundbtc.png);
				no-repeat center center fixed; 
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
				color:white;
			}

			a:hover
			{
				font-size:17px;
			}
		</style> 
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="./index.php">마에스트로</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							거래하기
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="./exchange/buy/btc.php">비트코인 매수</a>
							<a class="dropdown-item" href="./exchange/sell/btc.php">비트코인 매도</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							게임
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="./game/numbergame.php">숫자 도박</a>
							<a class="dropdown-item" href="./game/randomgame.php">랜덤 뽑기</a>
						</div>
					</li>
					<li class="nav-item active">
						<a class="nav-link disabled" href="./wallet">지갑관리</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link disabled" href="./board">자유게시판</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link disabled" href="./notice">공지사항</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link disabled" href="./customer">고객센터</a>
					</li>
				</ul>
				<?php
					if(isset($_SESSION['email']))
					{
				?>
				<ul class="navbar-nav navbar-right">
					<li class="nav-item active">
						<a class="nav-link disabled"><?php echo "<b>{$queryinformation['name']}</b>님";?></a>
					</li>
					<li class="nav-item active">
						<a class="nav-link disabled" href="./mypage" onclick="window.open(this.href, '', 'resizable=no,status=no,location=yes,toolbar=yes,menubar=no,fullscreen=no,scrollbars=no,dependent=no,width=790px,height=840px'); return false;" xss="removed">마이페이지</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link disabled" href="./logout.php">로그아웃</a>
					</li>
				</ul>	
				<?php
					}
					else
					{		
				?>
				<ul class="navbar-nav navbar-right">
					<li class="nav-item active">
						<a class="nav-link disabled" href="./login.php">로그인</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link disabled" href="./join.php">회원가입</a>
					</li>
				</ul>
				<?php
					}
				?>
			</div>
		</nav>
		<?php 
			if(isset($_SESSION['email']))
			{
			
		?>
		<div class="jumbotron" style="width:100%;">
			<h1 class="text-center" style="font-size:55px;">M a e s t r o &nbsp; E x c h a n g e </h1>
			<br><br>
			<p class="text-center">비트코인(BTC) <a href="./exchange/buy/btc.php"><span><font style="color:red;">매수</font></span></a> 가능 가격 : <font style="color:red;"><?php echo number_format($sell[1]); ?></font></p>
			<p class="text-center">비트코인(BTC) <a href="./exchange/sell/btc.php"><span><font style="color:blue;">매도</font></span></a> 가능 가격 : <font style="color:blue;"><?php echo number_format($buy[1]); ?></font></p>
			<p class="text-center">가격 변동률 : <font style="color:<?php if($percentbtc>=0) echo "red"; else echo "blue";?>;"><?php if($percentbtc>=0) echo "+$percentbtc"; else echo $percentbtc1; ?>%</font></p><br>

			<?php $mysumkrw = $queryinformation['krw']+($queryinformation['btc']*$buy[1]); ?>
			<p class="text-center">총 자산 : <?php echo number_format($mysumkrw); ?> KRW</p>
			<p class="text-center">내 원화 : <?php echo number_format($queryinformation['krw']); ?> KRW / 내 비트코인 : <?php echo number_format($queryinformation['btc'],4);?> BTC (KRW 환산 : <?php echo number_format($queryinformation['btc']*$buy[1]);?> KRW)</p>
		</div>
		<div class="panel-body">
			<div class="media">
				<div class="media-center">
					<font style="color:black;"><h4><?php echo "{$queryinformation['name']}"; ?>님의 거래내역</h4></font>
				</div>
			</div>
		</div>
		<div class="row">
			<table class="table" style="font-size:10px;">
				<tr>
					<thead align="center" style="font-size:12px;">
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
					if(isset($_GET['page']))
					{
						$page = $_GET['page'];
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
					$sql2 = mysql_query("select * from txid where email='{$_SESSION['email']}' order by idx desc limit $start_num, $list");
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
						<td style="color: <?php if($txid["changemoney"]>=0) echo "black"; else echo "red"; ?>">
							<?php
								if(isset($txid["changemoney"]))
								{
									echo number_format($txid["changemoney"]);
									echo " KRW";
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
									echo number_format($txid["changebtc"],4);
									echo "BTC";
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
								if(isset($txid['commission']))
								{
									if(isset($txid['krwamount']))
									{
										echo number_format($txid["commission"]);
										echo " KRW";
									}
			
									else
									{
										echo number_format($txid["commission"],4);
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
				?>
			</table><br>
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
		</div>			
		<?php	
			} 
			else 
			{
		?>
		<div class="jumbotron">
			<h1 class="text-center" style="font-size:55px;">M a e s t r o &nbsp;&nbsp; E x c h a n g e </h1>
			
			<p class="text-center">비트코인(BTC) <a href="./exchange/buy/btc.php"><span><font style="color:red;">매수</font></span></a> 가능 가격 : <font style="color:red;"><?php echo number_format($sell[1]); ?></font></p>
			<p class="text-center">비트코인(BTC) <a href="./exchange/sell/btc.php"><span><font style="color:blue;">매도</font></span></a> 가능 가격 : <font style="color:blue;"><?php echo number_format($buy[1]); ?></font></p>
			<p class="text-center">가격 변동률 : <font style="color:<?php if($percentbtc>=0) echo "red"; else echo "blue";?>;"><?php if($percentbtc>=0) echo "+$percentbtc"; else echo $percentbtc1; ?>%</font></p><br>

			<p class="text-center"><a href="./join.php">회원 가입</a> 후 개인의 비트코인 입금주소와 입금계좌를 발급 받아 비트코인을 거래해보세요.</p>
			<p class="text-center">
				<a class="btn btn-primary btn-lg" href="./login.php" role="button">로그인</a>
				<a class="btn btn-primary btn-lg" href="./join.php" role="button">회원가입</a>
			</p>
		</div>
		<div class="row">
			<table class="table" style="font-size:10px;">
				<tr>
					<thead style="font-size:12px;">
						<th style="text-align:center;"><a href="./login.php">로그인</a> 후 거래내역 조회가 가능합니다.</th>
					</thead>
				</tr>
			</table>
		</div>
		<div style="color:black;" align="center">
		</div>
					<?php 
			} 
		?>
		<hr>
		<div class="row" style="width:100%">
			<div class="col-md-4">
				<h3>최근 공지사항</h3>
				<table>
					<?php		
						include ('./config.php');
						$page = 1;
						$sql1 = mysql_query("select * from notice");
						$row_num = mysql_num_rows($sql1);
						$list = 5;
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
						$sql2 = mysql_query("select * from notice order by idx desc limit $start_num, $list");  
						while($board = mysql_fetch_array($sql2))
						{
							$title=$board["title"]; 
							if(strlen($title)>20)
							{
								$title=str_replace($board["title"],mb_substr($board["title"],0,20,"utf-8")."...",$board["title"]);
							}
							$sql3 = mysql_query("select * from reply where con_num='".$board['idx']."'");
							$rep_count = mysql_num_rows($sql3);
							
							$boardtime = date("Y-m-d", strtotime($board['date']));
							$timenow = date("Y-m-d");
							if($boardtime==$timenow)
							{
								$img = "<img src='./new.png' alt='new' title='new'>";
							}
							else
							{
								$img ="";
							}
					?>		
					<tr>
						<td><li><a href='./notice/index.php?idx=<?php echo strip_tags($board["idx"]); ?>'> <?php echo strip_tags($title);?><?php echo $img; ?></a></li></td>
					</tr>			
					<?php
						}
					?>
				</table>
			</div>
			<div class="col-md-4">
				<h3>최근 게시글</h3>
				<table>
					<tr>
						<?php			
							$page = 1;
							$sql1 = mysql_query("select * from board");
							$row_num = mysql_num_rows($sql1);
							$list = 5;
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
					
					
							$sql2 = mysql_query("select * from board order by idx desc limit $start_num, $list");  
							while($board = mysql_fetch_array($sql2))
							{
								$title=$board["title"]; 
								if(strlen($title)>20)
								{
									$title=str_replace($board["title"],mb_substr($board["title"],0,20,"utf-8")."...",$board["title"]);
								}
								$sql3 = mysql_query("select * from reply where con_num='".$board['idx']."'");
								$rep_count = mysql_num_rows($sql3);
								
								$boardtime = $board['date'];
								$timenow = date("Y-m-d");
								if($boardtime==$timenow)
									{
										$img = "<img src='./new.png' alt='new' title='new' />";
									}
								else
									{
										$img ="";
									}
						?>
						<td>
							<li>
								<a href='./board/index.php?idx=<?php echo strip_tags($board["idx"]); ?>'><?php echo strip_tags($title);?><span class="re_ct">[<?php echo $rep_count; ?>] <?php echo $img; ?></span></a>
							</li>
						</td>
					</tr>
						<?php 
							}
						?>
				</table>
			</div>
			<div class="col-md-4">
				<h3>최근 댓글</h3>
				<table>
					<tr>
						<?php
							date_default_timezone_set('Asia/Seoul');					
							$page = 1;
							$sql1 = mysql_query("select * from board");
							$row_num = mysql_num_rows($sql1);
							$list = 5;
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
					
					
							$sql2 = mysql_query("select * from reply order by idx desc limit $start_num, $list");  
							while($board = mysql_fetch_array($sql2))
							{
								$title=$board["content"]; 
								if(strlen($title)>20)
								{
									$title=str_replace($board["content"],mb_substr($board["content"],0,20,"utf-8")."...",$board["content"]);
								}
									$boardtime = date("Y-m-d", strtotime($board['date']));
									$timenow = date("Y-m-d");
									if($boardtime==$timenow)
									 {
										$img = "<img src='./new.png' alt='new' title='new' />";
									}
									else
									{
										$img ="";
									}
						?>
						<td>
							<li>
								<a href='./board/index.php?idx=<?php echo strip_tags($board["con_num"]); ?>'><?php echo strip_tags($title);?><span class="re_ct"> <?php echo $img; ?></span></a>
							</li>
						</td>
					</tr>
						<?php 
							}
						?>
				</table>
			</div>
		</div>
		<?php
			if(isset($_SESSION['email']))
			{
		?>
		<hr>
		<div class="row" style="width:100%">
			<div class="col-md-4">
				<h3>나의 문의</h3>
				<table>
					<tbody>
					<?php
						if(isset($_GET['page0']))
						{
							$page0 = mysql_escape_string($_GET['page0']);
						}
						else
						{
							$page0 = 1;
						}
						$sql1 = mysql_query("select * from customer where email='{$_SESSION['email']}'");
						$row_num = mysql_num_rows($sql1);
						$list = 5;
						$block_ct = 5; 
						$block_num = ceil($page0/$block_ct);
						$block_start = (($block_num - 1) * $block_ct) + 1;
						$block_end = $block_start + $block_ct - 1;
						$total_page = ceil($row_num / $list);
						if($block_end > $total_page) $block_end = $total_page;
						$total_block = ceil($total_page/$block_ct);
						$start_num = ($page0-1) * $list;
						$sql2 = mysql_query("select * from customer where email='{$_SESSION['email']}' order by idx desc limit $start_num, $list");
						while($board = mysql_fetch_array($sql2))
						{
							$title=$board["title"];
							if(strlen($title)>15)
							{
								$title = str_replace($board["title"],mb_substr($board["title"],0,15,"utf-8")."...",$board["title"]);
							}
							$timenow = date("Y-m-d");
							if($boardtime==$timenow)
							{
								$img = "<img src='../new.png' alt='new' title='new'>";
							}
							else
							{
								$img = "";
							}
					?>
					
						<tr>
							<td>
								<li>
									<a href='./customer/page/read.php?idx=<?php echo strip_tags($board["idx"]); ?>' onclick="window.open(this.href, '', 'resizable=no,status=no,location=yes,toolbar=yes,menubar=no,fullscreen=no,scrollbars=no,dependent=no,width=858px,height=415px'); return false;" xss="removed"><?php echo strip_tags($title);?><span><?php echo $img; ?></span></a>
									<?php
										if($board["ing"]==0)
										{
											echo "- 답변 대기중";
										}
										else
										{
											echo "- 답변 완료";
										}
									?>
								</li>
							</td>
						</tr>
					
					<?php 
						}
					?>
					</tbody>
				</table>
				<br>
				<div id="page_num">
					<ul>
						<?php
							if($row_num==0)
							{
								echo "문의 내역이 없습니다.";
							}
							else
							{
								if($page0 <= 1)
								{
									echo "<span> 처음 </span>";
								}
								else
								{
									echo "<a href='?page0=1'> 처음 </a>";
								}
								if($page0 <= 1)
								{
								}
								else
								{
									$pre = $page0-1;
									echo "<a href='?page0=$pre'>이전</a>";
								}
								for($i=$block_start; $i<=$block_end; $i++)
								{ 
									if($page0 == $i)
									{								
										echo "<span> [$i] </span>";
									}
									else
									{
										echo "<a href='?page0=$i'> [$i] </a>";
									}
								}
								if($block_num >= $total_block)
								{
								}
								else
								{
									$next = $page0 + 1;
									echo "<span><a href='?page0=$next'> 다음 </a></span>";
								}
								if($page0 >= $total_page)
								{
									echo "<span>마지막</span>";
								}
								else
								{
									echo "<a href='?page0=$total_page'> 마지막 </a>";
								}
							}
					?>
					</ul>
				</div>
			</div>
			<div class="col-md-4">
				<h3>내가 쓴 게시글</h3>
				<table>
					<tbody>
					<?php
						if(isset($_GET['page1']))
						{
							$page1 = mysql_escape_string($_GET['page1']);
						}
						else
						{
							$page1 = 1;
						}
						$sql1 = mysql_query("select * from board where pw='{$_SESSION['email']}'");
						$row_num = mysql_num_rows($sql1);
						$list = 5;
						$block_ct = 5; 
						$block_num = ceil($page1/$block_ct);
						$block_start = (($block_num - 1) * $block_ct) + 1;
						$block_end = $block_start + $block_ct - 1;
						$total_page = ceil($row_num / $list);
						if($block_end > $total_page) $block_end = $total_page;
						$total_block = ceil($total_page/$block_ct);
						$start_num = ($page1-1) * $list;
						$sql2 = mysql_query("select * from board where pw='{$_SESSION['email']}' order by idx desc limit $start_num, $list");
						while($board = mysql_fetch_array($sql2))
						{
							$title=$board["title"];
							if(strlen($title)>15)
							{
								$title = str_replace($board["title"],mb_substr($board["title"],0,15,"utf-8")."...",$board["title"]);
							}
							$sql3 = mysql_query("select * from reply where con_num='".$board['idx']."'");
							$rep_count = mysql_num_rows($sql3);
							$boardtime = $board['date'];
							$timenow = date("Y-m-d");
							if($boardtime==$timenow)
							{
								$img = "<img src='../new.png' alt='new' title='new'>";
							}
							else
							{
								$img = "";
							}
					?>
					
						<tr>
							<td>
								<li><a href='./board/index.php?idx=<?php echo strip_tags($board["idx"]); ?>'><?php echo strip_tags($title);?><span>[<?php echo $rep_count; ?>] <?php echo $img; ?></span></a></li>
							</td>
						</tr>
					
					<?php 
						}
					?>
					</tbody>
				</table>
				<br>
				<div id="page_num">
					<ul>
						<?php
							if($row_num==0)
							{
								echo "게시글 내역이 없습니다.";
							}
							else
							{		
								if($page1 <= 1)
								{
									echo "<span> 처음 </span>";
								}
								else
								{
									echo "<a href='?page1=1'> 처음 </a>";
								}
								if($page1 <= 1)
								{
								}
								else
								{
									$pre = $page1-1;
									echo "<a href='?page1=$pre'>이전</a>";
								}
								for($i=$block_start; $i<=$block_end; $i++)
								{ 
									if($page1 == $i)
									{								
										echo "<span> [$i] </span>";
									}
									else
									{
										echo "<a href='?page1=$i'> [$i] </a>";
									}
								}
								if($block_num >= $total_block)
								{
								}
								else
								{
									$next = $page1 + 1;
									echo "<span><a href='?page1=$next'> 다음 </a></span>";
								}
								if($page1 >= $total_page)
								{
									echo "<span>마지막</span>";
								}
								else
								{
									echo "<a href='?page1=$total_page'> 마지막 </a>";
								}
							}
					?>
					</ul>
				</div>
			</div>
			<div class="col-md-4">
				<h3>내가 쓴 댓글</h3>
				<table>
					<tbody>
						<?php
							if(isset($_GET['page2']))
							{
								$page2 = mysql_escape_string($_GET['page2']);
							}
							else
							{
								$page2 = 1;
							}
							$sql1 = mysql_query("select * from reply where pw='{$_SESSION['email']}'");
							$row_num = mysql_num_rows($sql1);
							$list = 5;
							$block_ct = 5; 
							$block_num = ceil($page2/$block_ct);
							$block_start = (($block_num - 1) * $block_ct) + 1;
							$block_end = $block_start + $block_ct - 1;
							$total_page = ceil($row_num / $list);
							if($block_end > $total_page) $block_end = $total_page;
							$total_block = ceil($total_page/$block_ct);
							$start_num = ($page2-1) * $list;
							$sql2 = mysql_query("select * from reply where pw='{$_SESSION['email']}' order by idx desc limit $start_num, $list");
							while($board = mysql_fetch_array($sql2))
							{
								$title=$board["content"];
								if(strlen($title)>20)
								{
									$title=str_replace($board["content"],mb_substr($board["content"],0,20,"utf-8")."...",$board["content"]);
								}
									$boardtime = date("Y-m-d", strtotime($board['date']));
									$timenow = date("Y-m-d");
									if($boardtime==$timenow)
									{
										$img = "<img src='./new.png' alt='new' title='new' />";
									}
									else
									{
										$img ="";
									}
							?>
						<tr>
							<td>
								<li>
										<a href='../board/index.php?idx=<?php echo strip_tags($board["con_num"]); ?>'><?php echo strip_tags($title);?> <?php echo $img; ?></a>
									</li>
								</td>
						</tr>
					<?php 
						}
					?>	
					</tbody>
				</table>
				<br>
				<div id="page_num">
					<ul>
					<?php
						if($row_num==0)
						{
							echo "댓글 내역이 없습니다.";
						}
						else
						{
							if($page2 <= 1)
							{
								echo "<span> 처음 </span>";
							}
							else
							{
								echo "<a href='?page2=1'> 처음 </a>";
							}
							if($page2 <= 1)
							{
							}
							else
							{
								$pre = $page2-1;
								echo "<a href='?page2=$pre'>이전</a>";
							}
							for($i=$block_start; $i<=$block_end; $i++)
							{ 
								if($page2 == $i)
								{								
									echo "<span> [$i] </span>";
								}
								else
								{
									echo "<a href='?page2=$i'> [$i] </a>";
								}
							}
							if($block_num >= $total_block)
							{
							}
							else
							{
								$next = $page2 + 1;
								echo "<span><a href='?page2=$next'> 다음 </a></span>";
							}
							if($page2 >= $total_page)
							{
								echo "<span>마지막</span>";
							}
							else
							{
								echo "<a href='?page2=$total_page'> 마지막 </a>";
							}
						}
						?>
					</ul>
				</div>
			</div>
		</div>
		<?php
			}
		?>
		<hr>
		<div class="card flex-md-row mb-4 shadow-sm h-md-250" style="background-color:#F2F5A9;">
			<div class="card-body d-flex flex-column align-items-start">
				<h1 class="mb-0">
					<b>비트코인 소개</b>
				</h1>
				<div class="mb-1 text-muted small">최초 발행 : 2009년 1월,&nbsp &nbsp대표인물 : 나카모토 사토시(가명)</div>
				<div class="mb-1 text-muted small">총 발행한도 : 21,000,000,&nbsp &nbsp합의프로토콜 : POW</div><br>
				<p class="card-text mb-auto">비트코인은 최초로 구현된 가상화폐입니다. 발행 및 유통을 관리하는 중앙권력이나 중간상인 없이, P2P 네트워크 기술을 이용하여 네트워크에 참여하는 사용자들이 주체적으로 화폐를 발행하고 이체내용을 공동으로 관리합니다. 이를 가능하게 한 블록체인 기술을 처음으로 코인에 도입한 것이 바로 비트코인입니다.</p><br>
				<p class="card-text mb-auto">비트코인을 사용하는 개인과 사업자의 수는 꾸준히 증가하고 있으며, 여기에는 식당, 아파트, 법률사무소, 온라인 서비스를 비롯한 소매상들이 포함됩니다. 비트코인은 새로운 사회 현상이지만 아주 빠르게 성장하고 있습니다. 이를 바탕으로 가치 증대는 물론, 매일 수백만 달러의 비트코인이 교환되고 있습니다. </p><br>
				<p class="card-text mb-auto">비트코인은 가상화폐 시장에서 현재 유통시가총액과 코인의 가치가 가장 크고, 거래량 또한 안정적입니다. 이더리움이 빠르게 추격하고 있지만 아직은 가장 견고한 가상화폐라고 볼 수 있습니다. </p><br>
				<h3 class="mb-0">특징</h3><br>
				<p class="card-text mb-auto">1. 중앙주체 없이 사용자들에 의해 거래내용이 관리될 수 있는 비트코인의 운영 시스템은 블록체인 기술에서 기인합니다. 블록체인은 쉽게 말해 다 같이 장부를 공유하고, 항상 서로의 컴퓨터에 있는 장부 파일을 비교함으로써 같은 내용만 인정하는 방식으로 운영됩니다. 따라서 전통적인 금융기관에서 장부에 대한 접근을 튼튼하게 방어하던 것과는 정반대의 작업을 통해 보안을 달성합니다. 장부를 해킹하려면 51%의 장부를 동시에 조작해야 하는데, 이는 사실상 불가능합니다. 왜냐하면, 이를 실행하기 위해서는 컴퓨팅 파워가 어마어마하게 소요되고, 이것이 가능한 슈퍼컴퓨터는 세상에 존재하지 않기 때문입니다. 또한, 장부의 자료들은 줄글로 기록되는 것이 아니라 암호화 해시 함수형태로 블록에 저장되고, 이 블록들은 서로 연결되어 있어서 더 강력한 보안을 제공합니다. </p><br>
				<p class="card-text mb-auto">2. 비트코인은 블록발행보상을 채굴자에게 지급하는 방식으로 신규 코인을 발행합니다. 블록발행보상은 매 21만 블록(약 4년)을 기준으로 발행량이 절반으로 줄어듭니다. 처음에는 50비트코인씩 발행이 되었고, 4년마다 계속 반으로 감소하고 있습니다. 코인의 총량이 2,100만 개에 도달하면 신규 발행은 종료되고, 이후에는 거래 수수료만을 통해 시스템이 지탱될 것입니다. </p>
				<br><br>
				<div class="mb-1 text-muted small">위 정보는 코인에 대한 이해를 돕기 위해서 제공하는 것으로, 투자 권유를 목적으로 하지 않습니다.</div>
				<div class="mb-1 text-muted small">제공되는 정보는 오류 또는 지연이 발생할 수 있습니다.</div>
			</div>
		</div>
		<hr>
		<footer style="background-color:#FFE400;">
			<div class="container">
				<br>
				<div class="row">
					<div class="col-sm-3" style="text-align: center;"><h3>이메일상담 24시간</h3><a href="mailto:cs@coinpark.co.kr"><h3>cs@coinpark.co.kr</h3></a></div>
					<div class="col-sm-4" style="text-align: center;"><h5>암호화폐의 가치 변동으로 인하여 손실이 발생할 수도 있으므로 무리한 투자는 지양 하시길 바랍니다.</h5></div>
					<div class="col-sm-5" style="text-align: center;">
						<h2>CopyRight &copy;2018 마에스트로</h2>
						<font style="size:5px;"></font>
					</div>
				</div>
			</div>
		</footer>
	</body>
</html>