<!--- 게시글 수정 -->
<?php
	include "../../../config.php";
	$bno = $_GET['idx'];
	$sql = mysql_query("select * from notice where idx='$bno';");
	$board = mysql_fetch_array($sql);
	
	
	session_start();
	if(isset($_SESSION['email']))
	{
		$query = mysql_query("select * from accounts WHERE email='{$_SESSION['email']}'");
		$queryinformation = mysql_fetch_array($query);
		$bno = mysql_real_escape_string($_GET['idx']);
		$bnoquery = mysql_query("select * from notice WHERE idx='$bno'");
		$bnoinformation = mysql_fetch_array($bnoquery);
			
		if($queryinformation['name'] == "admin")
		{


?>
<!doctype html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="./write.css" />
<title>게시판</title>
</head>
<body>
    <div id="board_write">
        <h1><a href="./read.php?idx=<?php echo $board['idx']; ?>"><?php echo $board['title']; ?> 게시글 수정</a></h1>
        <h4>현재 게시글의 게시글을 수정 합니다.</h4>
            <div id="write_area">
                <form action="modify_do.php/<?php echo $board['idx']; ?>" method="post">
                    <input type="hidden" name="idx" value="<?=$bno?>" />
                    <div id="in_title">
                        <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required><?php echo $board['title']; ?></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_content">
                        <textarea name="content" id="ucontent" placeholder="내용" required><?php echo $board['content']; ?></textarea>
                    </div>
                    <div class="bt_se">
                        <button type="submit">게시글 수정</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
<?php
		}
		else
		{
			echo "<script>alert('관리자가 아닙니다.')</script>";
			echo "<meta http-equiv=refresh content='0 url=./read.php?idx=$bno'>";
			exit();
		}
	}
	else 
	{
		header("Location: ../../../login.php");
		exit();
	}	
?>