<?php
	$host['name'] = 'localhost';
	$host['id'] = '쿼리 아이디';
	$host['pw'] = '쿼리 비밀번호';
	$host['databasename'] = 'koreabtc'; 
	$db = mysql_connect($host['name'], $host['id'], $host['pw']) OR die ('서버가 고장난 듯.');
	mysql_select_db($host['databasename'], $db);
	mysql_query('set names utf8');

?>