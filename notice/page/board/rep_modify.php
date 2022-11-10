<?php
	include "../../../config.php";

	
	
	session_start();
	if(isset($_SESSION['email']))
	{
		$bno = mysql_real_escape_string($_GET['idx']);
		$sql = mysql_query("select * from notice_reply where idx='$bno';");
		$board = mysql_fetch_array($sql);

		$query = mysql_query("select * from accounts WHERE email='{$_SESSION['email']}'");
		$queryinformation = mysql_fetch_array($query);
		$bbno = mysql_escape_string($_GET['iidx']);
		

			
		if($queryinformation['email'] == $board['pw'])
		{
		}
		else
		{
			echo "<script>alert('현재 로그인된 아이디와 댓글을 작성한 아이디가 다릅니다.')</script>";
			echo "<meta http-equiv=refresh content='0 url=./read.php?idx=$bbno'>";
			exit();
		}
	}
	else 
	{
		header("Location: ../../../login.php");
		exit();
	}	
?>
<!doctype html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="./write.css" />
<title>게시판</title>
</head>
<body>
    <div id="board_write">
        <h1><a href="./read.php?idx=<?php echo $board['con_num']; ?>">뒤로 가기</a></h1>
        <h4>현재 게시글의 댓글을 수정 합니다.</h4>
            <div id="write_area">
                <form action="./rep_modify_ok.php" method="post">
                    <input type="hidden" name="idx" value="<?=$bno?>" />
                    <div id="in_content">
                        <textarea name="content" id="ucontent" placeholder="내용" required><?php echo $board['content']; ?></textarea>
                    </div>
                    <div class="bt_se">
                        <button type="submit">댓글 수정</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>