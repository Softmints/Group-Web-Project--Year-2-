<?php

	include 'extras/connect.php';
/*
	The variables below collect the information submitted by the signup.html page and assign them to variables.
	The $EncryptPass variable changes the $Password variable to have md5 encryption. This is needed as md5
	encryption is applied by the registeration proccess. For the SQL query to correctly select the row the
	passwords need to match exactly so the encryption has to be applied during the login proccess also.

	Each IF statement has a set of parameters that must be check. This corresponds with the values set in
	the logininfo table and the public, staff or investor tables. Depending on what value is found, the correct
	IF statement will be executed, allowing the user access to their specific areas and creating cookies for their
	specific usergroup and IDs.
*/

	$Username = $_POST['Username'];
	$Password = $_POST['Password'];
	$EncryptPass = md5($Password);

	$query = "SELECT * FROM logininfo WHERE username='$Username' AND password='$EncryptPass'";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$Check = mysqli_num_rows($result);
	$row = $result->fetch_array(MYSQLI_NUM);
	$privelege = $row[3]; //Assign varibles based on array $row from SELECT query above
	$userID = $row[4]; //Assign varibles based on array $row from SELECT query above

	if($Check == 1 && $privelege == 'public') { //Check returns boolean 1 or 0 - If 1 and $privelege variable matches execute IF

		$query = "SELECT * FROM public WHERE PublicNo='$userID'"; //Find user based on userID found in logininfo and public table
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
		$Check2 = mysqli_num_rows($result);
		$row = $result->fetch_array(MYSQLI_NUM);
		$userName = $row[1]; //Assign varibles based on array $row from SELECT query above

			if($Check2 == 1) {

				/*
					If Check2 passes assign cookies based on varibles found above
				*/
			
			setcookie('usergroup','public', time()+3600, '/');
			setcookie('userID', $userID, time()+3600, '/');
			setcookie('userName', $userName, time()+3600, '/');
			header("location:public.php");

		}
		
	}

		else if($Check == 1 && $privelege == 'staff') { //Check returns boolean 1 or 0 - If 1 and $privelege variable matches execute IF

			$query = "SELECT * FROM staff WHERE StaffNo='$userID'";
			$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
			$Check3 = mysqli_num_rows($result);
			$row = $result->fetch_array(MYSQLI_NUM);
			$userName = $row[1]; //Assign varibles based on array $row from SELECT query above

				if($Check3 == 1) {

					/*
						If Check2 passes assign cookies based on varibles found above
					*/
			
				
				setcookie('usergroup','staff', time()+3600, '/');
				setcookie('userID', $userID, time()+3600, '/');
				setcookie('userName', $userName, time()+3600, '/');
				echo $_COOKIE['userName'];
				echo $userName;
				header("location:staff.php");
			}
				

		}

			else if($Check == 1 && $privelege == 'investor'){ //Check returns boolean 1 or 0 - If 1 and $privelege variable matches execute IF

				$query = "SELECT * FROM investor WHERE InvestorNo='$userID'";
				$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
				$Check4 = mysqli_num_rows($result);
				$row = $result->fetch_array(MYSQLI_NUM);
				$userName = $row[1]; //Assign varibles based on array $row from SELECT query above

					if($Check4 == 1) {
					
						/*
							If Check2 passes assign cookies based on varibles found above
						*/

					setcookie('usergroup','investor', time()+3600, '/');
					setcookie('userID', $userID, time()+3600, '/');
					setcookie('userName', $userName, time()+3600, '/');
					header("location:investors.php");
				}

			}

				else if($Check == 1 && $privelege == 'admin'){ //Check returns boolean 1 or 0 - If 1 and $privelege variable matches execute IF

					/*
						If Check2 passes assign cookies based on varibles found above
					*/
					
					setcookie('usergroup','admin', time()+3600, '/');
					setcookie('userID', $userID, time()+3600, '/');
					setcookie('userName', $userName, time()+3600, '/');
					header("location:accountadmin.php");
				}


	else {
		echo '<script language="javascript">'; 
		echo 'alert("Login Failed!" );'; 
		echo ' window.location="registeredusers.html";'; 
		echo '</script>'; 
	}
?>