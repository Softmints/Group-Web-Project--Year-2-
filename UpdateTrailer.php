<?php

	include("connection.php");
	//get data from form
	$no = $_GET['tlink'];
	$name = $_GET['tname'];
	$desc = $_GET['tdesc'];
	$link = $_GET['tlink'];
//update database
	$updateTrailersql = "UPDATE trailers SET TrailerName = '$name', TrailerDescription='$desc', TrailerLink='$link' WHERE TrailerID='$no'";
	mysqli_query($con, $updateTrailersql);
	header("location:accountadmin.php");
?>