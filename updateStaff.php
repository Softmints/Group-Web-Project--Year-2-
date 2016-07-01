<?php
	include("DB.php");
	//get passed data
	$no = $_GET['sNo'];
	$name = $_GET['sName'];
	$Job = $_GET['sJob'];

	//update the correct row in staff
	$updateStaffsql = "UPDATE staff SET StaffName = '$name', JobTitle='$Job' WHERE StaffNo='$no'";
	mysqli_query($con, $updateStaffsql);
	echo $updateStaffsql;
	header("location:accountadmin.php");
?>