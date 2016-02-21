<?php
	include('register.php'); // Includes Login Script

	// If session is set, redirect to index.php
	if(isset($_SESSION['login_user'])){
		header("location: index.php");
	}

	// TODO!!!!
	// Pakein regex ke emailnya buat cek itu email valid ato engga
	// Password masukin 2x ?
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Register</title>
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="main">
			<h1>Register</h1>
			<div id="register">
				<h2>Register Form</h2>
				<form action="" method="post">
					<label>UserName :</label>
					<input id="name" name="username" placeholder="username" type="text">

					<label>Email :</label>
					<input id="email" name="email" placeholder="your@email.com" type="text">

					<label>Password :</label>
					<input id="password" name="password" placeholder="**********" type="password">

					<input name="submit" type="submit" value="Register">
					<span><?php echo $error; ?></span>
				</form>
			</div>
		</div>
	</body>
</html>