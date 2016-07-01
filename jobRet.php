<?php
//connect to database
	include 'extras/connect.php';
	//retrieve all available jobs
			$result = mysqli_query($mysqli,"SELECT JobID, JobTitle, JobDescription, ClosingDate from jobs");
			while($row = mysqli_fetch_assoc($result)){
				//print out details for each job
				echo"<tr>
						<td>".$row['JobID']."</a></td>
						<td>".$row['JobTitle']."</a></td>
						<td>".$row['JobDescription']."</td>
						<td>".$row['ClosingDate']."</td>
						<td><a href='publicadmin.php?jobID=".$row['JobID']."&jobTitle=".$row['JobTitle']."&jobDesc=".$row['JobDescription']."&cDate=".$row['ClosingDate']."'data-reveal-id='apply'>Update</a>|<a href='#'>Delete</a></td>
						</tr>";
			}
			//close database connection
			$mysqli->close();
		
?>