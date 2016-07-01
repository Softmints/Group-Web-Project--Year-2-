<?php
	include 'extras/connect.php';
	
			//Print the reulst as a list
			    //Print the reulst as a list
			$result = mysqli_query($mysqli,"SELECT TrailerID, TrailerName, TrailerDescription, TrailerLink from trailers");
			while($row = mysqli_fetch_assoc($result)){
				echo"<tr>
						<td>".$row['TrailerID']."</a></td>
						<td>".$row['TrailerName']."</a></td>
						<td>".$row['TrailerDescription']."</td>
						<td><a href=".$row['TrailerLink'].">".$row['TrailerLink']."</td>
						<td><a href='#' data-reveal-id='trailers' class='button'>Update</a><a href='#' class='button'>Delete</a></td>
						</tr>";
			}
			//close database connection
			$mysqli->close();
		
?>