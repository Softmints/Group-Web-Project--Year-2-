<?php
//connect to database
	include 'extras/connect.php';
	//retrieve all available jobs
			$result = mysqli_query($mysqli,"SELECT ProductionNo, ProductionName, ProDescription, StartDate from production where Complete = 'N' or Complete='n'");
			while($row = mysqli_fetch_assoc($result)){
				//print out details for each job
				echo"<tr>
						<td>".$row['ProductionNo']."</a></td>
						<td>".$row['ProductionName']."</a></td>
						<td>".$row['ProDescription']."</td>
						<td>".$row['StartDate']."</td>
						</tr>";
			}
			//close database connection
			$mysqli->close();
		
?>