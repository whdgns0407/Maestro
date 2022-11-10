<?php
	session_start();
	if(isset($_SESSION['email']))
	{
		include("../config.php");
		$query = mysql_query("select * from accounts WHERE email='{$_SESSION['email']}'");
		$queryinformation = mysql_fetch_array($query);
?>
<!DOCTYPE html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
		<meta name="viewport" content="initial-scale=1.0; maximum-scale=0.75; minimum-scale=1.0; user-scalable=1;width=device-width;"/>
		<title>문의</title>
		<style>
			#si{
				float:left;
				width:200px;
				display:table-cell;
				position:relative;
				background-color:#FAFAD2;
			}
		
			content{
				float:left;
				width:83%;
				height:100%;
				display:table-cell;
				position:fixed;
				left:210px;
				top:0px;
				overflow:auto;
			}
		
			a{
				text-decoration:none;
				color:black;
			}
			
			#sub{
				text-align:right;
				margin-top:2px;
				margin-bottom-5px;
			}
		
			#sub:hover{
				background-color:gray;
				font-weight:bold;
			}
		</style>
	</head>
	<body>
		<div id="si">
			<a href="1v1.php" target="com">
				<div id="sub">
					<font size="10px">1:1문의</font><br>
				</div>
			</a>
			<a href="co_list.php" target="com">
			<div id="sub">
				<font size="10px">문의내역</font>
			</div>
			</a>
		</div>
		<content>
		<iframe name="com" src="1v1.php" width="100%" height="100%"></iframe>
		</content>
	</body>
</html>
<?php
	}						
	else
	{
		echo "<a href=./login.php>로그인</a>";
	}
?>