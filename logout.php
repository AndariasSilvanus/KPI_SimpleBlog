<?php

session_start();
session_unset(); // remove all session variables
session_destroy(); // destroy the session
// Redirecting To Other Page
header("location: index.php"); 

?>