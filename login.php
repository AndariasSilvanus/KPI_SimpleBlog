<?php
	include 'hash.php';

	// Starting Session
	session_start(); 
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

			// Established connection to mySQL database
			$db_hostname = "localhost";
			$db_user = "root";
			$db_pass = "";
			$connection = mysql_connect($db_hostname, $db_user, $db_pass);

			// To protect MySQL injection for Security purpose
			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysql_real_escape_string($username);
			$password = mysql_real_escape_string($password);

			// Add salt and hashing with SHA 256
			$password_hashed = hashSalt($password);

			// Selecting Database
			$db_name = "simple_blog";
			$db = mysql_select_db($db_name, $connection);
			
			// SQL query to fetch information of registerd users and finds user match.
			$query = mysql_query("select * from user where password='$password_hashed' AND username='$username'", $connection);
			$rows = mysql_num_rows($query);
			if ($rows == 1) {
				// Initializing Session
				$_SESSION['login_user']=$username; 

				// Set HTTP Only Cookies
				$name = "cookie_name";
				$value = "";
				$expire = NULL;	//default
				$path = NULL;
				$domain = NULL;
				$secure = TRUE;	// Indicates that the cookie should only be transmitted over a secure HTTPS connection from the client
				$httponly = TRUE;
				setcookie($name, $value, $expire, $path, $domain, $secure, $httponly);

				// Redirecting To Other Page
				header("location: index.php"); 
			}
			else {
				$error = "Username or Password is invalid";
			}
			mysql_close($connection); // Closing Connection
		}
	}
?>