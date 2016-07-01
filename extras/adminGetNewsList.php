<?php
	//Creates the reveal window for the admin to be able to edit a newsfeed item

	include 'connect.php';

	//Select all news feed items from database
	$query = "SELECT nf.NewsfeedNo, nf.CatagoryNo, nf.Title, nf.Content, nfc.Catagory FROM Newsfeed nf, NewsfeedCatagory nfc WHERE nf.CatagoryNo=nfc.NewsfeedCatagoryNo";
	$result = mysqli_query($mysqli, $query);

	//for each news feed item create the reveal modal and echo it to the browser
	$count = 0;
	while($row = $result->fetch_assoc()){
		echo "
		<div id='news$count' class='reveal-modal large' data-reveal>
		<h2>Update News Feed</h2>
		<!-- Social Dialogue Section -->
		<div class='row'>
			<div class='large-12 columns'>
				<table>
					<colgroup>
						<col span= '6' style='background-color:#FDEEF4'>
						<col style='background-color:#F0FFFF'>
					</colgroup>
					<tr>
						<th>Title</th>
						<th>Content</th>
						<th>Catagory</th>
						<th>Update</th
					</tr>
					<tr>
						<form name='edit_news$count' action='extras/updateNews.php' method='post'>
							<input type='hidden' name='NewsfeedNo' value=" . $row['NewsfeedNo'] . " />
							<td><input type='text' name='title' value='" . $row['Title'] .  "' /></td>
							<td><textarea name='Content'>" . $row['Content'] . "</textarea></td>
							<td>
								<select name='selectCatagory'>
									<option value=" . $row['CatagoryNo'] . ">" . $row['Catagory'] . "</option>";

									//select the other catagories from the database that a newsfeed item may have and eacho it to screen as an option
									$query2 = "SELECT NewsfeedCatagoryNo, Catagory FROM NewsfeedCatagory WHERE NewsfeedCatagoryNo !=" . $row['CatagoryNo'];
									$result2 = mysqli_query($mysqli, $query2);
				
									while($row2 = $result2->fetch_assoc()){
										echo "<option value=" . $row2['NewsfeedCatagoryNo'] . ">" . $row2['Catagory'] . "</option>";
									}
									

								echo "</select>
							</td>";

					echo "<td><input class='button' type='submit' value='Update' /></td>
						</form>
					</tr>
				</table>
			</div>
		</div>
		<a class='close-reveal-modal'>&#215;</a>
	</div>";
	$count++;
	}
?>