<?php
	//creates a new conversation in the investor conversation, 
	//and inserts a new message into the investor messages table
	include 'connect.php';

	$senderID = $_COOKIE['userID'];
	$receiverID = $_POST['SelectUser'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	$usergroup = $_COOKIE['usergroup'];

	//format date
	$date = date('m/d/Y');
	$datepieces = explode("/",$date);
	$formatteddate = $datepieces[2] . "-" . $datepieces[0] . "-" . $datepieces[1];

	//insert the conversation into the database
	$insert = "INSERT INTO InvestorConversations (Subject, StaffNo, InvestorNo, date) VALUE ('$subject', '$senderID', '$receiverID', '$formatteddate')";
	mysqli_query($mysqli, $insert);

	//get the ConversationNo from the database by getting the last item
	$query = "SELECT DISTINCT ConversationNo AS NoConversations FROM InvestorConversations";
	$result = mysqli_query($mysqli, $query);
	if($result->num_rows>0){
		while($row = $result->fetch_assoc()){
			$ConversationNo	= $row['NoConversations'];
		}
	}
	else{
		echo "error";
	}

	//insert message into database
	$insert = "INSERT INTO InvestorMessages (StaffNo, InvestorNo, ConversationNo, MessageText, Sender) VALUES ('$senderID', '$receiverID', '$ConversationNo', '$message', '$usergroup')";

	echo $insert;
	mysqli_query($mysqli, $insert);
	
	//redirect to previous page
	if($usergroup=='staff'){
		header("Location: ../staff.php");
	}
	else{
		header("Location: ../investors.php");

	}
?> 