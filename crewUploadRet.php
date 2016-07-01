<?php
	include 'extras/connect.php';
	
			//retrieve media files that are of the catagory selected
			$result = mysqli_query($mysqli,"SELECT MediaNo, MediaName, MediaURL, UDate from media WHERE Catagory ='$Catagory'");
			while($row = mysqli_fetch_assoc($result)){
				//display them
				echo"<tr>
						<td><a href=".$row['MediaURL'].">".$row['MediaName']."</a></td>
						<td>".$row['UDate']."</td>
						</tr>";
			}
			
			 	
			
		
			//close database connection
			$mysqli->close();
		
?>