<?php
	include('login.php'); // Includes Login Script

	// If session is set, redirect to index.php
	if(isset($_SESSION["username"])){
		//header("location: index.php");
		echo "<h2>username ter set:".$_SESSION["username"]."</h2>";
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="main">
			<h1>Login</h1>
			<div id="login">
				<h2>Login Form</h2>
				<form action="" method="post">
					<label>UserName :</label>
					<input id="name" name="username" placeholder="username" type="text">

					<label>Password :</label>
					<input id="password" name="password" placeholder="**********" type="password">

					<input name="submit" type="submit" value="Login">
					<span><?php echo $error; ?></span>
				</form>
			</div>
		</div>
	</body>
</html>