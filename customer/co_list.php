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
<html>
	<head>
		<title>문의</title>
		<style>
			tr#x {
				background-color:#cccccc;
			}
			th {
				font-size:45px;
				font-weight:bold;
			}
			table {

			}
			td {
				font-size:32px;
				padding:5px 10px 5px 10px;
				border:20px none #000000;
			}
		</style>
	</head>
	<body>
		<table>
			<tr align="center">
				<th>시간</th>
				<th>문의제목</th>
				<th>상태</th>
			</tr>
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
				$sql1 = mysql_query("select * from customer where email='{$_SESSION['email']}'");
				$row_num = mysql_num_rows($sql1);
				$list = 15;
				$block_ct = 8; 
				$block_num = ceil($page/$block_ct);
				$block_start = (($block_num - 1) * $block_ct) + 1;
				$block_end = $block_start + $block_ct - 1;
				$total_page = ceil($row_num / $list);
				if($block_end > $total_page) $block_end = $total_page;
				$total_block = ceil($total_page/$block_ct);
				$start_num = ($page-1) * $list;
				$sql2 = mysql_query("select * from customer where email='{$_SESSION['email']}' order by idx desc limit $start_num, $list");  
				if ($row_num==0)
				{	
			?>
			<tr>
				<td>0000-00-00</td>
				<td>문의 내용이</td>
				<td> 없습니다.</td>
			</tr>
			<?php
				}
				while($board = mysql_fetch_array($sql2))
				{
					$title=$board["title"]; 
						if(strlen($title)>30)
						{
							$title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
						}
			?>		
			<tbody>
				<tr>
					<td align="center">
						<?php echo $board['date']; ?>
					</td>
					<td align="center">
						<a href='./page/read.php?idx=<?php echo strip_tags($board["idx"]); ?>' onclick="window.open(this.href, '', 'resizable=no,status=no,location=yes,toolbar=yes,menubar=no,fullscreen=no,scrollbars=no,dependent=no,width=858px,height=415px'); return false;" xss="removed"><?php echo strip_tags($title); ?></a>
					</td>
					<td align="center">
					<?php
						switch($board["ing"])
						{
							case 0:
							echo "관리자 확인중";
							break;
							
							case 1:
							echo "답변완료";
							break;
						}
					?>
				</tr>
			</tbody>
		
			<?php
				}
			?>
			
		</table>
		<?php
			if($row_num!=0)
			{
		?>
		
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
			}
		?>
	</body>
</html>