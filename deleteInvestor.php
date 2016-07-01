<?php
	$id = $_GET['idd'];
	include('DB.php');
	//delete from investors table
	$deleteSQL ="DELETE FROM investor WHERE InvestorNo = '$id'"; //MUST HAVE CASCADE TURNED ON
	$deleteQuery = mysqli_query($con, $deleteSQL);
	//delete from the list of productions with investors
	$deleteSQL ="DELETE FROM investedProduction WHERE InvestorNo = '$id'"; //MUST HAVE CASCADE TURNED ON
	$deleteQuery = mysqli_query($con, $deleteSQL);
	//delete from login table
	$deleteloginSQL ="DELETE FROM logininfo WHERE userID = '$id'";
	$deleteloginQuery = mysqli_query($con, $deleteloginSQL);
	
	header("location:accountadmin.php");
?>