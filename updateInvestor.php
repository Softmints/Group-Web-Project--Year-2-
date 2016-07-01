<?php
	include("DB.php");
	//get passed data
	$no = $_GET['iNo'];
	$name = $_GET['iName'];
	$lastName = $_GET['iLastName'];
	
	//update the correct row in investor
	$updateStaffsql = "UPDATE investor SET InvestorFirstName = '$name', InvestorLastName='$lastName' WHERE InvestorNo='$no'";
	mysqli_query($con, $updateStaffsql);
	echo $updateStaffsql;
	header("location:accountadmin.php");
?>