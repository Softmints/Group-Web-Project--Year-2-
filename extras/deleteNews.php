<?php
	//Delete a newsfeed item from the database
	include 'connect.php';

	$newsID = $_POST['NewsfeedNo'];

	$delete = "DELETE FROM Newsfeed WHERE NewsfeedNo=$newsID";
	$result = mysqli_query($mysqli, $delete);

	$mysqli->close();
	//redirect
	header("Location: ../publicadmin.php");
?>