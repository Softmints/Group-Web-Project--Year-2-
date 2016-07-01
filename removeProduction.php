<?php
	include("DB.php");
	$id= $_GET['id']; //GET passed data
	$production = $_GET['production'];

	//select production number of the production entered
	$sqlProduction = "SELECT ProductionNo FROM production WHERE ProductionName = '$production'";
	$query = mysqli_query($con, $sqlProduction);
	$fetch = mysqli_fetch_row($query);
	$productionID = $fetch[0];
	//delete from list of productions an investor has invested in
	$sql="DELETE FROM investedProduction WHERE InvestorNo='$id' AND ProductionNo='$productionID'"; 
	mysqli_query($con,$sql);

	header("location:investadmin.php");
?>