<?php
	//Create the conversation reveal modals for each conversation between two staff members
	include 'connect.php';
	$userID = $_COOKIE['userID'];

	//select the conversations where the user is a reciepent in
	$query = "SELECT Distinct ConversationNo, Subject, SenderNo, ReceiverNo FROM Conversations WHERE (ReceiverNo=$userID OR SenderNo=$userID)";
	$result = mysqli_query($mysqli, $query);

	$count=0;
	while($row = $result->fetch_assoc()){
		//Select the names of the two stff members from the 
		$queryName = "SELECT StaffName FROM Staff WHERE StaffNo = " . $row['SenderNo'];
		$resultName = mysqli_query($mysqli, $queryName);
		while($rowName = $resultName->fetch_assoc()){
			$ID1 = $row['SenderNo'];
			$name1 = $rowName['StaffName'];
		}

		$queryName = "SELECT StaffName FROM Staff WHERE StaffNo = " . $row['ReceiverNo'];
		$resultName = mysqli_query($mysqli, $queryName);
		while($rowName = $resultName->fetch_assoc()){
			$ID2 = $row['ReceiverNo'];
			$name2 = $rowName['StaffName'];
		}
		//assign the names into an array with their ID as the key
		$names = array("$ID1"=>$name1, "$ID2"=>$name2);

		//echo out the start of the reveal modal
		echo "<div id='mailmanager$count' class='reveal-modal large' data-reveal>";
		echo " <h2>Message</h2>
					<!-- Social Dialogue Section -->
					<div class='row'>
						<div class='large-12 columns'>
							<div class='row'>
								<div class='large-10 columns'>
								<div class='container'>
									<div class='chat-box'>
										<div class='row'>
										<div class='large-12 columns'>
										<div style='height:250px; overflow:auto;'>";
		
		//Select the messages for the corresponding ConversationNo
		$query2 = "SELECT SenderNo, ReceiverNo, ConversationNo, MessageText FROM Messages WHERE ConversationNo=" . $row['ConversationNo'];
		$result2 = mysqli_query($mysqli, $query2);
		while($row2 = $result2->fetch_assoc()){
			//if the SenderNo for the message equals the userID, display the message on the right
			if($row2['SenderNo'] == $userID){
				echo "<div class='message-box right-img'>
				  <div class='message'>
					<p class='rightt' align='right'>" . $names[$row2['SenderNo']] . "</p>" . //get the name of the sender from the array
					."<p class='messagep' align='right'>" . $row2['MessageText']  . "</p>
				  </div>
			    </div>";
			}
			//esle display it on the left
			else{
				echo "<div class='message-box left-img'>
						<div class='message'>
							<span>" . $names[$row2['SenderNo']] . "</span>" . //get the name of the sender from the array
							. "<p>" . $row2['MessageText'] . "</p>
						  </div>
						</div>";
			}
		}
		//echo the rest of the reveal modal, with a form with a message box to reply
		echo "</div>
					</div>
						<div class='large-12 columns '>
							<form class='enter-message' name='replyMessageFormStaff' action='extras/sendMessage.php' onsubmit='return replyStaff()'  method='post'>
							<input type='hidden' name='ConversationNo' value=" . $row['ConversationNo'] . " />";
							//assign the correct recieverno to the form
							if($row['SenderNo']==$userID){
								echo "<input type='hidden' name='ReceiverNo' value=" . $row['ReceiverNo'] . " />";
							}
							else{
								echo "<input type='hidden' name='ReceiverNo' value=" . $row['SenderNo'] . " />";
							}

							echo "<div class='enter-message'>
								<div class='row'>
									<div class='large-10 columns'>			
										<input type='text' name='messageText' placeholder='Enter your message..'/>
									</div>
									<div class='large-2 columns'>
										<input class='button' type='submit' value='send' />
										
									</div>
								</div>
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			</div>
								
			</div>
			</div>
				<a class='close-reveal-modal'>&#215;</a>
			</div>
		</div>";
		unset($names);
		$count++;
	}
?>