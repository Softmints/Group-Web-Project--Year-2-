<?php
    //create the list of convesations of investor that the user is included in
		include 'connect.php';
		$userID = $_COOKIE['userID'];
    $usergroup = $_COOKIE['usergroup'];

    //select the conversations the user is included in by either selecting the investorNo
    //or the staffNo from the database depending on usergroup
    if($usergroup == 'investor'){
      $where = "InvestorNo=$userID";
    }
    else{
      $where = "StaffNo = $userID";
    }

		$query = "SELECT Distinct ConversationNo, Subject, StaffNo, InvestorNo, date FROM InvestorConversations WHERE $where";
		$result = mysqli_query($mysqli, $query);

		$count = 0;
		while($row = $result->fetch_assoc()){
      //Select the name of the other user in the conversation to 
      //be used in displaying who the conversation is with
      if($usergroup == 'investor'){
        $queryName = "SELECT StaffName FROM Staff WHERE StaffNo = " . $row['StaffNo'];        
      }
      else{
        $queryName = "SELECT InvestorFirstName FROM Investor WHERE InvestorNo = " . $row['InvestorNo']; 
      }
      $resultName = mysqli_query($mysqli, $queryName);
      while($rowName = $resultName->fetch_assoc()){
        if($usergroup == 'investor'){
          $name = $rowName['StaffName'];
        }
        else{
          $name = $rowName['InvestorFirstName'];
        }
      }

      //format date
      $date = explode("-", $row['date']);
      $fdate = $date[2] . "/" . $date[1] . "/" . $date[0];

      //echo out the item into a table row, with a form to delete the conversation
			$anchor = "<a href='$#35' data-reveal-id='mailmanageri$count' class='button alert round disabled'>";
      echo "<tr>";
  		echo "<td>$fdate</td>";																	  		
  		echo "<td>$name</td>";
  		echo "<td>$anchor" . $row['Subject'] . "</a></td>";
  		echo "<td> 
  				<form class='custom' name='delete_conversation' action='extras/deleteConversationInvestor.php' method='post'>
  					<input type='hidden' name='conversationID' value=" . $row['ConversationNo'] . " />
  					<input type='submit' class='button alert round disabled' value='delete' />
  				</form>
  		 </td>";
  		echo "</tr>";
  		$count++;
		}
	?>