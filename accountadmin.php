<!doctype html>
<?php
	
	if(!isset($_COOKIE['usergroup']) && $_COOKIE['usergroup'] != "admin"){

		header("location:registeredusers.html");
	}
?>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Group 14 | 'Admin Accounts'</title>
    <link rel="stylesheet" href="foundation/css/foundation.css" />
    <script src= "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!--<script src="foundation/js/vendor/modernizr.js"></script> -->
	
	 <link rel="stylesheet" href="css/adminpage.css" />
  </head>
  
 <body>
		
		<?php
			include("DB.php");
		?>
		<div id = "result"></div>

			
	    <div class="row">
			 
			  <div class="row">
		 
		   
				
				<div class="large-3 small-4 medium-3 columns">
				
		 		 
				  <div>
						<div>
							<div class="plan plan-tall">
								<div class="plan-title">
									
									<p>
								  
										<h5>
											Welcome <strong>Admin</strong>
										</h5>

										<ul class="side-nav">
										  <li><a href="publicadmin.php">PUBLIC</a></li>
										  <li><a href="investadmin.php">INVESTORS</a></li>
										  <li><a href="crewadmin.php">CREW</a></li>
										  <li><a href="accountadmin.php">ACCOUNTS</a></li>
										  <li><a href="projectadmin.php">PROJECTS</a></li>
										  <li><a href="loginadmin.php">LOGIN</a></li>
										</ul>

								  
									</p>
								  
									</p>
									<div class="large-12 columns">
										<p>
											<ul class="side-nav">
											  <li><a href="accountadmin.php"><img src="images/home.png" width="40px" height="40px"></a></li>
											  <li><a href=""><img src="images/email.png" width="40px" height="40px"></a></li>
											  <li><a href="logoutinfo.php"><img src="images/logout.png" width="40px" height="40px"></a></li>
									  
										</p>
									</div>
						  
								</div>
							</div>
						</div>
					</div>
				</div>
		 
			 
		 
		 
			 
		 
				<div class="large-9 small-8 medium-9 columns">
					<div class="row">
					<h2> Accounts </h2>
						<hr/>
						<div class="large-12 medium-12 small-12 columns">

							<dl class="accordion" data-accordion>
							  <dd class="accordion-navigation">
								<a href="#panel1b">Public Accounts</a>
								<div id="panel1b" class="content active">
									<table class="table">

										  <tr>
											<th>Number</th>
											<th>Username</th>
											<th>DOB</th>
											<th>Action</th>
											<th><input type = "button" name="add" value = "Add a new account" data-reveal-id="addpublic"></th>

										  </tr>
										  <tr>
										
										   <?php
										   		include("selectPublic.php");
										   ?>
										  </tr>
									</table>
								</div>
							  </dd>
							  

							  <!-- Reveal Modals begin -->
							  
									<div id="public" class="reveal-modal large" data-reveal>

									  <h2>Update Public Accounts</h2>
											<!-- Social Dialogue Section -->
												<div class="row">
												<div class="large-12 columns">
												
													<table>
														<colgroup>
														<col span= "6" style="background-color:#FDEEF4">
															<col style="background-color:#F0FFFF">
														</colgroup>
														  <tr>
															<th>Number</th>
															<th>Username</th>
															<th>Email Address</th>
															
														  </tr>

														  <tr>
														  	
															<td><input disabled id = "txtPublicNo" name="txtPublicName" type="text" placeholder="Enter number" /></td>
														   <td><input id = "txtPublicName" name="txtPublicName" type="text" placeholder="Enter username"></td>
														   <td><input id = "txtPublicDOB" name="txtPublicDOB" type="text" placeholder="Enter email address here"></td>
														   <td><input type="button" value="Update Profile" class="btnUpdate"></td>
														
														   

														  </tr>
													</table>
												
												</div>
											  </div>
									  <a class="close-reveal-modal">&#215;</a>
									</div>

																			<!-- Reveal Modals begin -->
									<div id="addpublic" class="reveal-modal large" data-reveal>
									  <h2>Add a Public Account</h2>
											<!-- Social Dialogue Section -->
												<div class="row">
												<div class="large-12 columns">
												
													<table>
														<colgroup>
														<col span= "6" style="background-color:#FDEEF4">
															<col style="background-color:#F0FFFF">
														</colgroup>
														  <tr>
														  	<th>Public Username</th>
															<th>Public Password</th>
															<th>Name</th>
															<th>DOB</th>
														  </tr>
														  <tr>
															<td><input id = "txtAddPublicUsername" type="text" placeholder="Enter Public Username" /></td>
														  	<td><input id = "txtAddPublicPassword" type="text" placeholder="Enter Public Password" /></td>
															<!--<td><input id = "txtAddPublicNo" name= "txtAddPublicNo" type="text" placeholder="Enter Public number here" /></td>-->
															<td><input id= "txtAddPublicName" name= "txtAddPublicName" type="text" placeholder="Enter Public name here" /></td>
														   	<td><input id= "txtAddPublicDOB" name= "txtAddPublicDOB" type="text" placeholder="Enter DOB here"></td>
														   	<td><input type="button" class= "btnAddPublic"  value="Add" >

														  </tr>
													</table>
												
												</div>
											  </div>
									  <a class="close-reveal-modal">&#215;</a>
									</div>
									


							  <dd class="accordion-navigation">
								<a href="#panel2b">Investors</a>
								<div id="panel2b" class="content">
								  <table class="table">

										  <tr>
											<th>Number</th>
											<th>Name</th>
											<th>Productions funding</th>
											<th>Action</th>
											<th><input type = "button" name="add" value = "Add a new account" data-reveal-id="addinvestor"></th>

										  </tr>
										  <tr>
											<?php
												include("selectInvestor.php");
											?>
										  </tr>
									</table>
								</div>
							  </dd>

							  <!-- Reveal Modals begin -->
									<div id="investors" class="reveal-modal large" data-reveal>
									  <h2>Update Investors Accounts</h2>
											<!-- Social Dialogue Section -->
												<div class="row">
												<div class="large-12 columns">
												
													<table>
														<colgroup>
														<col span= "6" style="background-color:#FDEEF4">
															<col style="background-color:#F0FFFF">
														</colgroup>
														  <tr>
															<th>Number</th>
															<th>Name</th>
															<th>Last Name</th>
															<th>Action</th>
														  </tr>
														  <tr>
															<td><input disabled id="txtInvestorNo" name="txtInvestorNo" type="text" placeholder="Enter number" /></td>
														   <td><input id="txtInvestorFirstName" name="txtInvestorFirstName" type="text" placeholder="Enter Name"></td>
														   <td><input id="txtInvestorLastName" name="txtInvestorLastName" type="text" placeholder="Enter Last Name"></td>
														   <td><input type="button" value="Update" class="btnInvestorUpdate">
														   	
														  </tr>
													</table>
												
												</div>
											  </div>
									  <a class="close-reveal-modal">&#215;</a>
									</div>

										<!-- Reveal Modals begin -->
									<div id="addinvestor" class="reveal-modal large" data-reveal>
									  <h2>Add an Investor Account</h2>
											<!-- Social Dialogue Section -->
												<div class="row">
												<div class="large-12 columns">
												
													<table>
														<colgroup>
														<col span= "6" style="background-color:#FDEEF4">
															<col style="background-color:#F0FFFF">
														</colgroup>
														  <tr>
														  	<th>Investor Username</th>
															<th>Investor Password</th>
															<th>Investor First name</th>
															<th>Investor Last name</th>
														  </tr>
														  <tr>
															<td><input id = "txtAddInvestorUsername" type="text" placeholder="Enter Investor Username" /></td>
														  	<td><input id = "txtAddInvestorPassword" type="text" placeholder="Enter Investor Password" /></td>															
															<td><input id= "txtAddInvestorFirstName" name= "txtAddInvestorFirstName" type="text" placeholder="Enter First name here" /></td>
														   	<td><input id= "txtAddInvestorLastName" name= "txtAddInvestorLastName" type="text" placeholder="Enter Last Name here"></td>
														   	<td><input type="button" class= "btnAddInvestor"  value="Add" >

														  </tr>
													</table>
												
												</div>
											  </div>
									  <a class="close-reveal-modal">&#215;</a>
									</div>


							  <dd class="accordion-navigation">
								<a href="#panel3b">Crew Accounts</a>
								<div id="panel3b" class="content">
								  <table class="table">

										  <tr>
											<th>Number</th>
											<th>Name</th>
											<th>Department</th>
											<th>Action</th>
											<th><input type = "button" name="add" value = "Add a new account" data-reveal-id="addcrew"></th>

										  </tr>
										  <tr>
											<?php
												include("selectStaff.php");
											?>
											
										  </tr>
									</table>
								</div>
							  </dd>

							  <!-- Reveal Modals begin -->
									<div id="crew" class="reveal-modal large" data-reveal>
									  <h2>Update Staff Accounts</h2>
											<!-- Social Dialogue Section -->
												<div class="row">
												<div class="large-12 columns">
												
													<table>
														<colgroup>
														<col span= "6" style="background-color:#FDEEF4">
															<col style="background-color:#F0FFFF">
														</colgroup>
														  <tr>
															<th>Number</th>
															<th>Name</th>
															<th>Department</th>
															<th>Action</th>
														  </tr>
														  <tr>
															<td><input disabled id="txtStaffNo" name="txtStaffNo" type="text" placeholder="Enter number" /></td>
														   <td><input id="txtStaffName" name="txtStaffName" type="text" placeholder="Enter Name"></td>
														   <td><input id= "txtStaffJob" name="txtStaffJob" type="text" placeholder="Enter Department"></td>
														   <td><input id="btnStaffUpdate" type="button" value="Update" class="btnStaffUpdate">

														  </tr>
													</table>
												
												</div>
											  </div>
									  <a class="close-reveal-modal">&#215;</a>
									</div>

											<!-- Reveal Modals begin -->
									<div id="addcrew" class="reveal-modal large" data-reveal>
									  <h2>Add an Staff Account</h2>
											<!-- Social Dialogue Section -->
												<div class="row">
												<div class="large-12 columns">
												
													<table>
														<colgroup>
														<col span= "6" style="background-color:#FDEEF4">
															<col style="background-color:#F0FFFF">
														</colgroup>
														  <tr>
															<th>Staff Username</th>
															<th>Staff Password</th>
															<th>Staff Name</th>
															<th>Department</th>
														  </tr>
														  <tr>
															<td><input id = "txtAddStaffUsername" type="text" placeholder="Enter Staff Username" /></td>
														  	<td><input id = "txtAddStaffPassword" type="text" placeholder="Enter Staff Password" /></td>
															
														   	<td><input id= "txtAddStaffName" type="text" placeholder="Enter Staff name here"></td>
														   	<td><input id = "txtAddStaffJob" type="text" placeholder="Enter department here"></td>

														   <td><a class="btnStaffAdd" href="#">Add Staff member</a>

														  </tr>
													</table>
												
												</div>
											  </div>
									  <a class="close-reveal-modal">&#215;</a>
									</div>



							</dl>
						</div>
					</div>
				</div>
			  </div>

			</div>
      </div>
    


    <script src="foundation/js/vendor/jquery.js"></script>
    <script src="foundation/js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
	
  </body>
  
</html>
