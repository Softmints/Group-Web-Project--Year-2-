<?php
	include 'extras/connect.php';
	//check if form has been submitted
	if (isset($_POST['submit'])) {
		//check that has been submitted
		if($_POST['JobTitle']==TRUE){
		//if (isset($_FILES['file'])) {
			//set variables
			$name=$_POST['JobTitle'];
			$desc=$_POST['JobDesc'];
			$date=$_POST['ClosingDate'];
			//insert links into database
			$sql = "INSERT INTO jobs (JobTitle,JobDescription,ClosingDate)
			VALUES ('$name','$desc','$date')";
			//check if query is successful
			if ($mysqli->query($sql) === TRUE) {
				 $gohere = "publicadmin.php?upload=true";
			} else {
			   echo "Error: " . $sql . "<br>" . $conn->error;
			   	$gohere = "publicadmin.php?upload=false";
			}
			
		
			//close database connection
			$mysqli->close();
			header ('Location: '.$gohere.'');
		   	}else{
			   	$gohere = "publicadmin.php?upload=false";
			   	header ('Location: '.$gohere.'');
		   }
		}
?>