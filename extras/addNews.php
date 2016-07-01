<?php
	//inserts a new newsfeed item into the database, uploads the image and stores it on the server

	include 'connect.php';

	$title = $_POST['title'];
	$content = $_POST['Content'];
	$catagory = $_POST['catagory'];
	$image = "images/" . $_FILES['picture']['name'];

	//insert into the database
	$insert = "INSERT INTO Newsfeed (CatagoryNo, Title, Content, pictureLocation) VALUES ('$catagory', '$title', '$content', '$image')";
	mysqli_query($mysqli, $insert);

	//move uploaded file
	move_uploaded_file($_FILES['picture']['tmp_name'], "../images/" . $_FILES['picture']['name']);

	//redirect
	header('Location: ../publicadmin.php');
?>