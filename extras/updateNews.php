<?php
	//updates the infomation for a newsfeed item

	include 'connect.php';

	$NewsfeedNo = $_POST['NewsfeedNo'];
	$title = $_POST['title'];
	$content = $_POST['Content'];
	$catagory = $_POST['selectCatagory'];

	$update = "UPDATE Newsfeed SET CatagoryNo = '$catagory', Title = '$title', Content = '$content' WHERE NewsfeedNo = $NewsfeedNo";
	mysqli_query($mysqli, $update);

	header('Location: ../publicadmin.php');
?>