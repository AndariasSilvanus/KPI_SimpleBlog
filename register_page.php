<?php
	include('register.php'); // Includes Login Script
	include('session.php');
	include('connectDB.php');

	// If session is set, redirect to index.php
	$isLogin = checkToGenerateSession();
	// If session is set, redirect to index.php
	if ($isLogin)
		header("location: index.php");

	// TODO!!!!
	// Pakein regex ke emailnya buat cek itu email valid ato engga
	// Password masukin 2x ?
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="description" content="Deskripsi Blog">
		<meta name="author" content="Judul Blog">

		<!-- Twitter Card -->
		<meta name="twitter:card" content="summary">
		<meta name="twitter:site" content="omfgitsasalmon">
		<meta name="twitter:title" content="Simple Blog">
		<meta name="twitter:description" content="Deskripsi Blog">
		<meta name="twitter:creator" content="Simple Blog">
		<meta name="twitter:image:src" content="{{! TODO: ADD GRAVATAR URL HERE }}">

		<meta property="og:type" content="article">
		<meta property="og:title" content="Simple Blog">
		<meta property="og:description" content="Deskripsi Blog">
		<meta property="og:image" content="{{! TODO: ADD GRAVATAR URL HERE }}">
		<meta property="og:site_name" content="Simple Blog">

		<link rel="stylesheet" type="text/css" href="assets/css/screen.css" />
		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

		<!--[if lt IE 9]>
		    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<title>Simple Blog</title>
	</head>
	<body>
		<div class="wrapper">
		<nav class="nav">
		    <a style="border:none;" id="logo" href="index.php"><h1>Simple<span>-</span>Blog</h1></a>
		    <ul class="nav-primary">
		        <li><a href="login_page.php">Login</a></li>
		        <li><a href="register_page.php">Register</a></li>
		    </ul>
		</nav>

		<article class="art simple post">
		<header class="art-header">
		</header>

		<div class="art-body" style="margin-top:-500px;">
			<div class="art-body-inner">
				<div id="contact-area">
					<h2>Register Form</h2>
					<form action="" method="post">
						<label>User:</label>
						<input id="name" name="username" placeholder="username" type="text">

						<label>Email:</label>
						<input id="email" name="email" placeholder="your@email.com" type="text">

						<label>Pass:</label>
						<input id="password" name="password" placeholder="**********" type="password">

						<center><input name="submit" type="submit" value="Register"></center>
						<span><?php echo $error; ?></span>
					</form>
				</div>
			</div>
		</div>
		</article>
		</div>

		<footer class="footer">
		    <div class="back-to-top"><a href="">Back to top</a></div>
		    <!-- <div class="footer-nav"><p></p></div> -->
		    <div class="psi">&Psi;</div>
		    <aside class="offsite-links">
		        Institut Teknologi Bandung<br>
		        Teknik Informatika<br>
		        <a href="https://www.facebook.com/andarias.silvanus">Andarias Silvanus</a> 
		    </aside>
		</footer>

		</div>

		<script type="text/javascript" src="assets/js/fittext.js"></script>
		<script type="text/javascript" src="assets/js/app.js"></script>
		<script type="text/javascript" src="assets/js/respond.min.js"></script>
		<script type="text/javascript" src="assets/js/confirm.js"></script>
		<script type="text/javascript">
		  var ga_ua = '{{! TODO: ADD GOOGLE ANALYTICS UA HERE }}';

		  (function(g,h,o,s,t,z){g.GoogleAnalyticsObject=s;g[s]||(g[s]=
		      function(){(g[s].q=g[s].q||[]).push(arguments)});g[s].s=+new Date;
		      t=h.createElement(o);z=h.getElementsByTagName(o)[0];
		      t.src='//www.google-analytics.com/analytics.js';
		      z.parentNode.insertBefore(t,z)}(window,document,'script','ga'));
		      ga('create',ga_ua);ga('send','pageview');
		</script>

		<?php
			mysql_close($con);
		?>
		
	</body>
</html>