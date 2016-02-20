<?php
	// Create connection
    $con=mysql_connect("localhost", "root","") or die (mysql_error());
    mysql_select_db("simple_blog", $con);
?>