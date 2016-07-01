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
			$url='CrewUploads/'.$name;
			$catagory=$_GET["prdNo"];
			//insert links into database
			$sql = "INSERT INTO media (ProductionNo, MediaURL,MediaName,Catagory)
			VALUES ( '1', '$url','$name','$catagory')";
			//check if query is successful
			if ($mysqli->query($sql) === TRUE) {
			    move_uploaded_file($temp, 'CrewUploads/'.$name);
			} else {
			  // echo "Error: " . $sql . "<br>" . $conn->error;
			}
			 $gohere = "stafffiles.php?upload=true";
			
		
			//close database connection
			$mysqli->close();
			header ('Location: '.$gohere.'');
		   	}else{
			   	$gohere = "stafffiles.php?upload=false";
			   	header ('Location: '.$gohere.'');
		   }
		}
?>