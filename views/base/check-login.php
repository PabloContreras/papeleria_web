<?php
	session_start();
	// Connection info. file
	include_once '/views/base/conn.php';	
	
	// Connection variables
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
			
	
			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			
			// data sent from form login.html 
			$email = $_POST['email']; 
			$password = $_POST['password'];
			
			// Query sent to database
			$result = mysqli_query($conn, "SELECT Email, Password, Name FROM users WHERE Email = '$email'");
			
			// Variable $row hold the result of the query
			$row = mysqli_fetch_assoc($result);
			
			// Variable $hash hold the password hash on database
			$hash = $row['Password'];
			
			/* 
			password_Verify() function verify if the password entered by the user
			match the password hash on the database. If everything is OK the session
			is created for one minute. Change 1 on $_SESSION[start] to 5 for a 5 minutes session.
			*/
			if (password_verify($_POST['password'], $hash)) {	
				
				$_SESSION['loggedin'] = true;
				$_SESSION['name'] = $row['Name'];
				$_SESSION['start'] = time();
				$_SESSION['expire'] = $_SESSION['start'] + (10 * 60) ;						
				
				echo "<div class='alert alert-success mt-4' role='alert'><strong>Bienvenido</strong> $row[Name]			
				<p><a href='/views/turista/imprimir.php'>Continuar</a></p>	
				
				<p><a href='logout.php'>Salir</a></p></div>";	
			
			} else {
				echo "<div class='alert alert-danger mt-4' role='alert'>Email o Password Incorrectos!
				<p><a href='login.html'><strong>Por Favor Intentalo Nuevamente!</strong></a></p></div>";			
			}	
			?>
		</div>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

	</body>
</html>