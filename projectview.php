<!doctype html>
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
									<div class="large-6 columns">
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
					<h2> <?php
					 $prdNo=$_GET['prdNo'];
					?></h2>
						<hr/>
						</div>
						<div class="large-12 medium-12 small-12 columns">
						  
							<strong>Lighting</strong>
		 
							<table class="table">

								  <tr>
									<th>File Name</th>
									<th>File URL</th>
									<th>Date Uploaded</th>
									<th>Activity</th>
								  </tr>
								<?php
								  //include 'connection.php';
								  $Catagory='Lighting';
								  include 'selectFiles.php';
								  //close database connection
														
								  ?>
							</table>

						  <hr/>
						<div class="large-12 medium-12 small-12 columns">
						  
							<strong>Photography Team</strong>
		 
							<table class="table">

								  <tr>
									<th>File Name</th>
									<th>File URL</th>
									<th>Date Uploaded</th>
									<th>Activity</th>
								  </tr>
								 <?php

								  //include 'connection.php';
								  $Catagory='Photography';
								  include 'selectFiles.php';
								  //close database connection
														
								  ?>
								 
							</table>

						  <hr/>
						</div>
						<div class="large-12 medium-12 small-12 columns">
						  
							<strong>Sound Team</strong>
		 
							<table class="table">

								  <tr>
									<th>File Name</th>
									<th>File URL</th>
									<th>Date Uploaded</th>
									<th>Activity</th>
								  </tr>
								<?php
								  //include 'connection.php';
								  $Catagory='Sound';
								  include 'selectFiles.php';
								  //close database connection
														
								  ?>
							</table>

						  <hr/>
						</div>
						<div class="large-12 medium-12 small-12 columns">
						  
							<strong>Production and Design Team</strong>
		 
							<table class="table">

								  <tr>
									<th>File Name</th>
									<th>File URL</th>
									<th>Date Uploaded</th>
									<th>Activity</th>
								  </tr>
								<?php
								  //include 'connection.php';
								  $Catagory='Production';
								  include 'selectFiles.php';
								  //close database connection
														
								  ?>
							</table>

						  <hr/>
						</div>
						<div class="large-12 medium-12 small-12 columns">
						  
							<strong>Editing Team</strong>
		 
							<table class="table">

								  <tr>
									<th>File Name</th>
									<th>File URL</th>
									<th>Date Uploaded</th>
									<th>Activity</th>
								  </tr>
								  <?php
								  //include 'connection.php';
								  $Catagory='Editing';
								  include 'selectFiles.php';
								  //close database connection					
								  ?>
							</table>

						  <hr/>
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
