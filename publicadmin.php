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
		 
		 
						  <div class="large-12 medium-12 small-12 columns">
						  
							<strong>List of jobs</strong>
		 
							<table class="table">

								  <tr>
								  	<th>Job ID</th>
									<th>Job Title</th>
									<th>Description</th>
									<th>Closing Date</th>
									<th>Make Action</th>
									<th><input type = "button" name="add" value = "Add a new job" data-reveal-id="addjob"></th>
								  </tr>
								  <?php 
									  include 'jobRet.php'
									  ?>
							</table>


						  <hr/></div>

						  <!-- Reveal Modals begin -->
									<div id="apply" class="reveal-modal large" data-reveal>
									  <h2>Update Jobs</h2>
											<!-- Social Dialogue Section -->
												<div class="row">
												<div class="large-12 columns">
												
													<table>
														<colgroup>
														<col span= "6" style="background-color:#FDEEF4">
															<col style="background-color:#F0FFFF">
														</colgroup>
														  <tr>
														  
															<th>Job Title</th>
															<th>Description</th>
															<th>Closing Date</th>
															<th>Update</th>
														  </tr>
														  <tr>
														  	<?php 
														  	$JobId = $_GET['jobID'];
														  	//echo $JobId;
														  	?>
															<td><input type="text" placeholder="Enter job title" /></td>
														   <td><input type="text" placeholder="Enter job description"</td>
														   <td><a href="#">Update</a>
														  </tr>
														  
													</table>
												
												</div>
											  </div>
									  <a class="close-reveal-modal">&#215;</a>
									</div>





						  <div class="large-12 medium-12 small-12 columns">
						  
							<strong>News Feed</strong>
		 
							<table class="table">

								  <tr>
									<th>Title</th>
									<th>Content</th>
									<th>Catagory</th>
									<th>Make Action</th>
									<th><input type = "button" name="add" value = "Add news" data-reveal-id="addnews"></th>

								  </tr>
							
								  <?php
									include 'extras/adminGetNews.php';
								  ?>
							</table>

						  <hr/></div>
						  <div class="large-12 medium-12 small-12 columns">


						  <!-- Reveal Modals begin -->
									<div id="news" class="reveal-modal large" data-reveal>
									  <h2>Update News Feed</h2>
											<!-- Social Dialogue Section -->
												<div class="row">
												<div class="large-12 columns">
												
													<table>
														<colgroup>
														<col span= "6" style="background-color:#FDEEF4">
															<col style="background-color:#F0FFFF">
														</colgroup>
														  <tr>
															<th>Title</th>
															<th>News</th>
															<th>Update</th>
														  </tr>
														  <tr>
															<td><input type="text" placeholder="Enter news title" /></td>
														   <td><input type="text" placeholder="Enter your news"</td>
														   <td><a href="#">Update</a>

														  </tr>
													</table>
												
												</div>
											  </div>

									  <a class="close-reveal-modal">&#215;</a>
									</div>

									<?php
										include 'extras/adminGetNewsList.php';
									?>

										<!-- Reveal Modals begin -->
									<div id="addnews" class="reveal-modal large" data-reveal>
									  <h2>Add News</h2>
											<!-- Social Dialogue Section -->
												<div class="row">
												<div class="large-12 columns">
												
													
													<form name='addNews' action='extras/addNews.php' method='post' enctype='multipart/form-data'>
														Title:<input name='title' type='text'>
														Catagory:<select name='catagory'>
																	<?php
																		include 'extras/connect.php';
																		$query = "SELECT NewsfeedCatagoryNo, Catagory FROM NewsfeedCatagory";
																		$result = mysqli_query($mysqli, $query);
																		while($row = $result->fetch_assoc()){
																			echo "<option value=" . $row['NewsfeedCatagoryNo'] . ">" . $row['Catagory'] . "</option>";
																		}
																	?>
																</select><br>
														Content:<textarea rows='4' cols='25' name='Content'></textarea>
														Picture: <input name='picture' type='file' id='file' /><br>
														<input class='button' type='submit' value='Add'>
													</form>
												
												</div>
											  </div>
									  <a class="close-reveal-modal">&#215;</a>
									</div>


	<!-- Reveal Modals begin -->
									<div id="addjob" class="reveal-modal large" data-reveal>
									  <h2>Add a new job</h2>
											<!-- Social Dialogue Section -->
												<div class="row">
												<div class="large-12 columns">
												
													<table>
														<colgroup>
														<col span= "6" style="background-color:#FDEEF4">
															<col style="background-color:#F0FFFF">
														</colgroup>
														  <tr>
																<form action="jobUpload.php" method="post">
														  		Job Name<br>
																<input type="text" name="JobTitle" placeholder="Enter job title here">
																Job Description<br>
																<input type="text" name="JobDesc" placeholder="Enter job description here">
																Closing Date (YYYY-MM-DD)<br>
																<input type="text" name="ClosingDate" placeholder="Enter closing date here">
																<input type="submit" name="submit" value="Submit">
																</form>
														  </tr>
														  </tr>
													</table>
												
												</div>
											  </div>
									  <a class="close-reveal-modal">&#215;</a>
									</div>

							<strong>List of Trailers</strong>
		 
							<table class="table">

								  <tr>
								  	<th>Movie ID</th>
									<th>Movie Name</th>
									<th>Description</th>
									<th>Link (Youtube)</th>
									<th>Make Action</th>
									<th><input type = "button" name="add" value = "Add new trailers" data-reveal-id="addtrailers"></th>

								  </tr>
								  <?php
								  include 'trailerRet.php';
								  ?>
							</table>

						  	  <!-- Reveal Modals begin -->
									<div id="trailers" class="reveal-modal large" data-reveal>
									  <h2>Update Trailers</h2>
											<!-- Social Dialogue Section -->
												<div class="row">
												<div class="large-12 columns">
												
													<table>
														<colgroup>
														<col span= "6" style="background-color:#FDEEF4">
															<col style="background-color:#F0FFFF">
														</colgroup>
														  <tr>
															<th>Trailer name</th>
															<th>Description</th>
															<th>Trailer link</th>
															<th>Update</th>
														  </tr>
														  <tr>
															<td><input id = "#txttrailername" type="text" placeholder="Enter trailer name here" /></td>
														   <td><input id = "#txttrailerdesc" type="text" placeholder="Enter description for trailer here"></td>
														   <td><input id = "#txttrailerlink" type="text" placeholder="Enter link here"></td>
														   <td><input type="button" class= "btnUpdatePublic"  value="Update" >

														  </tr>
													</table>
												
												</div>
											  </div>
									  <a class="close-reveal-modal">&#215;</a>
									</div>

										<!-- Reveal Modals begin -->
									<div id="addtrailers" class="reveal-modal large" data-reveal>
									  <h2>Add a Trailer</h2>
											<!-- Social Dialogue Section -->
												<div class="row">
												<div class="large-12 columns">
												
													<table>
														<colgroup>
														<col span= "6" style="background-color:#FDEEF4">
															<col style="background-color:#F0FFFF">
														</colgroup>
														  <tr>
															<th>Movie Name</th>
															<th>Description</th>
															<th>Link</th>
															<th>Add a Trailer</th>
														  </tr>
														  <tr>
														  	<form action="trailerUpload.php" method="post">
														  		Movie Name<br>
																<input type="text" name="MovieName" placeholder="Enter movie name here">
																Movie Description<br>
																<input type="text" name="MovieDesc" placeholder="Enter movie description here">
																Movie Link<br>
																<input type="text" name="MovieLink" placeholder="Enter link here">
																<input type="submit" name="submit" value="Submit">
																</form>
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
      </div>
    


    <script src="foundation/js/vendor/jquery.js"></script>
    <script src="foundation/js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
	
  </body>
  
</html>
