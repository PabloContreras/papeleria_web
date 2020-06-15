
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
	
	$result = mysqli_query($conn, "SELECT id, Email, Password, Name FROM admins WHERE Email = '$email'");
	
	$row = mysqli_fetch_assoc($result);
	
	$hash = $row['Password'];

	if (password_verify($_POST['password'], $hash)) {	
		
		$_SESSION['loggedin'] = true;
		$_SESSION['admin_id'] = $row['id'];
		$_SESSION['name'] = $row['Name'];
		$_SESSION['start'] = time();
		$_SESSION['expire'] = $_SESSION['start'] + (100 * 60);
		header("Location: /views/admin/index.php");
		 
	
	} else {
		header("Location: /views/admin/login.html");	}


?>	