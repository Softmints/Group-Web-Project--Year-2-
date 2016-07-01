<?php
	//Create the conversation reveal modals for each conversation with an investor
	include 'connect.php';
	$userID = $_COOKIE['userID'];
	$usergroup = $_COOKIE['usergroup'];

	if($usergroup == 'investor'){
      $where = "InvestorNo=$userID";
    }
    else{
      $where = "StaffNo = $userID";
    }

    //select the conversations where the user is a reciepent in
	$query = "SELECT Distinct ConversationNo, Subject, StaffNo, InvestorNo FROM InvestorConversations WHERE $where";
	$result = mysqli_query($mysqli, $query);

	$count=0;
	while($row = $result->fetch_assoc()){
		//Select the staff and investor name from the database using their IDs
		$queryStaffName = "SELECT StaffName FROM Staff WHERE StaffNo = " . $row['StaffNo'];
		$queryInvestorName = "SELECT InvestorFirstName FROM Investor WHERE InvestorNo = " . $row['InvestorNo'];

		//Staff name
		$resultStaffName = mysqli_query($mysqli, $queryStaffName);
		while($rowName = $resultStaffName->fetch_assoc()){
			$StaffNo = $row['StaffNo'];
			$StaffName = $rowName['StaffName'];
		}
		//InvestorName
		$queryInvestorName = mysqli_query($mysqli, $queryInvestorName);
		while($rowName = $queryInvestorName->fetch_assoc()){
			$InvestorNo = $row['InvestorNo'];
			$InvestorName = $rowName['InvestorFirstName'];
		}

		//depending on user group (staff/investor) assign the sender (rightname) and reciever(leftname)
		if($usergroup == 'investor'){
			$rightName = $InvestorName;
			$leftName = $StaffName;
		}else{
			$rightName = $StaffName;
			$leftName = $InvestorName;
		}

		//echo out the start of the reveal modal
		echo "<div id='mailmanageri$count' class='reveal-modal large' data-reveal>";
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
		$query2 = "SELECT StaffNo, InvestorNo, ConversationNo, MessageText, Sender FROM InvestorMessages WHERE ConversationNo=" . $row['ConversationNo'];
		$result2 = mysqli_query($mysqli, $query2);
		while($row2 = $result2->fetch_assoc()){

			//check who the sender is by comparing to the usergroup
			//echo corresponding names and messages to either left or right hand side
			if($row2['Sender'] == $usergroup){
				echo "<div class='message-box right-img'>
				  <div class='message'>
					<p class='rightt' align='right'>" . $rightName . "</p>
					<p class='messagep' align='right'>" . $row2['MessageText']  . "</p>
				  </div>
			    </div>";
			}
			else{
				echo "<div class='message-box left-img'>
						<div class='message'>
							<span>" . $leftName . "</span>
							<p>" . $row2['MessageText'] . "</p>
						  </div>
						</div>";
			}
		}
		//echo the rest of the reveal modal, with a form with a message box to reply
		echo "</div>
					</div>
						<div class='large-12 columns '>
							<form class='enter-message' name='replyMessageForm' action='extras/sendMessageInvestor.php' method='post'>
							<input type='hidden' name='ConversationNo' value=" . $row['ConversationNo'] . " />";
							"<input type='hidden' name='Sender' value=" . $usergroup . " />";
							echo "<input type='hidden' name='InvestorNo' value=" . $row['InvestorNo'] . " />";
							echo "<input type='hidden' name='StaffNo' value=" . $row['InvestorNo'] . " />";


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