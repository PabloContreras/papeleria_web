<?php
	
	// Connection variables
	$dbhost	= "localhost";	   // localhost or IP
	$dbuser	= "root";		  // database username
	$dbpass	= "";		     // database password
	$dbname	= "project";    // database name

	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$turista_id = $_POST['turista_id'];
	$content = $_POST['content'];


	$sql = "INSERT INTO blog (turista_id, content) VALUES ('$turista_id', '$content')";

	if (mysqli_query($conn, $sql)) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}


		
	header("HTTP/1.1 302 Moved Temporarily"); 
	header("Location: index.php");
?> 