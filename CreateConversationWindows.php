<?php
	include 'connect.php';
	$userID = $_COOKIE['userID'];

	$query = "SELECT Distinct ConversationNo, Subject, SenderNo, ReceiverNo FROM Conversations WHERE (ReceiverNo=$userID OR SenderNo=$userID)";
	$result = mysqli_query($mysqli, $query);

	$count=0;
	while($row = $result->fetch_assoc()){
		$queryName = "SELECT StaffName FROM Staff WHERE StaffNo = " . $row['SenderNo'];
		$resultName = mysqli_query($mysqli, $queryName);
		while($rowName = $resultName->fetch_assoc()){
			$ID1 = $row['SenderNo'];
			$name1 = $rowName['StaffName'];
		}

		$queryName = "SELECT StaffName FROM Staff WHERE StaffNo = " . $row['ReceiverNo'];
		$resultName = mysqli_query($mysqli, $queryName);
		while($rowName = $resultName->fetch_assoc()){
			//$name[$row['ReceiverNo']] = $rowName['StaffName'];
			//echo $name[$row['ReceiverNo']];
			$ID2 = $row['ReceiverNo'];
			$name2 = $rowName['StaffName'];
		}

		$names = array("$ID1"=>$name1, "$ID2"=>$name2);

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
		$query2 = "SELECT SenderNo, ReceiverNo, ConversationNo, MessageText FROM Messages WHERE ConversationNo=" . $row['ConversationNo'];
		$result2 = mysqli_query($mysqli, $query2);
		while($row2 = $result2->fetch_assoc()){
			if($row2['SenderNo'] == $userID){
				echo "<div class='message-box right-img'>
				  <div class='message'>
					<p class='rightt' align='right'>" . $names[$row2['SenderNo']] . "</p>
					<p class='messagep' align='right'>" . $row2['MessageText']  . " s=uID</p>
				  </div>
			    </div>";
			}
			else{
				echo "<div class='message-box left-img'>
						<div class='message'>
							<span>" . $names[$row2['SenderNo']] . "</span>
							<p>" . $row2['MessageText'] . " r=uID</p>
						  </div>
						</div>";
			}
		}
		echo "</div>
					</div>
						<div class='large-12 columns '>
							<div class='enter-message'>
								<div class='row'>
									<div class='large-10 columns'>			
										<input type='text' placeholder='Enter your message..'/>
									</div>
									<div class='large-2 columns'>	
										<a href='#' class='button'>Send</a>
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
				<a class='close-reveal-modal'>&#215;</a>
			</div>
		</div>";
	}
?>