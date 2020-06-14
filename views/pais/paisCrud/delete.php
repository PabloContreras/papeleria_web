<?php
session_start();
//include_once './views/base/conn.php';
// Connection variables
/*$dbhost	= "localhost";	   // localhost or IP
	$dbuser	= "admin";		  // database username
	$dbpass	= "admin";		     // database password
	$dbname	= "project";    // database name

	*/
$dbhost	= "localhost";
$dbuser	= "root";
$dbpass	= "";
$dbname	= "project";


$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if (!$conn) {
	die("Conexion fallida :( " . mysqli_connect_error());
} else {

	/*
	If the email don't exist, the data from the form is sended to the
	database and the account is created
	*/
	$nameSession = $_SESSION['name'];
	$result = mysqli_query($conn, "SELECT id FROM turista WHERE Name='$nameSession'");
	$row = mysqli_fetch_assoc($result);
	$hash = $row['id'];

    
    
    
    $resultPais = mysqli_query($conn, "SELECT turista_id FROM pais WHERE turista_id=$hash");
	$rowPais = mysqli_fetch_assoc($resultPais);
	if ($rowPais == '') {
		# code...
		echo "<div class='alert alert-warning mt-4' role='alert'>
					<p>Ya a borrado su pais.****</p>
					<p><a href='/proWeb/papeleria_web-master/views/turista/'>Turista</a></p>
				</div>";
	} else {
		# code...
        $query="DELETE  FROM pais WHERE turista_id=$hash";        

		if (mysqli_query($conn, $query)) {
			//header("Location: /");	

			header("Location: /proWeb/papeleria_web-master/views/turista/");
		} else {

			echo $_SESSION['name'];
			echo $hash = $row['id'];
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}
	}
}
mysqli_close($conn);
?>
