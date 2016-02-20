<?php

function check_session($username){

	session_start();

	// belum login, session kosong
	if (!isset($_SESSION['nID'])) {
	    header("Location: login.php");
	    die(); 
	    //This prevents bots and savy users who know how to ignore browser headers from getting into 
	    //the page and causing problems. It also allows the page to stop executing the rest of 
	    //the page and to save resources. 
	    //Its also noteworthy that $_SESSION['nID'] can be swapped out for any other variable 
	    //you are using to store usernames or id's
	}
	else {
		if ($_SESSION['nID'] == $username)
			return true;
		else
			return false;
	}

}
?>