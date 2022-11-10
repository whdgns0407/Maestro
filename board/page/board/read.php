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
		$hit = mysql_fetch_array(mysql_query("select * from board where idx ='".$bno."'"));
		$hit = $hit['hit'] + 1;
		$fet = mysql_query("update board set hit = '".$hit."' where idx = '".$bno."'");
		$sql = mysql_query("select * from board where idx='".$bno."'"); 
		$board = mysql_fetch_array($sql);
	?>
	<head>
		<link rel="shortcut icon" type="image/x-icon" href="./icon.ico">
		<meta charset="UTF-8">
		<title><?php echo strip_tags($board['title']);?></title>
		<link rel="stylesheet" type="text/css" href="./read.css" />
		<link rel="stylesheet" type="text/css" href="./reply.css" />
	</head>
	<body>
		<div id="board_read">
			<h2><?php echo strip_tags($board['title']); ?></h2>
			<div id="user_info">
				작성자 : <?php echo strip_tags($board['name']); ?> <br>
				작성날짜 : <?php echo strip_tags($board['datem']); ?> <br>
				조회수: <?php echo strip_tags($board['hit']); ?><br>
				<div id="bo_line"></div>
			</div>
			<div id="bo_content">
				<?php
					echo nl2br("$board[content]");
				?>
			</div>
			<div id="bo_ser">
				<ul>
					<li><a href="../../../board/board.php">[목록으로]</a></li>
					<?php
						if(isset($_SESSION['email']))
						{						
							if($queryinformation['email']==$board['pw'])
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
			<div class="reply_view">
				<h3>댓글목록</h3>
				<?php
					$sql3 = mysql_query("select * from reply where con_num='".$bno."' order by idx desc");
					while($reply = mysql_fetch_array($sql3)){ 
				?>
				<div class="dap_lo">
					<div><b><?php echo strip_tags($reply['name']); ?></b></div>
					<div class="dap_to comt_edit"><?php echo strip_tags(nl2br("$reply[content]")); ?></div>
					<div class="rep_me dap_to"><?php echo strip_tags($reply['date']); ?></div>
					<?php
					if(isset($_SESSION['email'])) {
					if($queryinformation['email']==$reply['pw'])
					{ 
					?>
					<div class="rep_me rep_menu">
						<a href="rep_modify.php?idx=<?php echo $reply['idx']; ?>&iidx=<?php echo $board['idx']; ?>">수정</a>
						<a href="reply_delete.php?idx=<?php echo $reply['idx']; ?>&iidx=<?php echo $board['idx']; ?>">삭제</a>
					</div>
					<?php } else {} }?>
					<div class="dat_edit">
						<form action="./reply_ok.php" method="post" action="rep_modify_ok.php">
							<input type="hidden" name="rno" value="<?php $reply['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
							<textarea name="content" class="dap_edit_t"><?php echo strip_tags($reply['content']); ?></textarea>
							<input type="submit" value="수정하기" class="re_mo_bt">
						</form>
					</div>
				</div>
				<?php } ?>
				<?php
					if(isset($_SESSION['email']))
					{ 
					?>
					<div class="dap_ins">
						<form action="./reply_ok.php" method="post" class="reply_form">
							<input type="hidden" name="bno" value="<?php echo $bno; ?>">
							<div style="margin-top:10px; ">
								<textarea name="content" class="reply_content" id="re_content" placeholder="댓글을 입력 하세요."></textarea>
								<button type="suid="rep_bt" class="re_bt">댓글</button>
							</div>
						</form>
					</div>
					<?php 
					}
					else
					{ ?>
					<p id="write_btn">
						<a href="../../../login.php" target="_parent">
							<br>로그인 후 댓글 작성이 가능 합니다.<br>
							로그인 하지 않더라도 게시글 및 댓글은 조회 가능합니다. 
						</a>
					</p>
				<?php } ?>
			</div>
		</div>
		<div id="board_area"> 
			<h4>최근 게시글</h4>
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
								<a href='../../page/board/read.php?idx=<?php echo strip_tags($board["idx"]); ?>'> <?php echo strip_tags($title);?><span class="re_ct">[<?php echo $rep_count; ?>]<?php echo $img; ?></span></a>
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