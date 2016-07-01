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
    <title>Group 14 | 'Admin Investors'</title>
    <link rel="stylesheet" href="foundation/css/foundation.css" />
    <script src="foundation/js/vendor/modernizr.js"></script>
	
	 <link rel="stylesheet" href="css/adminpage.css" />
  </head>
  
 <body>
			<?php
	if (isset($_GET['upload'])&& $_GET['upload']=='true'){
	echo"
		<script type='text/javascript'>
    window.alert('File successfully uploaded');
	</script>";	
	}elseif (isset($_GET['upload']) && $_GET['upload']=='false'){
		echo"
		<script type='text/javascript'>
    window.alert('File upload was unsuccessful. Please ensure that you have filled out all fields');
	</script>";	
	}
	?>

						
						
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
									<div class="large-12 columns">
										<p>
											<ul class="side-nav">
											 <li><a href="accountadmin.php"><img src="images/home.png" width="40px" height="40px"></a></li>
											  <li><a href=""><img src="images/email.png" width="40px" height="40px"></a></li>
											  <li><a href="logoutinfo.php"><img src="images/logout.png" width="40px" height="40px"></a></li>
											</ul>
									  
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
		 
			 
		 
		 
			 
		 
				<div class="large-9 medium-9 small-8 columns">
				  <div class="row">
		 
		 
						  <div class="large-12 medium-12 small-12 columns">
						  
							<strong>List of investors</strong>
		 
							<table class="table">

								  <tr>
									<th>Investor Name</th>
									<th>Invested Projects</th>
									<th>Make Action</th>
									
								  </tr>
								  <?php
								  	include("viewInvestor.php");
								  ?>
							</table>

						  <hr/></div>

						   <div class="large-12 medium-12 small-12 columns">
						  
							<strong>List of Project Reports</strong>
		 
							<table class="table">
								  <tr>
									<th>Report No</th>
									<th>Production No</th>
									<th>Report Name</th>
									<th>Upload Date</th>
									<th><input type = "button" name="add" value = "Add a new report" data-reveal-id="addreport"></th>
									
								  </tr>
								  <?php
								  	include("retReport.php");
								  ?>
							</table>

						  <hr/></div>

						  <div id="addreport" class="reveal-modal large" data-reveal>
									  <h2>Add a new Report</h2>
											<!-- Social Dialogue Section -->
												<div class="row">
												<div class="large-12 columns">
												
													<table>
														<colgroup>
														<col span= "6" style="background-color:#FDEEF4">
															<col style="background-color:#F0FFFF">
														</colgroup>
														   <form action='reportUpload.php' method='post' enctype='multipart/form-data'>
														    
														    Production No: <br>
														    <input type='number' name='proNumber' id='proNumber'>
														    Attach CV
														    <input type='file' name='file'><br>
														    Submit Application
														    <input type='submit' class='button' name='submit' value='Submit'>
															</form>
													</table>
												
												</div>
											  </div>
									  <a class="close-reveal-modal">&#215;</a>
									</div>


						   <!-- Reveal Modals begin -->
									<div id="Delete" class="reveal-modal large" data-reveal>
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
															<th>Investor Name</th>
															<th>Projects funding</th>
															<th>Add</th>
														  </tr>
														  <tr>
															<td><input id="txtDelInvestorName" type="text" placeholder="Enter investor name here" /></td>
														   <td><input id="txtDelInvestorProduction" type="text" placeholder="Enter projects funding here"></td>
														   <td><input type="button" id="btnDelete" class="btnDeleteInvested" value="Delete">

														  </tr>
													</table>
												
												</div>
											  </div>
									  <a class="close-reveal-modal">&#215;</a>
									</div>


									<!-- Reveal Modals begin -->
									<div id="Add" class="reveal-modal large" data-reveal>
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
															<th>Investor Name</th>
															<th>Projects funding</th>
															<th>Add</th>
														  </tr>
														  <tr>
															<td><input id="txtInvestorName" type="text" placeholder="Enter investor name here" /></td>
														   <td><input id="txtInvestorProduction" type="text" placeholder="Enter projects funding here"></td>
														   <td><input id="txtInvestorAmount" type="text" placeholder="Enter Amount Contributed"></td>
														   <td><input id="txtInvestorDate" type="text" placeholder="Enter Date to be paid"></td>
														   <td><input type="button" id = "btnAdd" class="btnAddInvested" value="Add">

														  </tr>
													</table>
												
												</div>
											  </div>
									  <a class="close-reveal-modal">&#215;</a>
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
