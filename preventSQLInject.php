<?php
	function preventSQLInject($query){
		$query = stripslashes($query);
		$query = mysql_real_escape_string($query);
		return $query;
	}
?>