<?php
	//check if form has been submitted
include 'extras/connect.php';
	
	//retrieve staff media files from database
			$result = mysqli_query($mysqli,"SELECT MediaName, MediaURL, UDate from media where Catagory = '$Catagory' and ProductionNo = '$prdNo'");
			while($row = mysqli_fetch_assoc($result)){
				//display them for account admin
				echo "<tr>
				<td>".$row['MediaName']."</td>
				<td>".$row['MediaURL']."</td>
				<td>".$row['UDate']."</td>
				<td><a href='projectview.html'>View Info</a></td>
			 </tr>";
				}
				$mysqli->close();
?>