<?php
	function hashSalt($password) {
		// Add salt and hashing with SHA 256
		$salt = '57864';
		$password_new = $password + $salt;
		$password_hashed = hash('sha256', $password_new);
		return $password_hashed;
	}
?>