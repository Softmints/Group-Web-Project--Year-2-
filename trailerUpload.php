<?php
	include 'extras/connect.php';
	//check if form has been submitted
	if (isset($_POST['submit'])) {
		//check that has been submitted
		if($_POST['MovieLink']==TRUE){
		//if (isset($_FILES['file'])) {
			//set variables
			echo "hello";
			$name=$_POST['MovieName'];
			$desc=$_POST['MovieDesc'];
			$link=$_POST['MovieLink'];
			//insert links into database
			$sql = "INSERT INTO trailers (TrailerName,TrailerDescription,TrailerLink)
			VALUES ('$name','$desc','$link')";
			//check if query is successful
			if ($mysqli->query($sql) === TRUE) {
			
			} else {
			  // echo "Error: " . $sql . "<br>" . $conn->error;
			}
			 $gohere = "publicadmin.php?upload=true";
			
		
			//close database connection
			$mysqli->close();
			header ('Location: '.$gohere.'');
		   	}else{
			   	$gohere = "publicadmin.php?upload=false";
			   	header ('Location: '.$gohere.'');
		   }
		}
?>