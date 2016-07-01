<!doctype html>
<html class="no-js" lang="en">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Group 14 | 'Staff'</title>
    <link rel="stylesheet" href="foundation/css/foundation.css" />
    <script src="foundation/js/vendor/modernizr.js"></script>
	
	 <link rel="stylesheet" href="css/investstyles.css" />
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
    window.alert('File upload was unsuccessful. Please try again');
	</script>";	
	}
?>
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
									<td class="text-left tabletd teptitle">Department</td>
									<td class="text-left tabletd tepsubtitle">e.g. Lighting Crew</td>
								</tr>
								<tr>
									<td class="text-left tabletd teptitle">Projects working on</td>
									<td class="text-left tabletd tepsubtitle">e.g. Breaking Bad</td>
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
														  <label>Department
															<input type="text" placeholder="Enter your Department name" />
														  </label>
														</div>
													  </div>
													  <div class="row">
														<div class="large-12 columns">
														  <label>Projects working
															<input type="text" placeholder="Enter the projects you are currently working on" />
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
								<div class="large-9 medium-9 small-9 large-offset-1 medium-offset-1 small-offset-2 columns">
									<p class="headerfont" style="text-align:center;">"Staff name", welcome to your portal </p>
								</div>
								<div class="large-1 medium-1 small-1 columns">
									<a> <img  class="alerticon" src="images/alert.png" height="30" width="30"> </a>
								</div>
							</div>
						</div>


						<div class="large-9 medium-9 small-8 columns">
				  <div class="row">
		 
		 
						  <div class="large-12 medium-12 small-12 columns">
						  
							<strong>Staff Directories</strong>
		 
							<table class="table">

								  <tr>
								  	<th>Staff files</th>
									<tr><td><a href="#" data-reveal-id="lighting">Lighting Crew</td></tr></a>
									<tr><td><a href="#" data-reveal-id="sound">Sound Crew</td></tr></a>
									<tr><td><a href="#" data-reveal-id="photo">Photography Crew</td></tr></a>
									<tr><td><a href="#" data-reveal-id="production">Production Crew</td></tr></a>
									<tr><td><a href="#" data-reveal-id="editing">Editing Crew</td></tr></a>
								  </tr>
							</table>

						  <hr/></div>
						  <!-- Reveal Modals begin -->
													<div id="lighting" class="reveal-modal large" data-reveal>
													  <h2>Lighting Crew files</h2>
													  
													  <form action="CrewUpload.php?prdNo=light" method="post" enctype="multipart/form-data">
														    <input type="file" name="file"><br><br>
														    <input type="submit" name="submit" value="Submit">
														</form>
															<!-- Social Dialogue Section -->
															<div class="row">
																<div class="large-12 columns">
																	<table>
																		<colgroup>
																		<col span= "10" style="background-color:#FDEEF4">
																			<col style="background-color:#F0FFFF">
																		</colgroup>
																		  <tr>
																			<th>Date</th>
																			<th>File Name</th>
																		  </tr>
																		  <?php
																				include 'extras/connect.php';
																				//check if form has been submitted
																						//set variable
																						    //Print the reulst as a list
																						$result = mysqli_query($mysqli,"SELECT MediaNo, MediaName, MediaURL, UDate from media WHERE Catagory ='light'");
																						while($row = mysqli_fetch_array($result)){
																							echo"<tr>
																							<td>".$row['UDate']."</td>
																									<td><a href='".$row['MediaURL']."' download>".$row['MediaName']."</a></td>
																									</tr>";
																							}
																						//close database connection
																						$mysqli->close();
																			?>
																		<!--<td><a href="crewUploadRet.php?prdNo=light">2015/01/15</a></td>
																		<td>Tomorrows schedule</td>
																		<td><a href="file.pdf">file.pdf</a></td>-->
																		 
																	</table>
																</div>
															</div>
													  <a class="close-reveal-modal">&#215;</a>
													</div>
												<!-- REveal Modals Ends -->
										</fieldset>
					
									</div>

									<!-- Reveal Modals begin -->
													<div id="sound" class="reveal-modal large" data-reveal>
													  <h2>Sound Crew files</h2>
													  <form action="CrewUpload.php?prdNo=sound" method="post" enctype="multipart/form-data">
														    <input type="file" name="file"><br><br>
														    <input type="submit" name="submit" value="Submit">
														</form>
															<!-- Social Dialogue Section -->
															<div class="row">
																<div class="large-12 columns">
																	<table>
																		<colgroup>
																		<col span= "10" style="background-color:#FDEEF4">
																			<col style="background-color:#F0FFFF">
																		</colgroup>
																		  <tr>
																			<th>Date</th>
																			<th>File Name</th>
																		  </tr>
																		 <?php
																				include 'extras/connect.php';
																				//check if form has been submitted
																						//set variable
																						    //Print the reulst as a list
																						$result = mysqli_query($mysqli,"SELECT MediaNo, MediaName, MediaURL, UDate from media WHERE Catagory ='sound'");
																						while($row = mysqli_fetch_array($result)){
																							echo"<tr>
																							<td>".$row['UDate']."</td>
																									<td><a href='".$row['MediaURL']."' download>".$row['MediaName']."</a></td>
																									</tr>";
																							}
																						//close database connection
																						$mysqli->close();
																			?>
																	</table>
																</div>
															</div>
													  <a class="close-reveal-modal">&#215;</a>
													</div>
												<!-- REveal Modals Ends -->
										</fieldset>
					
									</div>
									<!-- Reveal Modals begin -->
													<div id="photo" class="reveal-modal large" data-reveal>
													  <h2>Photography Crew files</h2>
													  <form action="CrewUpload.php?prdNo=photo" method="post" enctype="multipart/form-data">
														    <input type="file" name="file"><br><br>
														    <input type="submit" name="submit" value="Submit">
														</form>
													
															<!-- Social Dialogue Section -->
															<div class="row">
																<div class="large-12 columns">
																	<table>
																		<colgroup>
																		<col span= "10" style="background-color:#FDEEF4">
																			<col style="background-color:#F0FFFF">
																		</colgroup>
																		  <tr>
																			<th>Date</th>
																			<th>File Name</th>
																		  </tr>
																		 <?php
																				include 'extras/connect.php';
																				//check if form has been submitted
																						//set variable
																						    //Print the reulst as a list
																						$result = mysqli_query($mysqli,"SELECT MediaNo, MediaName, MediaURL, UDate from media WHERE Catagory ='photo'");
																						while($row = mysqli_fetch_array($result)){
																							echo"<tr>
																							<td>".$row['UDate']."</td>
																									<td><a href='".$row['MediaURL']."' download>".$row['MediaName']."</a></td>
																									</tr>";
																							}
																						//close database connection
																						$mysqli->close();
																			?>
																	</table>
																</div>
															</div>
													  <a class="close-reveal-modal">&#215;</a>
													</div>
												<!-- REveal Modals Ends -->
										</fieldset>
					
									</div>
									<!-- Reveal Modals begin -->
													<div id="production" class="reveal-modal large" data-reveal>
													  <h2>Production Crew files</h2>
													  <form action="CrewUpload.php?prdNo=procrew" method="post" enctype="multipart/form-data">
														    <input type="file" name="file"><br><br>
														    <input type="submit" name="submit" value="Submit">
														</form>
													
															<!-- Social Dialogue Section -->
															<div class="row">
																<div class="large-12 columns">
																	<table>
																		<colgroup>
																		<col span= "10" style="background-color:#FDEEF4">
																			<col style="background-color:#F0FFFF">
																		</colgroup>
																		  <tr>
																			<th>Date</th>
																			<th>File Name</th>
																		  </tr>
																		  <?php
																				include 'extras/connect.php';
																				//check if form has been submitted
																						//set variable
																						    //Print the reulst as a list
																						$result = mysqli_query($mysqli,"SELECT MediaNo, MediaName, MediaURL, UDate from media WHERE Catagory ='procrew'");
																						while($row = mysqli_fetch_array($result)){
																							echo"<tr>
																							<td>".$row['UDate']."</td>
																									<td><a href='".$row['MediaURL']."' download>".$row['MediaName']."</a></td>
																									</tr>";
																							}
																						//close database connection
																						$mysqli->close();
																			?>
																	</table>
																</div>
															</div>
													  <a class="close-reveal-modal">&#215;</a>
													</div>
												<!-- REveal Modals Ends -->
										</fieldset>
					
									</div>
									<!-- Reveal Modals begin -->
													<div id="editing" class="reveal-modal large" data-reveal>
													  <h2>Editing Crew files</h2>
													  <form action="CrewUpload.php?prdNo=edit" method="post" enctype="multipart/form-data">
														    <input type="file" name="file"><br><br>
														    <input type="submit" name="submit" value="Submit">
														</form>
															<!-- Social Dialogue Section -->
															<div class="row">
																<div class="large-12 columns">
																	<table>
																		<colgroup>
																		<col span= "10" style="background-color:#FDEEF4">
																			<col style="background-color:#F0FFFF">
																		</colgroup>
																		  <tr>
																			<th>Date</th>
																			<th>File Name</th>
																		  </tr>
																		 <?php
																				include 'extras/connect.php';
																				//check if form has been submitted
																						//set variable
																						    //Print the reulst as a list
																						$result = mysqli_query($mysqli,"SELECT MediaNo, MediaName, MediaURL, UDate from media WHERE Catagory ='edit'");
																						while($row = mysqli_fetch_array($result)){
																							echo"<tr>
																							<td>".$row['UDate']."</td>
																									<td><a href='".$row['MediaURL']."' download>".$row['MediaName']."</a></td>
																									</tr>";
																							}
																						//close database connection
																						$mysqli->close();
																			?>
																	</table>
																</div>
															</div>
													  <a class="close-reveal-modal">&#215;</a>
													</div>
												<!-- REveal Modals Ends -->
										</fieldset>
					
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
