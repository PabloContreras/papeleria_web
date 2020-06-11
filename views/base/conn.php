<?php
	// Connection variables
	$dbhost	= "localhost";	   // localhost or IP
	$dbuser	= "root";		  // database username
	$dbpass	= "root";		     // database password
	$dbname	= "project";    // database name

	try {
	
		$con=new PDO('mysql:host=localhost;dbname='.$dbname,$dbuser,$dbpass);
	
	} catch (PDOException $e) {
		echo "Error".$e->getMessage();
	}
?>