<?php
	include("DB.php");
	$id= $_GET['id'];
	$production = $_GET['production'];
	$amount = $_GET['amount'];
	$date=$_GET['date'];
	echo $date;
	//find production number of production entered
	$sqlProduction = "SELECT ProductionNo FROM production WHERE ProductionName = '$production'";
	$query = mysqli_query($con, $sqlProduction);
	$fetch = mysqli_fetch_row($query);
	$productionID = $fetch[0];

	//add production into to list of productions with investors
	$sql="INSERT INTO investedProduction VALUES('$id', '$productionID', '$amount','n' ,'$date') ";
	echo $sql;
	mysqli_query($con,$sql);

	header("location:investadmin.php");
?>