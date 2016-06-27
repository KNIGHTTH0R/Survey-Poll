<?php

	//database settings
	
	$hostname = 'localhost';
	$username = 'yourusername';
	$password = 'yourpassword';
	$dbname = 'poll';
	
	$connect = mysql_connect($hostname, $username, $password);
	mysql_select_db($dbname);

?>