<?php
	//creates a list of all items in the newsfeed for the admin to be able to edit/delete

	include 'connect.php';

	//select items from newsfeed
	$query = "SELECT nf.NewsfeedNo, nf.Title, nf.Content, nfc.Catagory FROM Newsfeed nf, NewsfeedCatagory nfc WHERE nf.CatagoryNo=nfc.NewsfeedCatagoryNo";	
	$result = mysqli_query($mysqli, $query);

	//create html form and echo it to the browser for each newsfeed item
	$count = 0;
	while($row = $result->fetch_assoc()){
		echo "<form name='deletenews' action='extras/deleteNews.php' method='post'>
				<tr>";
		echo "<td>" . $row['Title'] . "</td>";
		echo "<td>" . $row['Content'] . "</td>";
		echo "<td>" . $row['Catagory'] . "</td>";
		echo "<td><a href='$#35' class='button' data-reveal-id='news$count'>Update</a>
							<input type='hidden' name='NewsfeedNo' value =" . $row['NewsfeedNo'] . " />
				<input type='submit' class='button' value='Delete' />
				</td>";
			echo "</tr></form>";
		$count++;
	}
?>