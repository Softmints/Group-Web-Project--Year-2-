<?php
	include("DB.php");
	$getID="SELECT MAX(PublicNo) FROM public";//Create a new ID for the user
	$getIDresult = mysqli_query($con, $getID);
	$maxID = mysqli_fetch_row($getIDresult);
	$maxIDvalue= $maxID[0];
	$newID = $maxIDvalue + 1;

	$getloginID="SELECT MAX(loginID) FROM logininfo"; //create a new login ID for the user
	$getloginIDresult = mysqli_query($con, $getloginID);
	$maxloginID = mysqli_fetch_row($getloginIDresult);
	$maxloginIDvalue= $maxloginID[0];
	$newloginID = $maxloginIDvalue + 1;

	//$no = $_GET['pNo'];
	$name = $_GET['pName']; //GET all the passed data
	$DOB = $_GET['pDOB'];
	$username = $_GET['username'];
	$password = $_GET['password'];
	$newpassword = md5($password);

	//Insert into necessary tables
	$addPublicsql = "INSERT INTO public Values ('$newID',  '$name','$DOB', '1 2 3 4 5')";
	mysqli_query($con, $addPublicsql);
	$addPublicLoginsql = "INSERT INTO logininfo Values ('$newloginID', '$username', '$newpassword', 'public', '$newID')";
	mysqli_query($con, $addPublicLoginsql);
	ECHO $addPublicLoginsql;
	header("location:accountadmin.php");



?>