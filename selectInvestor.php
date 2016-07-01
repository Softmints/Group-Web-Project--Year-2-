

<html>
<head>
	<script src= "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
	<script >
	//when the update button is clicked set the values of the modal equal to the data displayed
			$(document).on("click", ".updateInvestor", function(){ 
					var myPublicId = $(this).data('id');
					var investorData = myPublicId.split(" ");

					
					$("#txtInvestorFirstName").val(investorData[1]);
					$("#txtInvestorLastName").val(investorData[2]);
				})	

				$(document).on("click", ".btnInvestorUpdate", function(){
					//when the submit update button is clicked collect the vales and send them to a php script
			   		var iName = document.getElementById('txtInvestorFirstName').value;
			   		
			   		var iLastName = document.getElementById('txtInvestorLastName').value;
			   		//ensure data is correct by validation
			   		var errors = 0;
			   		if (iName==""||iLastName==""){
			   			alert("Please Complete all fields");
			   			errors= 1;
			   		} else {
			   			errors = 0;
			   		}
			   		if (errors ==0){
						window.location.href = "updateInvestor.php?iName="+iName + "&iLastName=" + iLastName;
			   		}
			   	})	

			   	$(document).on("click", ".btnAddInvestor", function(){
			   		//on click of the add button get the data entered and post to a php script
			   		var staffUsername = document.getElementById('txtAddInvestorUsername').value;
			   		var staffPassword = document.getElementById('txtAddInvestorPassword').value;
			   		var investorAddName = document.getElementById('txtAddInvestorFirstName').value;
			   		//var investorAddNo = document.getElementById('txtAddInvestorNo').value;
			   		var investorAddLastName = document.getElementById('txtAddInvestorLastName').value;
			   		//ensure data is correct by validation
			   		var errors = 0;
			   		if (investorAddName=="" ||investorAddLastName==""){
			   			alert("Please Complete all fields");
			   			errors= 1;
			   		} else {
			   			errors = 0;
			   		}
			   		if (errors ==0){
						window.location.href = "addInvestor.php?iName="+ investorAddName + "&iLastName=" + investorAddLastName+ "&username="+ staffUsername+ "&password="+ staffPassword;
			   		}
			   		})																											  	
		  </script>


<?php 
	//Select all data on investors
	$selectInvestor = "SELECT * FROM investor";
	$selectInvestorQuery = mysqli_query($con, $selectInvestor);
	//display all data in rows
	while ($selectInvestorList = mysqli_fetch_assoc($selectInvestorQuery)) {
	?> <tr> <?php
	$InvestorNo = $selectInvestorList['InvestorNo'];
	$InvestorName = $selectInvestorList['InvestorFirstName'];
	$InvestorSurname = $selectInvestorList['InvestorLastName'];
	?> <td> <?php echo $InvestorNo; ?> </td> <?php
	?> <td> <?php echo $InvestorName; ?> </td> <?php
	?> <td> <?php echo $InvestorSurname; ?> </td> <?php
	//attach data to the ID so it can be easily retrieved on click
	?><td><a href="#"  data-id="<?php echo $InvestorNo . " " . $InvestorName . " " . $InvestorSurname?>" data-reveal-id="investors" class= "updateInvestor">Update</a>|
	<a href="deleteInvestor.php?idd=<?php echo $InvestorNo ?>">Delete</a></td> <?php
	?> </tr> <?php
	}
?>

</body>
</html>