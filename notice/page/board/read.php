<!doctype html>
	<?php
		include "../../../config.php";
			
		session_start();
			
		if(isset($_SESSION['email']))
		{
			$query = mysql_query("select * from accounts WHERE email='{$_SESSION['email']}'");
			$queryinformation = mysql_fetch_array($query);
		}
		$bno = mysql_real_escape_string($_GET['idx']); 
		$hit = mysql_fetch_array(mysql_query("select * from notice where idx ='".$bno."'"));
		$hit = $hit['hit'] + 1;
		$fet = mysql_query("update notice set hit = '".$hit."' where idx = '".$bno."'");
		$sql = mysql_query("select * from notice where idx='".$bno."'"); 
		$board = mysql_fetch_array($sql);
	?>
	<head>
		<link rel="shortcut icon" type="image/x-icon" href="./icon.ico">
		<meta charset="UTF-8">
		<title>마에스트로거래소 공지사항 - <?php echo $board['title']; ?></title>
		<link rel="stylesheet" type="text/css" href="./query/jquery_ui.css" />
		<link rel="stylesheet" type="text/css" href="./read.css" />
		<link rel="stylesheet" type="text/css" href="./reply.css" />
		<style>
			#si{
				float:left;
				width:200px;
				display:table-cell;
				position:relative;
				background-color:#FAFAD2;
			}
			#sub{
				text-align:right;
				margin-top:2px;
				margin-bottom-5px;
			}
		</style>
	</head>
	<body>
		<div id="board_read">
			<h2><?php echo $board['title']; ?></h2>
			<div id="user_info">
				작성자 : <?php echo $board['name']; ?> <br>
				작성날짜 : <?php echo $board['datem']; ?> <br>
				조회수: <?php echo $board['hit']; ?><br>
				파일 : <a href="../../upload/<?php echo $board['file'];?>" download><?php echo $board['file']; ?></a>
				<div id="bo_line"></div>
			</div>
			<div id="bo_content">
				<?php
					echo nl2br("$board[content]");
				?>
			</div>
			<div id="bo_ser">
				<ul>
					<li><a href="../../../notice/notice.php">[공지사항]</a></li>
					<?php
						if(isset($_SESSION['email']))
						{						
							if($queryinformation['name']==$board['name'])
							{ 
					?>
					<li><a href="modify.php?idx=<?php echo $board['idx']; ?>">[수정]</a></li>
					<li><a href="delete.php?idx=<?php echo $board['idx']; ?>">[삭제]</a></li>
					<?php
							}
						}
					?>
				</ul>
			</div>
		</div>
		<br>
		<br>
		<div id="board_area"> 
			<h4>최근 공지사항</h4>
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
					if(isset($_GET['page']))
					{
						$page = $_GET['page'];
					}
					else
					{
						$page = 1;
					}
					$sql1 = mysql_query("select * from notice");
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
					$sql2 = mysql_query("select * from notice order by idx desc limit $start_num, $list");
					while($board = mysql_fetch_array($sql2))
					{
						$title=$board["title"]; 
							if(strlen($title)>30)
							{
								$title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
							}
						$sql3 = mysql_query("select * from notice_reply where con_num='".mysql_real_escape_string($board['idx'])."'");
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
								<a href='../../page/board/read.php?idx=<?php echo strip_tags($board["idx"]); ?>'><?php echo strip_tags($title); }?><span class="re_ct"><?php echo $img; ?></span></a>
								<td width="120" align="center"><?php echo strip_tags($board['name'])?></td>
								<td width="100" align="center"><?php echo strip_tags($board['datem'])?></td>
								<td width="100" align="center"><?php echo strip_tags($board['hit']); ?></td>
							</tr>
						</tbody>
				<?php
					}
				?>
			</table>
		</div>
	</body>
</html>