<?php
//connect to database
	include 'extras/connect.php';
	//retrieve all available jobs
			$result = mysqli_query($mysqli,"SELECT ReportNo, ProductionNo, ReportName, ReportURL, UDate  from investorreports");
			while($row = mysqli_fetch_assoc($result)){
				//print out details for each job
				echo"<tr>
						<td>".$row['ReportNo']."</a></td>
						<td>".$row['ProductionNo']."</a></td>
						<td><a href='".$row['ReportURL']."' download>".$row['ReportName']."</td>
						<td>".$row['UDate']."</td>
						</tr>";
			}
			//close database connection
			$mysqli->close();
		
?>