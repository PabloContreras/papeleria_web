<?php
	// Connection variables
	$dbhost	= "localhost";	   // localhost or IP
	$dbuser	= "admin";		  // database username
	$dbpass	= "admin";		     // database password
	$dbname	= "project";    // database name

	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
?>