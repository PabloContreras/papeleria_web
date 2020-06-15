<?php
	$dbhost	= "localhost";	   // localhost or IP
	$dbuser	= "root";		  // database username
	$dbpass	= "";		     // database password
	$dbname	= "project"; 

	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$id = $_GET['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $consola = $_POST['consola'];
    $descripcion = $_POST['descripcion'];

	$sql = "DELETE FROM videojuegos WHERE id = '$id'";

	if (mysqli_query($conn, $sql)) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

		
	header("HTTP/1.1 302 Moved Temporarily"); 
	header("Location: index.php");
	
?>