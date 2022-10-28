<?php
	session_start();
	if(isset($_SESSION['email']))
	{
		include("../config.php");
		$query = mysql_query("select * from accounts WHERE email='{$_SESSION['email']}'");
		$queryinformation = mysql_fetch_array($query);
		$walletquery = mysql_query("select * from wallet WHERE id='{$queryinformation['id']}'");
		$walletinformation = mysql_fetch_array($walletquery);
	}
	else 
	{
		echo "<script>alert('로그인 후 시도하여 주세요.')</script>";
		echo "<meta http-equiv=refresh content='0 url=../../../login.php'>";
		exit();
	}
?>

<!DOCTYPE html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width", initial-scale="1">
		<title>마에스트로거래소 - 지갑관리</title>
		<link rel="stylesheet" href="../css/bootstrap.css">
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
		<script src="../js/bootstrap.js"></script>
		<link rel="shortcut icon" type="image/x-icon" href="../icon.ico">
		<style>
			aside{
				float:left;
				width:30%;
				height:100%;
				background-color:white;
			}
			iframe{
				float:right;
				width:70%;
				height:100%;
				display:table-cell;
				position:fixed;
				right:0px;
				overflow:auto;
			}
		
			#sub{
				text-align:right;
			}
		
			#sub:hover{
				background-color:gray;
			}
		</style>
		<SCRIPT LANGUAGE=javascript>
</SCRIPT>
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
			 img{
				width:60px;
				height:60px;
			}
			a#bk{
				font-size:40px;
				margin-right:40px;
				text-decoration:none;
				color:black;
				font-weight:bold;
				padding-top:5px;
				padding-bottom:5px;
				height:60px;
				}
      
			a#bk:hover{
				font-size:50px;
				padding-top:0px;
				padding-bottom:0px;
			}
			
		</style> 
		</div>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="../index.php">마에스트로</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							거래하기
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="../exchange/buy/btc.php">비트코인 매수</a>
							<a class="dropdown-item" href="../exchange/sell/btc.php">비트코인 매도</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							게임
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="../game/numbergame.php">숫자 도박</a>
							<a class="dropdown-item" href="../game/randomgame.php">랜덤 뽑기</a>
						</div>
					</li>
					<li class="nav-item active">
						<a class="nav-link disabled" href="../wallet">지갑관리</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link disabled" href="../board">자유게시판</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link disabled" href="../notice">공지사항</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link disabled" href="../customer">고객센터</a>
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
						<a class="nav-link disabled" href="../mypage" onclick="window.open(this.href, '', 'resizable=no,status=no,location=yes,toolbar=yes,menubar=no,fullscreen=no,scrollbars=no,dependent=no,width=790px,height=840px'); return false;" xss="removed">마이페이지</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link disabled" href="../logout.php">로그아웃</a>
					</li>
				</ul>	
				<?php
					}
					else
					{		
				?>
				<ul class="navbar-nav navbar-right">
					<li class="nav-item active">
						<a class="nav-link disabled" href="../login.php">로그인</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link disabled" href="../join.php">회원가입</a>
					</li>
				</ul>
				<?php
					}
				?>
			</div>
		</nav>
		<div class="container-fluid">
			<div id="frame" class="col-md-10 col-md-offset-2 main">
				<a id="bk" href="./krw.php" target="cont"><img src="krw.png" alt="원화">원화</a>
				<a id="bk" href="./btc.php" target="cont"><img src="btc.png" alt="코인">비트코인</a><br><br>
				<iframe src="./krw.php" style="width:100%; height:100%" name="cont" ></iframe>
			</div>
		</div>
	</body>
</html>