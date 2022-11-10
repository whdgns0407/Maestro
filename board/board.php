<?php				
	session_start();
?>
<!doctype html>
	<head>
		<meta charset="UTF-8">
		<title>마에스트로 거래소 자유게시판</title>
		<link rel="stylesheet" type="text/css" href="./css/reply_number.css" />
		<link rel="stylesheet" type="text/css" href="./css/style.css" />
		<link rel="stylesheet" type="text/css" href="./css/search.css" />
		<link rel="shortcut icon" type="image/x-icon" href="../icon.ico">
	</head>
	<body>
		<div id="board_area"> 
			<h1>마에스트로거래소 자유게시판</h1><br>
			<h4>마에스트로거래소 자유게시판 입니다.</h4>
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
					date_default_timezone_set('Asia/Seoul');
					include ('../config.php');
					if(isset($_GET['page']))
					{
						$page = mysql_escape_string($_GET['page']);
					}
					else
					{
						$page = 1;
					}
					$sql1 = mysql_query("select * from board");
					$row_num = mysql_num_rows($sql1);
					$list = 10;
					$block_ct = 8; 
					$block_num = ceil($page/$block_ct);
					$block_start = (($block_num - 1) * $block_ct) + 1;
					$block_end = $block_start + $block_ct - 1;
					$total_page = ceil($row_num / $list);
					if($block_end > $total_page) $block_end = $total_page;
					$total_block = ceil($total_page/$block_ct);
					$start_num = ($page-1) * $list;
					$sql2 = mysql_query("select * from board order by idx desc limit $start_num, $list");  
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
								<td width="70" align="center"><?php echo $board['idx']; ?></td>
								<td width="500">
								<?php
									$lockimg = "<img src='/img/lock.png' alt='lock' title='lock' with='20' height='20' />";
									if($board['lock_post']=="1")
									{ 
								?>
										<a href='./page/board/ck_read.php?idx=<?php echo $board["idx"];?>'>
								<?php
										echo $title, $lockimg;
									}
									else
									{
								?>
								<?php
										$boardtime = $board['date'];
										$timenow = date("Y-m-d");
										if($boardtime==$timenow)
										{
											$img = "<img src='./img/new.png' alt='new' title='new' />";
										}
										else
										{
											$img ="";
										}
								?>
								<a href='./page/board/read.php?idx=<?php echo strip_tags($board["idx"]); ?>'><?php echo strip_tags($title); }?><span class="re_ct">[<?php echo $rep_count; ?>]<?php echo $img; ?></span></a>
								<td width="120" align="center"><?php echo strip_tags($board['name'])?></td>
								<td width="100" align="center"><?php echo strip_tags($board['datem'])?></td>
								<td width="100" align="center"><?php echo strip_tags($board['hit']); ?></td>
							</tr>
						</tbody>
				<?php
					}
				?>
			</table>
			<div id="page_num">
				<ul>
					<?php
						if($page <= 1)
						{
							echo "<span class='fo_re'> 처음 </span>";
						}
						else
						{
							echo "<a href='?page=1'> 처음 </a>";
						}
						if($page <= 1)
						{
						}
						else
						{
							$pre = $page-1;
							echo "<a href='?page=$pre'> 이전 </a>";
						}
						for($i=$block_start; $i<=$block_end; $i++){ 
							if($page == $i)
							{								
								echo "<span class='fo_re'> [$i] </span>";
							}
							else
							{
								echo "<a href='?page=$i'> [$i] </a>";
							}
						}
						if($block_num >= $total_block)
						{
						}
						else
						{
							$next = $page + 1;
							echo "<span><a href='?page=$next'> 다음 </a></span>";
						}
						if($page >= $total_page)
						{
							echo "<span class='fo_re'> 마지막 </span>";
						}
						else
						{
							echo "<a href='?page=$total_page'> 마지막 </a>";
						}
					?>
				</ul>
			</div>
			<?php

				if(isset($_SESSION['email']))
				{ 
			?>
						<br><div id="write_btn">
						<a href="./page/board/write.php"><button>글쓰기</button></a><br>
						</div>
			<?php 
				} 
			?>
			<div id="search_box" align="center">
				<form action="./page/board/search_result.php" method="get">
					<select name="catgo">
						<option value="title">제목</option>
						<option value="name">작성자</option>
						<option value="content">내용</option>
					</select>
					<input type="text" name="search" size="40" required="required" /> <button>검색</button>
				</form>
			</div>
		</div>
	</body>
</html>