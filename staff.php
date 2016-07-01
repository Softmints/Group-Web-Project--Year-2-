<!doctype html>
<?php
	
	if(!isset($_COOKIE['usergroup']) && $_COOKIE['usergroup'] != "staff"){

		header("location:registeredusers.html");
	}
?>
<html class="no-js" lang="en">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Group 14 | 'Staff'</title>
    <link rel="stylesheet" href="foundation/css/foundation.css" />
    <script src="foundation/js/vendor/modernizr.js"></script>
	
	 <link rel="stylesheet" href="css/investstyles.css" />
  		<style>
		body {
			background-image: url("images/backgroundtwo.jpg");
			background-repeat: no-repeat;
		}
		</style>

  </head>
  
 <body>
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
									<p class="headerfont" style="text-align:center;"><?php echo $_COOKIE['userName']?>, welcome to your portal </p>
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
									<div class="small-6 medium-6 large-6 columns">	
										<fieldset class="bio">
										<div class="row">
										<div class="large-12 medium-12 small-12 columns">
															<h4>Staff directories</h4>
										</div>
												<div class="large-6 medium-6 small-6 columns">
													<p class="p">
														Click here to access your departments files
													</p>
													<a href="stafffiles.php" class="button alert round disabled">Open staff files</a>

												</div>
												<div class="large-6 medium-6 small-6 columns">
													<img src="" height="100" width="100">
												</div>								
											</div>
											
											
									</div>
									<div class="small-6 medium-6 large-6 columns">	

										<fieldset class="bio">
										
											
											
											<div class="large-12 medium-12 small-12 columns">
															<h4>Messenger</h4>
											</div>
												<div class="large-6 medium-6 small-7 columns">
													<p class="p">
														Email another crew member
													</p>
													<a href="#" data-reveal-id="mailmanager"  class="button alert round disabled">Email</a>
												</div>
												<div class="large-6 medium-6 small-5 columns">
													<img src="images/messages.jpg" height="100" width="100">
												</div>								
											</div>
											
											
											<!-- Reveal Modals begin -->
											<div id="mailmanager" class="reveal-modal large" data-reveal>
											<h2>Messenger</h2>
														
												<!-- Social Dialogue Section -->
												<div class="row">
												<h3>Crew</h3>
													<div class="large-3 large-offset-9 columns">
														<a href="#" data-reveal-id="createmessagestaff"  class="button alert round disabled tiny">Create message</a>
													</div>
													<div class="large-12 columns">		
														
														<table>
															<colgroup>
															<col span= "6" style="background-color:#FDEEF4">
																<col style="background-color:#F0FFFF">
															</colgroup>
															  <tr>
																	<th>Date</th>
																	<th>From</th>
																	<th>Subject</th>
																	<th>Delete</th>
															  </tr>
															  <tr>
															  		<?php
															  			include 'extras/getConversationList.php';
																	?>															 
															  </tr>
														</table>


													
													</div>
											  </div>
											  <?php 
											  $query = "SELECT JobTitle FROM Staff WHERE StaffNo=" . $_COOKIE['userID'];
											  
											  $result = mysqli_query($mysqli, $query);
											  while($row = $result->fetch_assoc()){
											 
											  	$title = $row['JobTitle'];
										
											  }
											  if($title == 'Manager'){
												  echo "
												  <div class='row'>
													<h3>Investor</h3>
														<div class='large-3 large-offset-9 columns'>
															<a href='#' data-reveal-id='createmessageinvestor'  class='button alert round disabled tiny'>Create message</a>
														</div>
														<div class='large-12 columns'>		
															
															<table>
																<colgroup>
																<col span= '6' style='background-color:#FDEEF4'>
																	<col style='background-color:#F0FFFF'>
																</colgroup>
																  <tr>
																		<th>Date</th>
																		<th>From</th>
																		<th>Subject</th>
																		<th>Delete</th>
																  </tr>
																  <tr>";
																																
																  			include 'extras/getConversationListInvestor.php';
																															 
																  echo "</tr>
															</table>

															
														
														</div>
												  </div>";
												}
												?>
									  <a class="close-reveal-modal">&#215;</a>
									</div>
								<!-- REveal Modals Ends -->
								<!-- Reveal Modals begin -->
								<div id="mailmanager" class="reveal-modal large" data-reveal>
											 <h2>Message</h2>
											<!-- Social Dialogue Section -->
												<div class="row">
													<div class="large-12 columns">
														<div class="row">
															<div class="large-10 columns">
															<div class="container">
																<div class="chat-box">
																	<div class="row">
																	<div class="large-12 columns ">
																	<div style='height:250px; overflow:auto;'>
																		<div class="message-box left-img">
																		  <div class="message">
																			<span>Bobby Giangeruso</span>
																			<p>Hey Mike, how are you doing?</p>
																		  </div>
																		</div>
																		<div class="message-box right-img">
																		  <div class="message">
																			<p class="rightt" align="right">Mike Moloney</p>
																			<p class="messagep" align="right">Pretty good, Eating nutella, nommommom</p>
																		  </div>
																		</div>
																		<div class="message-box left-img">
																		  <div class="message">
																			<span>Bobby Giangeruso</span>
																			<p>Hey Mike, how are you doing?</p>
																		  </div>
																		</div>
																		<div class="message-box right-img">
																		  <div class="message">
																			<p class="rightt" align="right">Mike Moloney</p>
																			<p class="messagep" align="right">Pretty good, Eating nutella, nommommom</p>
																		  </div>
																		</div>
																	</div>
																	</div>
																	<div class="large-12 columns ">
																		<div class="enter-message">
																			<div class="row">
																				<div class="large-10 columns">			
																					<input type="text" placeholder="Enter your message.."/>
																				</div>
																				<div class="large-2 columns">	
																					<a href="#" class="button">Send</a>
																				</div>
																			</div>
																		</div>
																		</div>
																		</div>
																	</div>
																	</div>
																</div>
															
															</div>
														  </div>
												  <a class="close-reveal-modal">&#215;</a>
												</div>
								</div>

								<!-- REveal Modals Ends -->

								<?php
								include 'extras/createConversationWindows.php';
								?>

								<?php
									include 'extras/createConversationWindowsInvestor.php';
								?>


								<!-- Reveal Modals begin -->
								<div id="createmessagestaff" class="reveal-modal large" data-reveal>
											  <h2>Creating a message</h2>
											<!-- Social Dialogue Section -->
												<div class="row">
													<div class="large-12 columns">
														<form class="custom" name='sendMessageForm' action='extras/newConversation.php' method='post'>
														  <div class="row">
															<div class="large-6 columns">
																<div class="row collapse">
																	  <div class="large-12 small-12 columns">
																			<select name="SelectUser">
																			<?php
																				$user = $_COOKIE['user'];
																				include 'extras/connect.php';
																				$query = "SELECT StaffName, StaffNo FROM Staff WHERE StaffNo != $userID";
																				$result = mysqli_query($mysqli, $query);
																				while($row = $result -> fetch_assoc()){
																					echo "<option value=" . $row['StaffNo'] . ">" . $row['StaffName'] . "</option>";
																				}
																			?>
																		</select>

																	  </div>
																	  <div class="large-12 small-12 columns">
																		<input type="text" name="subject" placeholder="Subject" />
																	  </div>
																</div>
															</div>
															<div class="large-6 columns">
																 <label>Message
																	<textarea name="message"></textarea>
																  </label>
																<input class="button small large-12" type="submit" value="Send Message" />
															</div>
														  </div>
														</form>
													</div>
												  <a class="close-reveal-modal">&#215;</a>
												</div>
								</div>
								<!-- REveal Modals Ends -->

								<div id="createmessageinvestor" class="reveal-modal large" data-reveal>
											  <h2>Creating a message</h2>
											<!-- Social Dialogue Section -->
												<div class="row">
													<div class="large-12 columns">
														<form class="custom" name='sendMessageForm' action='extras/newConversationInvestor.php' method='post'>
														  <div class="row">
															<div class="large-6 columns">
																<div class="row collapse">
																	  <div class="large-12 small-12 columns">
																			<select name="SelectUser">
																			<?php
																				$user = $_COOKIE['user'];
																				include 'extras/connect.php';
																				$query = "SELECT InvestorFirstName, InvestorNo FROM Investor";
																				$result = mysqli_query($mysqli, $query);
																				while($row = $result -> fetch_assoc()){
																					echo "<option value=" . $row['InvestorNo'] . ">" . $row['InvestorFirstName'] . "</option>";
																				}
																			?>
																		</select>

																	  </div>
																	  <div class="large-12 small-12 columns">
																		<input type="text" name="subject" placeholder="Subject" />
																	  </div>
																</div>
															</div>
															<div class="large-6 columns">
																 <label>Message
																	<textarea name="message"></textarea>
																  </label>
																<input class="button small large-12" type="submit" value="Send Message" />
															</div>
														  </div>
														</form>
													</div>
												  <a class="close-reveal-modal">&#215;</a>
												</div>
								</div>
								<!-- REveal Modals Ends -->

								</fieldset>
							</div>
				</div>

				
					
				<div class="row">
										<div class="small-6 medium-6 large-6 columns">	

						<fieldset class="bio">
						
							
							
							<div class="large-12 medium-12 small-12 columns">
												<h4>News Feed</h4>
							</div>
								<div class="large-6 medium-6 small-7 columns">
									<p class="p">
										Your News 
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

    <script type="text/javascript">
        <!--
        function replyStaff(){
            var message = document.forms["replyMessageFormStaff"]["messageText"].value;
        	var flag = true;

        	if(message==null || message==""){
        		alert("Enter a message");
        		flag = false;
        	}
        	else{
        		if(message.length > 140){
        			alert("Message is too long");
        			flag = false;
        		}
        	}
        	return flag;
        }

        /*function replyInvestor(){
            var message = document.forms["replyMessageFormInv"]["messageText"].value;
        	var flag = true;
        	alert(message);
        	if(message==null || message==""){
        		alert("Enter a message");
        		flag = false;
        	}
        	else{
        		if(message.length > 140){
        			alert("Message is too long");
        			flag = false;
        		}
        	}
        	return false;//flag;
        }*/

        function createMessageStaff(){
            var message = document.forms["createMessageStaffForm"]["message"].value;
        	var flag = true;

        	if(message==null || message==""){
        		alert("Enter a message");
        		flag = false;
        	}
        	else{
        		if(message.length > 140){
        			alert("Message is too long");
        			flag = false;
        		}
        	}
        	return flag;
        }

        function createMessageInvestor(){
            var message = document.forms["createMessageInvestorForm"]["message"].value;
            var msglen = message.length;
        	var flag = true;
          	if(message==null || message==""){
        		alert("Enter a message");
        		flag = false;
        	}
        	else{
        		if(message.length > 140){
        			alert("Message is too long");
        			flag = false;
        		}
        	}
        	//return false;
        	return flag;
        }
        //-->
       </script>


	
  </body>
  
</html>
