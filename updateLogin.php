<?php
	include("DB.php");
	//get passed data
	$username = $_GET['username'];
	$password = $_GET['password'];
	$userID = $_GET['userID'];
	$newpassword = md5($password);

	//update the correct row in login info
	$sql = "UPDATE logininfo SET username='$username', password='$newpassword' WHERE userID = '$userID'";
	mysqli_query($con, $sql);
	echo $sql;
	header("location:loginadmin.php");



?>