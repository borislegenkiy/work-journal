<?php
	define('DB_HOST', 'localhost');
	define('DB_USER', 'boris387');
	define('DB_PASS', 'jGfYthT4');
	define('DB_NAME', 'boris387_journal'); 
	define('USER', 'admin'); 
	define('PASS', 'a12345'); 
	define('IP', '195.16.88.253, 195.16.88.254, 195.16.88.255'); 
	
	
	
	$db = new mysqli(DB_HOST, DB_USER, DB_PASS,DB_NAME);
	if ($db->connect_error) {
		printf("CONNECT ERROR : %d\n", $db->errno);
		exit();
	}	
?>
