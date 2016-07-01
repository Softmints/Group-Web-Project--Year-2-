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
		 
			 
		 
		 
			 
		 
				<div class="large-9 small-8 medium-9 columns">
					<div class="row">
					<h2> Login Details </h2>
						<hr/>
						<div class="large-12 medium-12 small-12 columns">

							<dl class="accordion" data-accordion>
							  <dd class="accordion-navigation">
								<a href="#panel1b">Login Accounts</a>
								<div id="panel1b" class="content active">
									<table class="table">

										  <tr>
											<th>Username</th>
											<th>Password</th>
											<th>Privileges</th>
											<th>Action</th>
										  </tr>
										  <tr>
											<?php include("selectLogin.php"); ?>
										  </tr>
									</table>
								</div>
							  </dd>

							  <!-- Reveal Modals begin -->
									<div id="public" class="reveal-modal large" data-reveal>
									  <h2>Edit registered accounts</h2>
											<!-- Social Dialogue Section -->
												<div class="row">
												<div class="large-12 columns">
												
													<table>
														<colgroup>
														<col span= "6" style="background-color:#FDEEF4">
															<col style="background-color:#F0FFFF">
														</colgroup>
														  <tr>
															<th>Username</th>
															<th>Password</th>
															<th>Action</th>
															<th></th>
														  </tr>
														  <form action="#" method="get">
														  <tr>
															<td><input id = "txtUsername" type="text" placeholder="Enter username" /></td>
														   <td><input id = "txtPassword" type="text" placeholder="Enter password"></td>
														   
														   <td><a class = "changeLogin">Update</a></td>
														   </form>

														  </tr>
													</table>
												
												</div>
											  </div>
									  <a class="close-reveal-modal">&#215;</a>
									</div>


							 


    <script src="foundation/js/vendor/jquery.js"></script>
    <script src="foundation/js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
	
  </body>
  
</html>
