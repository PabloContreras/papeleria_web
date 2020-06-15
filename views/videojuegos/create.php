<?php

  // Connection variables
  $dbhost = "localhost";     // localhost or IP
  $dbuser = "admin";      // database username
  $dbpass = "admin";         // database password
  $dbname = "project";    // database name
  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  $nombre = $_POST['name'];
  $precio = $_POST['price'];
  $consola = $_POST['console'];
  $descripcion = $_POST['description'];
  $turista_id = $_POST['turista_id'];

  $sql = "INSERT INTO videojuegos (turista_id, nombre, precio, consola, descripcion) VALUES ('$turista_id', '$nombre', '$precio', '$consola', '$descripcion')";

  if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }


    
  header("HTTP/1.1 302 Moved Temporarily"); 
  header("Location: /views/videojuegos/index.php");


?>