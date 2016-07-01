<?php
	//Delete the investor conversation from the database
	include 'connect.php';

	$convoID = $_POST['conversationID'];
	$usergorup = $_COOKIE['usergorup'];

	//delete all messages with corresponding ConversationNo from Messages table
	$delete = "DELETE FROM InvestorMessages WHERE ConversationNo=$convoID";
	$result = mysqli_query($mysqli, $delete);

	//delete the conversation with corresponding ConversationNo from Conversations
	$delete = "DELETE FROM InvestorConversations WHERE ConversationNo=$convoID";
	$result = mysqli_query($mysqli, $delete);

	$mysqli->close();
	//depending on usergroup, redirect to appropriate page
	if($usergroup=='staff'){
		header("Location: ../staff.php");
	}
	else{
		header("Location: ../investors.php");
	}
?>