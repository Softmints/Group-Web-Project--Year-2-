<!doctype html>
<?php
	
	if(!isset($_COOKIE['usergroup']) && $_COOKIE['usergroup'] != "public"){

		header("location:registeredusers.html");
	}
?>


<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Group 14 | Public</title>
    <link rel="stylesheet" href="foundation/css/foundation.css" />
    <script src="foundation/js/vendor/modernizr.js"></script>
	
	 <link rel="stylesheet" href="css/publicstyles.css" />

	 <style>
		body {
			background-image: url("images/backgroundtwo.jpg");
			background-repeat: no-repeat;
		}
		</style>

  </head>
  
 <body>
	<div class="hero"></div>


	
		<div class="off-canvas-wrap" data-offcanvas>
		  <div class="inner-wrap">
			<nav class="tab-bar">
			  <section class="left-small">
				<a class="left-off-canvas-toggle menu-icon" href="#"><span></span></a>
			  </section>

			  <section class="middle tab-bar-section">
				<h1 class="title">Account Details</h1>
			  </section>
			  
			</nav>

			<aside class="left-off-canvas-menu">
			  <ul class="off-canvas-list">

					<li align="middle"><img src="images/user.png" height="150" width="150"></li>
					<li class="usetitle"> Username </li>
					<li>
				
				
						<table class="table-fill">
							<tbody class="table-hover">
								<tr>
									<td class="text-left tabletd teptitle">Location</td>
									<td class="text-left tabletd tepsubtitle">Cardiff/ Wales</td>
								</tr>
								<tr>
									<td class="text-left tabletd teptitle">Occupation</td>
									<td class="text-left tabletd tepsubtitle">Students</td>
								</tr>
								<tr>
									<td class="text-left tabletd teptitle">Work</td>
									<td class="text-left tabletd tepsubtitle">Cardiff University</td>
								</tr>
								<tr>
									<td class="text-left tabletd teptitle">Interests</td>
									<td class="text-left tabletd tepsubtitle">Sports, Design and IT Coding</td>
								</tr>
							</tbody>
						</table>
					</li>
					
					<li><label><a href="#" data-reveal-id="edit1">Edit Details</a></label></li>
						<!-- Reveal Modals begin -->
									<div id="edit1" class="reveal-modal large" data-reveal>
									  <h2>Bio Details</h2>
											<!-- Social Dialogue Section -->
											<div class="row">
												<div class="large-12 columns">
													<form>
													  <div class="row">
														<div class="large-12 columns">
														  <label>Location
															<input type="text" placeholder="Enter your location" />
														  </label>
														</div>
													  </div>
													  <div class="row">
														<div class="large-12 columns">
														  <label>Occupation
															<input type="text" placeholder="Enter your occupation" />
														  </label>
														</div>
													  </div>
													  <div class="row">
														<div class="large-12 columns">
														  <label>Place of work
															<input type="text" placeholder="Enter your place of work" />
														  </label>
														</div>
													  </div>
													  <div class="row">
														<div class="large-12 columns">
														  <label>Interests
															<input type="text" placeholder="List your interests" />
														  </label>
														</div>
													  </div>
													</form>
												</div>
											</div>
											<div class="row">
												<div class="large-12 columns">
													<a class="button2" href="#">Update</a>
												</div>
											</div>
									  <a class="close-reveal-modal">&#215;</a>
									</div>
								<!-- REveal Modals Ends -->
			  </ul>
			  
			
			</aside>



			<section class="main-section">	

 
		
						<!-- Row Part starts -->
				
				
						<div class="header">
							<div class="row">
								<div class="large-9 medium-9 small-6 large-offset-1 medium-offset-1 small-offset-3 columns">
									<p class="headerfont" style="text-align:center;">Public Page </p>
								</div>
								<div class="large-1 medium-1 small-2 columns">
									<div class="plan plan-tall alerticon">
										<a> <img src="images/alert.png" height="30" width="30"> </a>
										<a href="logoutinfo.php"> <img src="images/logout.png" height="20" width="20"> </a>
									</div>
								</div>
							</div>
						</div>
				
				
				
				<!-- Row2 Part starts -->
       
      <div class="row">
      
        <div class="large-9 medium-9 small-12 columns">
     
           
          <fieldset class="bio">
						
							
							
							<div class="row">
								<div class="large-12 medium-12 small-12 columns">
													<h4>Apply for Job</h4>
								</div>

								<div class="large-7 medium-7 small-6 columns">
									<p class="p">
										This is where you apply for a job. To process that please click on "Apply now"!
									</p>
									<a href="#" data-reveal-id="apply"  class="button alert round disabled">Apply now</a>
									
								</div>
								<div class="large-5 medium-5 small-6 columns">
									<img src="images/applyicon.jpg" height="100" width="100">
									
								</div>								
							</div>
							
							
								<!-- Reveal Modals begin -->
									<div id="apply" class="reveal-modal large" data-reveal>
									  <h2>Jobs</h2>
											<!-- Social Dialogue Section -->
												<div class="row">
												<div class="large-12 columns">
												
													<table>
														<colgroup>
														<col span= "6" style="background-color:#FDEEF4">
															<col style="background-color:#F0FFFF">
														</colgroup>
														  <tr>
														  	<th>Job ID</th>
															<th>Job Title</th>
															<th>Description</th>
															<th>Apply</th>
														  </tr>
														  <!-- This lists the jobs that are currently available-->
														<?php
															include 'extras/connect.php';
																	$result = mysqli_query($mysqli,"SELECT JobID, JobTitle, JobDescription from jobs");
																	$count = 0;
																	while($row = mysqli_fetch_array($result)){
																		echo"<tr>
																				<td>#".$row['JobID']."</td>
																				<td>".$row['JobTitle']."</td>
																				<td>".$row['JobDescription']."</td>
																				<td><a href=# data-reveal-id='apply-form$count'>Apply Now</a></td>
																			</tr>";
																			$count++;
																		}
																			$mysqli->close();?>

																			</table>
												
																			</div>
											  							</div>
									 									<a class='close-reveal-modal'>&#215;</a>
																		</div>



<?php
															include 'extras/connect.php';
																	$result = mysqli_query($mysqli,"SELECT JobID, JobTitle, JobDescription from jobs");
																	$count = 0;
																	while($row = mysqli_fetch_array($result)){

																echo "<div id='apply-form$count' class='reveal-modal large' data-reveal>

								  							<h2>Application</h2>

															<!-- Social Dialogue Section -->
																<div class='row'>
																<div class='large-12 columns'>
																
																	<table>
																		<colgroup>
																		<col span= '6' style='background-color:#FDEEF4'>
																			<col style='background-color:#F0FFFF'>
																		</colgroup>

														<!-- This is the mulitpart form that allows users to upload CV -->
														    <form action='Appinfo.php' method='post' enctype='multipart/form-data'>
														    <input type='hidden' name='JobID' value = " . $row['JobID'] . " />
														    First Name: <br>
														    <input type='text' name='firstname' id='firstname'>
														    Last Name: <br>
														    <input type='text' name='lastname' id='lastname'>
														    E-Mail: <br>
														    <input type='text' name='email' id='email'>
														    Contact number: <br>
														    <input type='text' name='number' id='number'>
														    Attach CV
														    <input type='file' name='file'><br>
														    Submit Application
														    <input type='submit' class='button' name='submit' value='Submit'>
															</form>
														</table>
												</div>
										  </div>
									  <a class='close-reveal-modal'>&#215;</a>
									</div>";
	
						$count++;

						}
					//close database connection
					$mysqli->close();
							?>
													
					</fieldset>
						
						
					<div class="small-6 medium-6 large-6 columns">	
						<fieldset class="bio">
						
							<div class="row">
								<div class="large-12 medium-12 small-12 columns">
									<h4>View Trailers</h4>
								</div>
								<div class="large-6 medium-6 small-6 columns">
									<p class="p">
										This will shows up our latest trailers
									</p>
									<a href="#" data-reveal-id="trailer"  class="button alert round disabled">View Trailers</a>
								</div>
								<div class="large-6 medium-6 small-6 columns">
									<img src="images/trailer.jpg" height="100" width="100">
								</div>								
							</div>
							
							
								<!-- Reveal Modals begin -->
									<div id="trailer" class="reveal-modal large" data-reveal>
									  <h2>Trailers</h2>
											<!-- Social Dialogue Section -->
												<div class="row">
													<!-- Display the trailers listed in DB-->
													<?php
									  				include ("viewTrailer.php");
									  				?>
											  </div>
									  <a class="close-reveal-modal">&#215;</a>
									</div>
								<!-- REveal Modals Ends -->
						</fieldset>
	
					</div>
					<div class="small-6 medium-6 large-6 columns">	

						<fieldset class="bio">
						
							<div class="row">
								<div class="large-12 medium-12 small-12 columns">
									<h4>News Feed</h4>
								</div>
								<div class="large-6 medium-6 small-7 columns">
									<p class="p">
										This will show up all news feed. 
									</p>
									<a href="#" data-reveal-id="newsfeed"  class="button alert round disabled">View News Feed</a>
								</div>
								<div class="large-6 medium-6 small-5 columns">
									<img src="images/newsfeed.jpg" height="100" width="100">
								</div>								
							</div>
							
							
								<!-- Reveal Modals begin -->
									<div id="newsfeed" class="reveal-modal large" data-reveal>
									  <h2>News Feed</h2>
											<!-- Social Dialogue Section -->
												<div class="row">
													<table>
														<colgroup>
														<col span= "6" style="background-color:#FDEEF4">
															<col style="background-color:#F0FFFF">
														</colgroup>
														  <tr>
															<th>Movie</th>
															<th>Recent News</th>
														  </tr>
														  <tr>
														<td><img src="images/movieone.jpg" height="60" width="60"></td>
														   <td>
																<ul>
																  <li>15 days left for trailer release</li>
																  <li>ANOTHER SET OF NEWS |||||| </li>
																</ul>
															</td>
														  </tr>
														  <tr>
														  	<?php
														  		include 'extras/getNews.php';
														  	?>
														  </tr>
													</table>
											  </div>
									  <a class="close-reveal-modal">&#215;</a>
									</div>
								<!-- REveal Modals Ends -->
						</fieldset>
					</div>
           
     
        </div>
     
         
         
        <aside class="large-3 medium-3 columns hide-for-small">
			<div class="ad medium rectangle">
				<img src="images/ad1.jpg">
			</div>
        </aside>
     
      </div>

	<!-- footer -->

		<footer id="footer">
			    <div class="row">
					<div class="small-6 medium- 8 large-3 columns">
						<p class="footerdes">
							Designed by |  <a href="#"> GROUP 14</a>
						</p>	
					</div>

						<div class="small-6 medium-4 large-9 columns">
							<p align="center">
								<a>Contact</a> | <a> Support </a>
							</p>
						</div>
				</div>
		</footer>
					
  			</section>

		  <a class="exit-off-canvas"></a>

		  </div>
		</div>
		
		  			</section>

		  <a class="exit-off-canvas"></a>

	</div>
		</div>



    <script src="foundation/js/vendor/jquery.js"></script>
	<script src="foundation/js/foundation/foundation.js"></script>
	<script src="foundation/js/foundation/foundation.orbit.js"></script>
    <script src="foundation/js/vendor/jquery.js"></script>
    <script src="foundation/js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  
  
</body>
  
</html>
