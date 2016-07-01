<?php
	//CONNECT TO THE DATABASE
	$DB_HOST = 'localhost';
	$DB_USER = 'root';
	$DB_PASS = '';
	$DB_NAME = 'Group';
	$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

	if (mysqli_connect_errno()) 
	{
		die("Connection failed: " . mysqli_connect_error());
	}
?>