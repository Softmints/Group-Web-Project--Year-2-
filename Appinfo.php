<!--
	Call the connect page into this page
-->

<?php include 'extras/connect.php'; ?>

<div class="bodydiv">

<!--
	Assign variables based on the $_POST variable sent from the Admin form.
	An SQL query is performed to add all of the values into a specific table.
--> 

<?php
	
	$FirstName = $_POST['firstname'];
	$LastName = $_POST['lastname'];
	$Email = $_POST['email'];
	$JobID = $_POST['JobID'];
	$ContactNo = $_POST['number'];
	$sDate = date("Y-m-d H:i:s");

	if(isset($_FILES['file'])){
		$file = $_FILES['file'];

		//Properties
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_size = $file['size'];
		$file_error = $file['error'];

		// File Extension
		$file_ext = explode('.', $file_name); //Seperate filename and extension at .
		$file_ext = strtolower(end($file_ext)); //Store as lowercase

		$allowed = array('txt', 'doc', 'docx'); //Allow select extensions

		if(in_array($file_ext, $allowed)){ //Check if the file extension is allowed
			if($file_error == 0){ //Check there are no errors
				if($file_size <= 2097152){ //Ensure file size is smaller than roughly 5mb

					$file_name_new = uniqid('', true) . '.' . $file_ext; //Create unique file name and append extension
					$file_destination = 'CV/' . $file_name_new; //Set upload information

					if(move_uploaded_file($file_tmp, $file_destination)){ //Move file to location
						//echo "<p id=\"Thankreg\"> Thank you for your application </p>";
					}

				}
			}
		}

	}

	$query = "INSERT INTO jobapp (FirstName, LastName, Email, ContactNo, FileName, UDate, JobURL, JobID) 
	VALUES ('$FirstName', '$LastName', '$Email', '$ContactNo', '$file_name_new', '$sDate', '$file_destination', '$JobID')";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__); //Insert POST information to database

		//close database connection
		$mysqli->close();

	header("Location: public.php");



?>