<?php

/*
	The lines below assign both cookies to variables and then removes them
	by adjusting the time of the cookies to be an hour into the past.
	Information found on stackoverflow and the php manual
*/
	
	if(isset($_COOKIE["usergroup"])){
	    setcookie('usergroup', '', time()-3600, '/');
	}

	if(isset($_COOKIE["userName"])){
		setcookie('userName', '', time()-3600, '/');
	}

	if(isset($_COOKIE["userID"])){
		setcookie('userID', '', time()-3600, '/');
	}
	header("location:registeredusers.html");
?>
