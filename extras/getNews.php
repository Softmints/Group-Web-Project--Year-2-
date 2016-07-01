<?php
	//gets the newsfeed items from the database for the interests the user has selected
	include 'connect.php';

	$userID= $_COOKIE['userID'];
	$usergroup = $_COOKIE['usergroup'];

	//query correct database depending on usergroup
	if($usergroup == 'public'){		
		$query = "SELECT NewsfeedInterests FROM Public WHERE PublicNo = $userID";
	}elseif ($usergroup == 'investor') {
		
		$query = "SELECT NewsfeedInterests FROM Investor WHERE InvestorNo = $userID";
	} 
	else{
		;
		$query = "SELECT NewsfeedInterests FROM Staff WHERE StaffNo = $userID";
	}
	$result = mysqli_query($mysqli, $query);

	//retrive the interests of the user and put into an array
	while($row = $result->fetch_assoc()){
		$interests = explode(" ", $row['NewsfeedInterests']); #split each interest into a node of an array
		//echo $interests[1];
	}

	$query = "SELECT Title, Content, pictureLocation FROM Newsfeed WHERE CatagoryNo = $interests[0]";
	if(count($interests) >= 2){ #if user has more than one interest
		for($x = 0; $x < count($interests); $x++){
		$query .= " OR CatagoryNo = $interests[$x]"; #append to the query
		}
	}
	$result = mysqli_query($mysqli, $query);

	//echo items to the browser
	while($row = mysqli_fetch_assoc($result)){
		$title = $row['Title'];
		$content = $row['Content'];
		$photo = $row['pictureLocation'];
		echo "<tr><td><img src='$photo' height='60' width='60'></td>";
		echo "<td><b>$title</b><ul><li>$content</li></ul></td></tr>";
	}
?>