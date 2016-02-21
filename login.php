<?php
	include 'hash.php';

	session_start(); // Starting Session
	$error=''; // Variable To Store Error Message

	if (isset($_POST['submit'])) {
		if (empty($_POST['username']) || empty($_POST['password'])) {
			$error = "Username or Password is invalid";
		}
		// Define $username and $password
		else {
			// Receive username and password
			$username=$_POST['username'];
			$password=$_POST['password'];

			// Add salt and hashing with SHA 256
			$password_hashed = hashSalt($password);

			// Established connection to mySQL database
			$db_hostname = "localhost";
			$db_user = "root";
			$db_pass = "";
			$connection = mysql_connect($hostname, $db_user, $db_pass);

			// To protect MySQL injection for Security purpose
			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysql_real_escape_string($username);
			$password = mysql_real_escape_string($password);

			// Selecting Database
			$db_name = "simple_blog";
			$db = mysql_select_db($db_name, $connection);
			
			// SQL query to fetch information of registerd users and finds user match.
			$query = mysql_query("select * from user where password='$password_hashed' AND username='$username'", $connection);
			$rows = mysql_num_rows($query);
			if ($rows == 1) {
				$_SESSION['login_user']=$username; // Initializing Session
				header("location: index.php"); // Redirecting To Other Page
			}
			else {
				$error = "Username or Password is invalid";
			}
			mysql_close($connection); // Closing Connection
		}
	}
?>