<?php

// Clear session
session_start();
session_unset(); // remove all session variables
session_destroy(); // destroy the session

// Clear cookie
if ((isset($_COOKIE["remember_me"])) || ((isset($_COOKIE["username"])))) {
	unset($_COOKIE["username"]);
	unset($_COOKIE["remember_me"]);
	setcookie("username", null, time()-3600, NULL, NULL, TRUE, TRUE);
	setcookie("remember_me", null, time()-3600, NULL, NULL, TRUE, TRUE);
}

// Redirecting To Other Page
header("location: index.php"); 

?>