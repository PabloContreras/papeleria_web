<?php
	$dbhost	= "localhost";	   // localhost or IP
	$dbuser	= "admin";		  // database username
	$dbpass	= "admin";		     // database password
	$dbname	= "project"; 
	
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$turista_id = $_POST['turista_id'];
	$nombre = $_POST['name'];
	$genero = $_POST['genero'];

	$sql = "INSERT INTO animales (turista_id, Nombre, Genero) VALUES ('$turista_id', '$nombre', '$genero')";

	if (mysqli_query($conn, $sql)) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}


		
	header("HTTP/1.1 302 Moved Temporarily"); 
	header("Location: /views/mascotas/index.php");
	
?>