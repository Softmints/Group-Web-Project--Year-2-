<?php
	$id = $_GET['idd'];
	include('DB.php');
	echo $id;
	//delete from the staff table
	$deleteSQL ="DELETE FROM staff WHERE StaffNo = '$id'";
	$deleteQuery = mysqli_query($con, $deleteSQL);
	//delete form the logininfo table
	$deleteloginSQL ="DELETE FROM logininfo WHERE userID = '$id'";
	$deleteloginQuery = mysqli_query($con, $deleteloginSQL);

	header("location:accountadmin.php");
?>