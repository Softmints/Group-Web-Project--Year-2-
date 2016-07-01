
<html>
<head>
	<script src= "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
	<script >
	//when the update button is clicked set the values of the modal equal to the data displayed
		$(document).on("click", ".updateStaff", function(){ 
				var myPublicId = $(this).data('id');
				var staffData = myPublicId.split(" ");
				
				$("#txtStaffName").val(staffData[1]);
				$("#txtStaffJob").val(staffData[2]);
			})		

			$(document).on("click", "#btnStaffUpdate", function(){
				//when the submit update button is clicked collect the vales and send them to a php script
		   		var sName = document.getElementById('txtStaffName').value;
		   		
		   		var sJob = document.getElementById('txtStaffJob').value;
		   		//ensure data is correct by validation
		   		var errors = 0;
		   		if (sName==""  ||sJob==""){
		   			alert("Please Complete all fields");
		   			errors= 1;
		   		} else {
		   			errors = 0;
		   		}
		   		if (errors ==0){
					window.location.href = "updateStaff.php?sName="+ sName + "&sJob=" + sJob;
		   		}
		   		
		   		
		   		})	
		   		$(document).on("click", ".btnStaffAdd", function(){
		   			//on click of the add button get the data entered and post to a php script
		   			var errors=0;
		   			var staffUsername = document.getElementById('txtAddStaffUsername').value;
		   			var staffPassword = document.getElementById('txtAddStaffPassword').value;
		   		var staffName = document.getElementById('txtAddStaffName').value;
		   		//var staffNo = document.getElementById('txtAddStaffNo').value;
		   		var staffJob = document.getElementById('txtAddStaffJob').value;
		   		//ensure data is correct by validation
		   		if (staffName==""  ||staffJob==""){
		   			alert("Please Complete all fields");
		   			errors= 1;
		   		} else {
		   			errors = 0;
		   		}
		   		if (errors ==0){
					window.location.href = "addStaff.php?sName="+ staffName + "&sJob=" + staffJob+ "&username="+ staffUsername+ "&password="+ staffPassword;
		   		}
		   		})																										  	
	  </script>

<?php 
	//Select all data on staff
	$selectStaff = "SELECT * FROM staff";
	$selectStaffQuery = mysqli_query($con, $selectStaff);
	//display all data in rows
	while ($selectStaffList = mysqli_fetch_assoc($selectStaffQuery)) {
		?> <tr> <?php
		$StaffNo = $selectStaffList['StaffNo'];
		$StaffName = $selectStaffList['StaffName'];
		$StaffJob = $selectStaffList['JobTitle'];
		?> <td> <?php echo $StaffNo; ?> </td> <?php
		?> <td> <?php echo $StaffName; ?> </td> <?php
		?> <td> <?php echo $StaffJob; ?> </td> <?php
		//attach data to the ID so it can be easily retrieved on click
		?><td><a href="#" class="updateStaff" data-id = "<?php echo $StaffNo . " " . $StaffName . " " . $StaffJob ?>" data-reveal-id="crew">Update</a>|
		<a href="deleteCrew.php?idd=<?php echo $StaffNo ?>">Delete</a></td> <?php
		?> </tr> <?php
	}
?>


</body>
</html>