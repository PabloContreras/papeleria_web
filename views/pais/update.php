<?php
	$dbhost	= "localhost";	   // localhost or IP
	$dbuser	= "admin";		  // database username
	$dbpass	= "admin";		     // database password
	$dbname	= "project"; 
	
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$nombre = $_POST['nombre'];
	$clima = $_POST['clima'];
	$id = $_GET['id']; 
	$sql = "UPDATE pais SET Nombre = '$nombre', Clima = '$clima' WHERE id = '$id'";

	if (mysqli_query($conn, $sql)) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}


		
	header("HTTP/1.1 302 Moved Temporarily"); 
	header("Location: /views/pais/index.php");
	
?>
