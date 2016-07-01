<?php
	//inserts a message into the staff message table and updates the date of the last 
	//message in the investor conversations
	
	include 'connect.php';

	$senderID = $_COOKIE['userID'];
	$receiverID = $_POST['ReceiverNo'];
	$ConversationNo = $_POST['ConversationNo'];
	$message = $_POST['messageText'];
	//formate date
	$date = date('m/d/Y');
	$datepieces = explode("/",$date);
	$formatteddate = $datepieces[2] . "-" . $datepieces[0] . "-" . $datepieces[1];

	//insert message into database
	$insert = "INSERT INTO Messages (SenderNo, ReceiverNo, ConversationNo, MessageText) VALUES ('$senderID', '$receiverID', '$ConversationNo', '$message')";
	mysqli_query($mysqli, $insert);	
	//update conversation table
	$alter = "UPDATE Conversations SET date = '$formatteddate' WHERE ConversationNo = $ConversationNo";
	mysqli_query($mysqli, $alter);	
	//redirect to previous page
	header("Location: ../staff.php");
?> 