<?php
	session_start();
	
	$dbhost	= "localhost";	   // localhost or IP
	$dbuser	= "admin";		  // database username
	$dbpass	= "admin";		     // database password
	$dbname	= "project";    // database name

	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	if (!$conn) {
		die("Conexion fallida :( " . mysqli_connect_error());
	} else {

		$nameSession = $_SESSION['name'];
		$result = mysqli_query($conn, "SELECT id FROM turista WHERE Name='$nameSession'");
		$row = mysqli_fetch_assoc($result);

		$turista_id = $row['id'];
		$pais = $_POST['nombre'];
		$clima = $_POST['clima'];

		//$validate = mysqli_query($conn, "SELECT count(*) FROM pais WHERE turista_id='$turista_id' AND Nombre='$pais' AND Clima='$clima' ");

		$query = "INSERT INTO pais(turista_id, Nombre, Clima) VALUES ('$turista_id', '$pais', '$clima')";

		if (mysqli_query($conn, $query)) {
			header("Location: /views/pais/index.php");
		} else {

			echo $_SESSION['name'];
			echo $hash = $row['id'];
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}
	}
	mysqli_close($conn);
?>
