<?php
    //create the list of convesations of staff that the user is included in
		include 'connect.php';
		$userID = $_COOKIE['userID'];
	 
    //Select all conversations from the database where the user is in
		$query = "SELECT Distinct ConversationNo, Subject, SenderNo, ReceiverNo, date FROM Conversations WHERE (ReceiverNo=$userID OR SenderNo=$userID)";
		$result = mysqli_query($mysqli, $query);

		$count = 0;
		while($row = $result->fetch_assoc()){
      //Select the name of the other user in the conversation 
      //to be used in displaying who the conversation is with
			if($row['SenderNo'] == $userID){
  			$queryName = "SELECT StaffName FROM Staff WHERE StaffNo = " . $row['ReceiverNo'];
  		}else{
  			$queryName = "SELECT StaffName FROM Staff WHERE StaffNo = " . $row['SenderNo'];
  		}
			$resultName = mysqli_query($mysqli, $queryName);
			while($rowName = $resultName->fetch_assoc()){
				$name = $rowName['StaffName'];
			}

      //formate date
      $date = explode("-", $row['date']);
      $fdate = $date[2] . "/" . $date[1] . "/" . $date[0];

      //echo out the item into a table row, with a form to delete the conversation
			$anchor = "<a href='$#35' data-reveal-id='mailmanager$count' class='button alert round disabled'>";
  		echo "<tr>";
  		echo "<td>" . $fdate . "</td>";																	  		
  		echo "<td>$name</td>";
  		echo "<td>$anchor" . $row['Subject'] . "</a></td>";
  		echo "<td> 
  				<form class='custom' name='delete_conversation' action='extras/deleteConversation.php' method='post'>
  					<input type='hidden' name='conversationID' value=" . $row['ConversationNo'] . " />
  					<input type='submit' class='button alert round disabled' value='delete' />
  				</form>
  		 </td>";
  		echo "</tr>";
  		$count++;
		}
	?>