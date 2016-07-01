<?php
	$id = $_GET['idd'];
	include('DB.php');
	echo $id;
	//delete from public table
	$deleteSQL ="DELETE FROM public WHERE publicNo = '$id'";
	$deleteQuery = mysqli_query($con, $deleteSQL);
	//delete from logininfo
	$deleteloginSQL ="DELETE FROM logininfo WHERE userID = '$id'";
	$deleteloginQuery = mysqli_query($con, $deleteloginSQL);

	header("location:accountadmin.php");
?>