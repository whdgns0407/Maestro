<?php
	$host['name'] = 'localhost';
	$host['id'] = '���� ���̵�';
	$host['pw'] = '���� ��й�ȣ';
	$host['databasename'] = 'koreabtc'; 
	$db = mysql_connect($host['name'], $host['id'], $host['pw']) OR die ('������ ���峭 ��.');
	mysql_select_db($host['databasename'], $db);
	mysql_query('set names utf8');

?>