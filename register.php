<?php
	include 'hash.php';

	session_start(); // Starting Session
	$error=''; // Variable To Store Error Message

	if (isset($_POST['submit'])) {
		if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
			$error = "Field cannot empty";
		}
		// Define $username and $password
		else {
			// Receive username and password
			$username = $_POST['username'];
			$password = $_POST['password'];
			$email = $_POST['email'];

			// Established connection to mySQL database
			$db_hostname = "localhost";
			$db_user = "root";
			$db_pass = "";
			$connection = mysql_connect($db_hostname, $db_user, $db_pass);

			// To protect MySQL injection for Security purpose
			$username = stripslashes($username);
			$password = stripslashes($password);
			$email = stripslashes($email);
			$username = mysql_real_escape_string($username);
			$password = mysql_real_escape_string($password);
			$email = mysql_real_escape_string($email);

			// Add salt and hashing with SHA 256
			$password_hashed = hashSalt($password);

			echo 'user: '.$username.', pass: '.$password.', email: '.$email.', pass hashed: '.$password_hashed;

			// Selecting Database
			$db_name = "simple_blog";
			$db = mysql_select_db($db_name, $connection);
			
			// SQL query to fetch information of registerd users and finds user match.
			$query = mysql_query("select * from user where username='$username'", $connection);
			$rows = mysql_num_rows($query);
			if ($rows >= 1) {
				//$_SESSION['login_user']=$username; // Initializing Session
				//header("location: index.php"); // Redirecting To Other Page
				$error = "Username already exist";
			}
			else {
				$query_insert = mysql_query("insert into user (username, password, email) VALUES ('$username', '$password_hashed', '$email')", $connection);
				if (!$query_insert)
					die('Invalid query: ' . mysql_error());
				else
					echo '<br><h3>Register success!</h3>';
			}
			mysql_close($connection); // Closing Connection
		}
	}
?>