<?php
	function hashSalt($password) {
		// Add salt and hashing with SHA 256
		$salt = '5a7z8o6y4';
		//$salt = openssl_random_pseudo_bytes(24);
		echo 'from hashSalt, password input: '.$password.'<br>';
		$password_new = $password . $salt;
		echo 'from hashSalt, password new input: '.$password_new.'<br>';
		$password_hashed = hash('sha256', $password_new);
		return $password_hashed;
	}
?>