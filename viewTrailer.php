<?php
	include 'extras/connect.php';
	
			//Print the reulst as a list
			    //Print the reulst as a list
			$result = mysqli_query($mysqli,"SELECT TrailerName, TrailerDescription, TrailerLink from trailers");
			while($row = mysqli_fetch_assoc($result)){
				echo "<div class='large-6 columns'>
					  <label>".$row['TrailerName']."
						<div class='flex-video'>
							<iframe width='140' height='35' src='".$row['TrailerLink']."' frameborder='0' allowfullscreen></iframe>
						</div>
						<p class='fontsize'> ".$row['TrailerDescription']." </p>
					  </label>
					</div>";
			}
			//close database connection
			$mysqli->close();
		
?>