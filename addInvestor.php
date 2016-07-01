
<?php
	include("DB.php");
	$getID="SELECT MAX(InvestorNo) FROM investor"; //Create a new ID for the user
	$getIDresult = mysqli_query($con, $getID);
	$maxID = mysqli_fetch_row($getIDresult);
	$maxIDvalue= $maxID[0];
	$newID = $maxIDvalue + 1;

	$getloginID="SELECT MAX(loginID) FROM logininfo"; //create a new login ID for the user
	$getloginIDresult = mysqli_query($con, $getloginID);
	$maxloginID = mysqli_fetch_row($getloginIDresult);
	$maxloginIDvalue= $maxloginID[0];
	$newloginID = $maxloginIDvalue + 1;

	//$no = $_GET['iNo'];
	$name = $_GET['iName']; //GET all the passed data
	$lastName = $_GET['iLastName'];
	$username = $_GET['username'];
	$password = $_GET['password'];
	$newpassword = md5($password);

	//Insert into necessary tables
	$addInvestorsql = "INSERT INTO investor Values ('$newID',  '$name','$lastName', '1 2 3 4 5')";
	mysqli_query($con, $addInvestorsql);
	$addPublicLoginsql = "INSERT INTO logininfo Values ('newloginID', '$username', '$newpassword', 'investor', '$newID')";
	mysqli_query($con, $addPublicLoginsql);
	echo $addInvestorsql;
	header("location:accountadmin.php");



?>