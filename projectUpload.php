<?php
	include 'extras/connect.php';
	//check if form has been submitted
	if (isset($_POST['submit'])) {
		//check that has been submitted
		if($_POST['projectName']==TRUE){
		//if (isset($_FILES['file'])) {
			//set variables
			$name=$_POST['projectName'];
			$date=$_POST['projectStartDate'];
			$desc=$_POST['Description'];
			$comp=$_POST['Complete'];
			//insert links into database
			$sql = "INSERT INTO production (ProductionName,StartDate,Complete,ProDescription)
			VALUES ('$name','$date','$comp','$desc')";
			//check if query is successful
			if ($mysqli->query($sql) === TRUE) {
			
			} else {
			  // echo "Error: " . $sql . "<br>" . $conn->error;
			}
			 $gohere = "projectadmin.php?upload=true";
			
		
			//close database connection
			$mysqli->close();
			header ('Location: '.$gohere.'');
		   	}else{
			   	$gohere = "projectadmin.php?upload=false";
			   	header ('Location: '.$gohere.'');
		   }
		}
?>