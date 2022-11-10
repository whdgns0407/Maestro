<?php 
	include "../../../config.php";
?>
<!doctype html>
	<head>
		<meta charset="UTF-8">
		<title>게시판</title>
		<link rel="stylesheet" type="text/css" href="./style.css" />
	</head>
	<body>
		<div id="board_area"> 
			<?php
				$catagory = mysql_real_escape_string($_GET['catgo']);
				$search_con1 = mysql_real_escape_string($_GET['search']);
				$search_con = mysql_real_escape_string($_GET['search']);
			?>
			<h1>
				<?php 
					switch($catagory)
					{
						case "title":
							echo "제목";
							break;
							
						case "name":
							echo "작성자";
							break;
							
						case "content":
							echo "내용";	
							break;
					}
				?>		
				에서 '<?php echo $search_con; ?>'검색결과 
			</h1>
			<h4 style="margin-top:30px;"><a href="../../../board/board.php">자유게시판 바로가기</a></h4>
			<table class="list-table">
				<thead>
					<tr>
						<th width="70">번호</th>
						<th width="500">제목</th>
						<th width="120">글쓴이</th>
						<th width="100">작성일</th>
						<th width="100">조회수</th>
					</tr>
				</thead>
				<?php
					$sql2 = mysql_query("select * from board where '$catagory'
					like '%$search_con%' order by idx desc");
					while($board = mysql_fetch_array($sql2))
					{
						$title=$board["title"]; 
						if(strlen($title)>30)
					{ 
						$title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
					}
					$sql3 = mysql_query("select * from reply where con_num='".$board['idx']."'");
					$rep_count = mysql_num_rows($sql3);
				?>
				<tbody>
					<tr>
						<td width="70"><?php echo $board['idx']; ?></td>
						<td width="500">
							<?php 
								$lockimg = "<img src='/img/lock.png' alt='lock' title='lock' with='20' height='20' />";
								if($board['lock_post']=="1")
								{ 
							?>
									<a href='/page/board/ck_read.php?idx=<?php echo $board["idx"];?>'><?php echo $title, $lockimg;
								}
							else
							{
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
							<a href='./read.php?idx=<?php echo $board["idx"]; ?>'><span style="background:yellow;"><?php echo strip_tags($title); }?></span><span class="re_ct">[<?php echo $rep_count;?>]<?php echo $img; ?> </span></a></td>
						<td width="120"><?php echo strip_tags($board['name'])?></td>
						<td width="100"><?php echo strip_tags($board['date'])?></td>
						<td width="100"><?php echo strip_tags($board['hit']); ?></td>
					</tr>
				</tbody>
				<?php } ?>
			</table>
			<div id="search_box2">
				<form action="./search_result.php" method="get">
					<select name="catgo">
						<option value="title">제목</option>
						<option value="name">작성자</option>
						<option value="content">내용</option>
					</select>
					<input type="text" name="search" size="40" required="required"/> <button>검색</button>
				</form>
			</div>
		</div>
	</body>
</html>