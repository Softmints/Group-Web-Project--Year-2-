<html>
<head>
	<script src= "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
	<script >
	//when the update public is clicked set the values of the modal equal to the data displayed in the row selected
		$(document).on("click", ".updatePublic", function(){ 
				var myPublicId = $(this).data('id');
				var userData = myPublicId.split(" ");
				$("#txtPublicNo").val(userData[0]);
				$("#txtPublicName").val(userData[1]);
				$("#txtPublicDOB").val(userData[2]);
			})	

	   	$(document).on("click", ".btnUpdate", function(){
	   			//when the submit update button is clicked collect the vales and send them to a php script
		   		var pName = document.getElementById('txtPublicName').value;
		   		var pNo = document.getElementById('txtPublicNo').value;
		   		var pDOB = document.getElementById('txtPublicDOB').value;
		   		alert(pNo);
		   		//ensure data is correct by validation
		   		var errors = 0;
		   		if (pName=="" || pNo =="" ||pDOB=="" || !/^\d{4}\-\d{1,2}\-\d{1,2}$/.test(pDOB)){
		   			alert("Please Complete all fields");
		   			errors= 1;
		   		} else {
		   			errors = 0;
		   		}
		   		if (errors ==0){
		   			
					window.location.href = "updatePublic.php?pNo=" + pNo + "&pName="+pName + "&pDOB=" + pDOB;
		   		}
		   	})
		   		
		   $(document).on("click", ".btnAddPublic", function(){
		   	//on click of the add button get the data entered and post to a php script
		   		var staffUsername = document.getElementById('txtAddPublicUsername').value;
		   		var staffPassword = document.getElementById('txtAddPublicPassword').value;
		   		var publicName = document.getElementById('txtAddPublicName').value;
		   		//var publicNo = document.getElementById('txtAddPublicNo').value;
		   		var publicDOB = document.getElementById('txtAddPublicDOB').value;
		   		//ensure data is correct by validation
		   		var errors = 0;
		   		if (publicName=="" || staffUsername =="" ||publicDOB==""|| !/^\d{4}\/\d{1,2}\/\d{1,2}$/.test(publicDOB)){
		   			alert("Please Complete all fields and enter date in format YYYY-MM-DD");
		   			errors= 1;
		   		} else {
		   			errors = 0;
		   		}
		   		if (errors ==0){
					window.location.href = "addPublic.php?pName="+publicName + "&pDOB=" + publicDOB+ "&username="+ staffUsername+ "&password="+ staffPassword;
		   		}
		   	})																										  	
	  </script>


<?php	
		//Select all data on public
	$selectPublic = "SELECT * FROM public";
	$selectPublicQuery = mysqli_query($con, $selectPublic);
		//display all data in rows
	while ($selectPublicList = mysqli_fetch_assoc($selectPublicQuery)) {
		?> <tr> <?php
		?> <form method = "post" action = "test2.php"> <?php
		$publicNo = $selectPublicList['PublicNo'];
		$publicName = $selectPublicList['PublicName'];
		$publicDOB = $selectPublicList['DOB'];
		?> <td> <label for = ""><?php echo $publicNo; ?></label> </td> <?php
		?> <td> <?php echo $publicName; ?> </td> <?php
		?> <td> <?php echo $publicDOB; ?> </td> <?php
		//attach data to the ID so it can be easily retrieved on click
		?><td><a href="#" data-id = "<?php echo $publicNo . " " . $publicName . " " . $publicDOB?>" data-reveal-id="public" class = "updatePublic">Update</a>|
		<a href="deletePublic.php?idd=<?php echo $publicNo  ?>">Delete</a></td> <?php
		?> <form> <?php
		?> </tr> <?php
	}

?>


</body>
</html>
