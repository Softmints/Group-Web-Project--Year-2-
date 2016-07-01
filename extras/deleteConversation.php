<?php
	//Delete the staff conversation from the database
	include 'connect.php';

	$convoID = $_POST['conversationID'];

	//delete all messages with corresponding ConversationNo from Messages table
	$delete = "DELETE FROM Messages WHERE ConversationNo=$convoID";
	$result = mysqli_query($mysqli, $delete);

	//delete the conversation with corresponding ConversationNo from Conversations
	$delete = "DELETE FROM Conversations WHERE ConversationNo=$convoID";
	$result = mysqli_query($mysqli, $delete);

	$mysqli->close();
	//redirect
	header("Location: ../staff.php");
?>