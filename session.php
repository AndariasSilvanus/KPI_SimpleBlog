<?php

function establishCon(){
	// Established connection to mySQL database
	$db_hostname = "localhost";
	$db_user = "root";
	$db_pass = "";
	$connection = mysql_connect($db_hostname, $db_user, $db_pass);
	return $connection;
}

function check_cookie(){
	if (isset($_COOKIE["username"]) && (isset($_COOKIE["remember_me"]))) {
		$username = $_COOKIE["username"];
		$cookie = $_COOKIE["remember_me"];
		// echo "<b>USERNAME: </b>".$username."<br>";
		// echo "<b>TOKEN: </b>".$cookie."<br>";
		$connection = establishCon();
		$query = mysql_query("SELECT * FROM user WHERE username='$username' AND token='$cookie'", $connection);
		$rows = mysql_num_rows($query);
		if ($rows == 1) {
			return TRUE;
		}
		else
			return FALSE;
	}
	else
		return FALSE;
}

function generate_session(){
	if (isset($_COOKIE["username"])) {
		$username = $_COOKIE["username"];
		$token = $_COOKIE["remember_me"];
		$connection = establishCon();
		$query = mysql_query("SELECT * FROM user WHERE username='$username' AND token='$token'", $connection);
		$rows = mysql_num_rows($query);
		if ($rows == 1) {
			// Initializing Session
			$row = mysql_fetch_assoc($query);
			$_SESSION["username"]=$username;
			$user_id = $row["id"];
			$_SESSION["user_id"]=$user_id;
			$_SESSION["email"]=$row["email"];

			// update cookie
			$name = "remember_me";
			$time_now = time();
			$date_now = date('Y-m-d');
			$microtime = microtime();
			$host = gethostname();
			$value = $username.$host.$time_now.$date_now.$microtime;
			$value = hash('sha256', $value);
			$expire = time()+3600*24*365*10;	//default
			$path = NULL;
			$domain = NULL;
			$secure = TRUE;	// Indicates that the cookie should only be transmitted over a secure HTTPS connection from the client
			$httponly = TRUE;

			// Store Cookies to database
			$query_update = mysql_query("UPDATE user SET token ='$value' WHERE id=$user_id", $connection);
			if ($query_update) {
				setcookie($name, $value, $expire, $path, $domain, $secure, $httponly);
				return TRUE;
			}
			else
				return FALSE;
		}
		return TRUE;
	}
	else
		return FALSE;
}

function checkToGenerateSession() {
	if (check_cookie()) {
    	session_start();
		if (generate_session())
		  	$isLogin = isset($_SESSION["username"]);
		else
		  	$isLogin = FALSE;
	}
	else
    	$isLogin = FALSE;
    return $isLogin;
}

?>