
<?php
	session_start();
	$dbhost	= "localhost";
	$dbuser	= "admin";
	$dbpass	= "admin";
	$dbname	= "project";
	
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$email = $_POST['email']; 
	$password = $_POST['password'];
	
	$result = mysqli_query($conn, "SELECT id, Email, Password, Name FROM turista WHERE Email = '$email'");
	
	$row = mysqli_fetch_assoc($result);
	
	$hash = $row['Password'];

	if (password_verify($_POST['password'], $hash)) {	
		
		$_SESSION['loggedin'] = true;
		$_SESSION['turista_id'] = $row['id'];
		$_SESSION['name'] = $row['Name'];
		$_SESSION['start'] = time();
		$_SESSION['expire'] = $_SESSION['start'] + (100 * 60);
		header("Location: /views/turista/index.php");
		 
	
	} else {
		header("Location: /");	
	}	

?>	