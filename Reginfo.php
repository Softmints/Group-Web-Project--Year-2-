<script src= "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
</script>
<script>
$(document).on("click", "#signup", function(){

	var dob = document.getElementById("txtdob").value;
	if(!/^\d{4}\/\d{1,2}\/\d{1,2}$/.test(dob)){
		alert("Enter date in this format: YYYY/MM/DD"); //Check to ensure date is written in the correct format
	}
})
</script>

<?php

	include ('extras/connect.php');

	$Full_Name = $_POST['Full_Name'];
	$dob = $_POST['dob'];
	$Username = $_POST['Username'];
	$Password = $_POST['Password'];
	$privelege = 'public';

	// Apply md5 encrytion to the Password and Password confirmation the user has entered in the registration form
	$EncryptPass = md5($Password);

		
	// The username is checked to ensure it is not taken
	$query = "SELECT * FROM logininfo WHERE Username='$Username'";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$Check_Username = mysqli_num_rows($result);

	if($Check_Username == 0){

		/* 
			If both the Username is not in the database already then all information is inserted and
			registration is successful and the user is redirected.

			Information is first placed in the public table, this creates a unique ID. The ID is then found and stored then
			inserted along with the password, username and privelege (default public) into the logininfo table.
		*/

		$query = "INSERT INTO public(PublicName, DOB, Newsfeedinterests) VALUES ('$Full_Name', '$dob', '1 2 3 4 5')";
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

		$query = "SELECT MAX(PublicNo) FROM public";
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
		$Check = mysqli_num_rows($result);
		$row = $result->fetch_array(MYSQLI_NUM);
		$ID = $row[0];

		$query = "INSERT INTO logininfo(username, password, privelege, userID) VALUES ('$Username', '$EncryptPass', '$privelege', '$ID')";
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

		header("location:registeredusers.html");

	}

	else { 
		// This is executed given an error and naviagtion options if the Username exists in the database.
		echo '<script language="javascript">'; 
		echo 'alert("Username already Exists!" );'; 
		echo ' window.location="signup.html";'; 
		echo '</script>'; 

	}

	
?>

