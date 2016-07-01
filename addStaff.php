<?php
	include("DB.php");
	$getID="SELECT MAX(StaffNo) FROM staff";//Create a new ID for the user
	$getIDresult = mysqli_query($con, $getID);
	$maxID = mysqli_fetch_row($getIDresult);
	$maxIDvalue= $maxID[0];
	$newID = $maxIDvalue + 1;

	$getloginID="SELECT MAX(loginID) FROM logininfo"; //create a new login ID for the user
	$getloginIDresult = mysqli_query($con, $getloginID);
	$maxloginID = mysqli_fetch_row($getloginIDresult);
	$maxloginIDvalue= $maxloginID[0];
	$newloginID = $maxloginIDvalue + 1;

	//$no = $_GET['sNo'];
	$name = $_GET['sName']; //GET all the passed data
	$job = $_GET['sJob'];
	$username = $_GET['username'];
	$password = $_GET['password'];
	$newpassword = md5($password);
	
	//Insert into necessary tables
	$addStaffsql = "INSERT INTO staff Values ('$newID',  '$name','$job', '1 2 3 4 5')";
	mysqli_query($con, $addStaffsql);
	$addStaffLoginsql = "INSERT INTO logininfo Values ('$newloginID', '$username', '$newpassword', 'staff', '$newID')";
	mysqli_query($con, $addStaffLoginsql);
	header("location:accountadmin.php");



?>