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
    <title>Group 14 | 'Admin Public'</title>
    <link rel="stylesheet" href="foundation/css/foundation.css" />
    <script src="foundation/js/vendor/modernizr.js"></script>
	
	 <link rel="stylesheet" href="css/adminpage.css" />
  </head>
  
 <body>
		

						
						
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
											</ul>
									  
										</p>
									</div>
						  
								</div>
							</div>
						</div>
					</div>
				</div>
				
		 
			 
		 
		 
			 
		 
				<div class="large-9 medium-9 small-8  columns">
				  <div class="row">
		 
		 
						  <div class="large-12 medium-12 small-12 columns">
						  
							<strong>List of projects</strong>
		 
							<table class="table">

								  <tr>
								  	<th>Project ID</th>
									<th>Project Name</th>
									<th>Start Date</th>
								  </tr>
								  <tr>
								  	 </tr>
										 <?php // connect to database
												include 'extras/connect.php';
												//get all productions 
														$result = mysqli_query($mysqli,"SELECT * from production");
														while($row = mysqli_fetch_assoc($result)){
															//print out all productions details into table
															echo "<tr>
															<td>".$row['ProductionNo']."</td>
															<td>".$row['ProductionName']."</td>
															<td>".$row['StartDate']."</td>
															<td>".$row['Complete']."</td>
															<td><a href='projectview.php?prdNo=".$row['ProductionNo']."'>View Files</a></td>
														 </tr>";
															}

														//close database connection
														$mysqli->close();
											?>
							</table>

						  <hr/></div>
						  <div class="large-12 medium-12 small-12 columns">


						  	<!-- Reveal Modals begin -->
									<div id="projects" class="reveal-modal large" data-reveal>
									  <h2>Add/Update Projects</h2>
											<!-- Social Dialogue Section -->
												<div class="row">
												<div class="large-12 columns">
												
													<table>
														<colgroup>
														<col span= "6" style="background-color:#FDEEF4">
															<col style="background-color:#F0FFFF">
														</colgroup>
														  <tr>
															<th>Project Name</th>
															<th>Last Activity</th>
															<th>Submit</th>
														  </tr>
														  <tr>
															<td><input type="text" placeholder="Enter project name here" /></td>
														   <td><input type="text" placeholder="Enter description for last activity here"></td>
														   <td><a href="#">Update</a>

														  </tr>
													</table>
												
												</div>
											  </div>
									  <a class="close-reveal-modal">&#215;</a>
									</div>


						  
							<strong>Manager Activity</strong>
		 
							<table class="table">

								  <tr>
									<th>Project Name</th>
									<th>Last Activity</th>
									<th>Make Action</th>
								  </tr>
								  <tr>
								<td>Breaking Bad</td>
								   <td>Rob| Lighting Crew| Added file</td>
								 <td><a href="projectview.html">View Info</a>|<a href="#" data-reveal-id="manager">Manage Account</a></td>
								  </tr>
							</table>

						  <hr/></div>

						  <!-- Reveal Modals begin -->
									<div id="manager" class="reveal-modal large" data-reveal>
									  <h2>Update Manager Activity</h2>
											<!-- Social Dialogue Section -->
												<div class="row">
												<div class="large-12 columns">
												
													<table>
														<colgroup>
														<col span= "6" style="background-color:#FDEEF4">
															<col style="background-color:#F0FFFF">
														</colgroup>
														  <tr>
															<th>Project Name</th>
															<th>Last Activity</th>
															<th>Submit</th>
														  </tr>
														  <tr>
															<td><input type="text" placeholder="Enter project name here" /></td>
														   <td><input type="text" placeholder="Enter description for last activity here"></td>
														   <td><a href="#">Update</a>

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
