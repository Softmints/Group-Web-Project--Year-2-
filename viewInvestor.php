<html>
	<head>
		<script src= "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	</head>
	<script>
		//when the update public is clicked set the values of the modal equal to the data displayed
		$(document).on("click", ".updateInvested", function(){
			var myPublicId = $(this).data('id');
			var userData = myPublicId.split(", ");
			$("#txtInvestorName").val(userData[1].concat(" ", userData[2]));
			$("#btnAdd").attr('data-id', userData[0]);
			
		})
		$(document).on("click", ".deleteInvested", function(){
			//set data in modal as data of row selected to be deleted
			var myPublicId = $(this).data('id');
			var userData = myPublicId.split(", ");
			$("#txtDelInvestorName").val(userData[1].concat(" ", userData[2]));
			$("#btnDelete").attr('data-id', userData[0]); //set button id as data as means of passing between functions
		})

		//when the submit update button is clicked collect the vales and send them to a php script
		$(document).on("click", "#btnAdd", function(){
			var errors = 0;
			var myPublicId = $(this).data('id');
			var production = document.getElementById('txtInvestorProduction').value;
			var amount = document.getElementById('txtInvestorAmount').value;
			var date = document.getElementById('txtInvestorDate').value;
			//ensure data is correct by validation
			if (date == "" || amount=="" || production=="" ){
				alert("please complete all fields");
				errors=1;
			} else {
				errors=0;			
			}
			//ensure date is correct format by validation
			if (!/^\d{4}\/\d{1,2}\/\d{1,2}$/.test(date)){
				alert("Please Enter data as YYYY/MM/DD")
				errors =1;
			} else {
				errors =0;
			}
			if (errors == 0){
				window.location.href = "investinProduction.php?id=" + myPublicId + "&production=" + production + "&amount=" + amount + "&date=" + date;
			}
			
		})

		$(document).on("click", "#btnDelete", function(){
			//get the data that has been entered
			var myPublicId = $(this).data('id');
			var production = document.getElementById('txtDelInvestorProduction').value;
			//check data is present
			if (production=="" ){
				alert("please complete all fields");
				errors=1;
			} else {
				errors=0;			
			}
			if (errors==0){
				window.location.href = "removeProduction.php?id=" + myPublicId + "&production=" + production;
			}
			
		})

	</script>
	<?php
		include("DB.php");
		//Select investor data of productions invested in and output it in desired format
		$investor = "SELECT i.investorNo, CONCAT( i.investorFirstName, ', ', i.investorLastName ) AS Name, Group_concat( p.productionName ) AS Productions FROM production p RIGHT JOIN investedproduction ip ON p.productionNo = ip.productionNo RIGHT JOIN investor i ON ip.investorNo = i.investorNo GROUP BY Name";
		$selectInvestorQuery = mysqli_query($con, $investor );	
	?>	

	<tr>

		<?php while ($selectInvestorList = mysqli_fetch_assoc($selectInvestorQuery)) { //display all retrieved data in rows
					?> <tr> <?php
					$InvestorNo = $selectInvestorList['investorNo'];
					$InvestorName = $selectInvestorList['Name'];
					$InvestorProductions = $selectInvestorList['Productions'];	

					?> <td> <?php echo $InvestorName; ?> </td> <?php
					?> <td> <?php echo $InvestorProductions; ?> </td> <?php
					//attach data to link ID to pass data to javascript functions
					?><td><a class = "updateInvested" data-id="<?php echo $InvestorNo . ", " . $InvestorName ?>" data-reveal-id="Add" >Update</a>|
					<a class="deleteInvested" idd = "<?php echo $InvestorNo ?>" data-id="<?php echo $InvestorNo . ", " . $InvestorName ?>" data-reveal-id="Delete">Delete</a> </td><?php
					?> </tr> <?php
			}
		?>
										 
	</tr>

</html>