<?php
	//inserts a message into the investor message table and updates the date of the last 
	//message in the investor conversations

	include 'connect.php';

	//$senderID = $_COOKIE['userID'];
	$usergroup = $_COOKIE['usergroup'];
	$StaffID = $_POST['StaffNo'];
	$InvestorID = $_POST['InvestorNo'];
	$ConversationNo = $_POST['ConversationNo'];
	$message = $_POST['messageText'];
	//formate date
	$date = date('m/d/Y');
	$datepieces = explode("/",$date);
	$formatteddate = $datepieces[2] . "-" . $datepieces[0] . "-" . $datepieces[1];

	
	//insert message into database
	$insert = "INSERT INTO InvestorMessages (StaffNo, InvestorNo, ConversationNo, MessageText, Sender) VALUES ('$StaffID', '$InvestorID', '$ConversationNo', '$message', '$usergroup')";
	mysqli_query($mysqli, $insert);
	//update conversations table	
	$alter = "UPDATE InvestorConversations SET date = '$formatteddate' WHERE ConversationNo = $ConversationNo";
	mysqli_query($mysqli, $alter);

	//redirect to previous page
	if($usergroup=='staff'){
		header("Location: ../staff.php");
	}
	else{
		header("Location: ../investors.php");
	}
?> 