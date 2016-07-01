<html>
</body>
	<script src= "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script>
	var oldPrivelege = "";
	var userID = "";
	var ID = "";
	//when the update button is clicked set the values of the modal equal to the data displayed
	$(document).on("click", ".updateLogin", function(){ 
					var myPublicId = $(this).data('id');
					var staffData = myPublicId.split(" ");
					$("#txtUsername").val(staffData[0]);
					$("#txtPassword").val(staffData[1]);
					var cmbPrivelege = staffData[2];
					ID = staffData[4];
					userID = staffData[3];
					oldPrivelege = staffData[2];
					
					
				})	


	$(document).on("click", ".changeLogin", function(){ 
					//when the submit update button is clicked collect the vales and send them to a php script
					var username = document.getElementById('txtUsername').value;
			   		var password = document.getElementById('txtPassword').value;
			   		//ensure data is correct by validation
			   		var errors = 0;
			   		if (username=="" || password ==""){
			   			alert("Please Complete all fields");
			   			errors= 1;
			   		} else {
			   			errors = 0;
			   		}
			   		if (errors ==0){
						window.location.href = "updateLogin.php?username=" + username + "&password="+ password+ "&userID="+ ID + "&loginID="+ userID;
			   		}
	})
	</script>
	<?php
		include("DB.php");
		//Select all data on logins
		$loginsql = "SELECT * FROM logininfo";
		$loginquery = mysqli_query($con, $loginsql);
		//display all data in rows
		while ($loginfetch = mysqli_fetch_assoc($loginquery)) {
			$ID = $loginfetch['userID'];
			$username = $loginfetch['username'];
			$password = $loginfetch['password'];
			$privelege = $loginfetch['privelege'];
			$userID = $loginfetch['userID'];
			?> <tr><td> <?php echo $username; ?> </td> <?php
			?> <td> <?php echo $password; ?> </td> <?php
			?> <td> <?php echo $privelege; ?> </td> <?php
			//attach data to the ID so it can be easily retrieved on click
			?><td><a href="#" class="updateLogin" data-id = "<?php echo $username . " " . $password . " " . $privelege . " " . $userID . " " . $ID ?>" data-reveal-id="public">Update</a></td></tr><?php 
		}
	?>
</body>
</html>