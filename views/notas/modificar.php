<?php
	$dbhost	= "localhost";
	$dbuser	= "root";
	$dbpass	= "";
	$dbname	= "project";
	
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$content = $_POST['content'];

	$id = $_GET['id']; 
	$sql = "UPDATE blog SET content = '$content' WHERE id = '$id'";

	if (mysqli_query($conn, $sql)) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}


		
	header("HTTP/1.1 302 Moved Temporarily"); 
	header("Location: index.php");
	
?>