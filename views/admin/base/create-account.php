<?php
	session_start();
	$dbhost	= "localhost";	   // localhost or IP
	$dbuser	= "admin";		  // database username
	$dbpass	= "admin";		     // database password
	$dbname	= "project";    // database name

	
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	if (!$conn) {
		die("Conexion fallida :( " . mysqli_connect_error());
	}
	
	$checkEmail = "SELECT * FROM admins WHERE Email = '$_POST[email]' ";

	$result = $conn-> query($checkEmail);

	$count = mysqli_num_rows($result);

	if ($count == 1) {
	echo "<div class='alert alert-warning mt-4' role='alert'>
					<p>Ese correo ya esta registrado.Por Favor intenta registrarte con otro o intenta iniciar sesion</p>
					<p><a href='index.html'>Login</a></p>
				</div>";
	} else {	
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$pass = $_POST['password'];
	
	$passHash = password_hash($pass, PASSWORD_DEFAULT);
	
	$query = "INSERT INTO admins(Name, Email, Password) VALUES ('$name', '$email', '$passHash')";

	if (mysqli_query($conn, $query)) {
			header("Location: /views/admin/login.html");	

		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}	
	}	
	mysqli_close($conn);
?>