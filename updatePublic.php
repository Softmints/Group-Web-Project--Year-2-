<?php
	include("DB.php");
	//get passed data
	$no = $_GET['pNo'];
	$name = $_GET['pName'];
	$DOB = $_GET['pDOB'];

	//update the correct row in public
	$updatePublicsql = "UPDATE public SET PublicName = '$name', DOB='$DOB' WHERE PublicNo='$no'";
	mysqli_query($con, $updatePublicsql);
	echo $updatePublicsql;
	header("location:accountadmin.php");
?>