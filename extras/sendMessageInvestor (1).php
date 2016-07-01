<?php
	session_start();

	include 'connect.php';

	//$senderID = $_COOKIE['userID'];
	$usergroup = $_COOKIE['usergroup'];
	$StaffID = $_POST['StaffNo'];
	$InvestorID = $_POST['InvestorNo'];
	$ConversationNo = $_POST['ConversationNo'];
	$message = $_POST['messageText'];

	$date = date('m/d/Y');
	$datepieces = explode("/",$date);
	$formatteddate = $datepieces[2] . "-" . $datepieces[0] . "-" . $datepieces[1];

	
	//insert message into database
	$insert = "INSERT INTO InvestorMessages (StaffNo, InvestorNo, ConversationNo, MessageText, Sender) VALUES ('$StaffID', '$InvestorID', '$ConversationNo', '$message', '$usergroup')";
	echo $insert . "<br>";
	//mysqli_query($mysqli, $insert);	
	$alter = "UPDATE InvestorConversations SET date = '$formatteddate' WHERE ConversationNo = $ConversationNo";
	echo $alter;
	mysqli_query($mysqli, $alter);

	//redirect to previous page
	if($usergroup=='staff'){
		header("Location: ../staff.php");
	}
	else{
		header("Location: ../investors.php");
	}
?> 