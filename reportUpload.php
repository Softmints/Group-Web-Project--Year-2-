<?php
	include 'extras/connect.php';
	//check if form has been submitted
	if (isset($_POST['submit'])) {
		//check that has been submitted
		if($_FILES['file']['name']!=''){
		//if (isset($_FILES['file'])) {
			//set variables
			//$name = $_FILES['file']['name'];
			$error = $_FILES['file']['error'];
			$name=$_FILES['file']['name'];
			$temp=$_FILES["file"]['tmp_name'];
			$url='ReportUploads/'.$name;
			$ProNo=$_POST["proNumber"];
			//insert links into database
			$sql = "INSERT INTO investorreports (ProductionNo, ReportName, ReportURL)
			VALUES ( '$ProNo', '$name','$url')";
			//check if query is successful
			if ($mysqli->query($sql) === TRUE) {
			    move_uploaded_file($temp, 'ReportUploads/'.$name);
			    $gohere = "investadmin.php?upload=true";
			} else {
			  // echo "Error: " . $sql . "<br>" . $conn->error;
				$gohere = "investadmin.php?upload=false";
			}
			 
			
		
			//close database connection
			$mysqli->close();
			header ('Location: '.$gohere.'');
		   	}else{
			   	$gohere = "investadmin.php?upload=false";
			   	header ('Location: '.$gohere.'');
		   }
		}
?>