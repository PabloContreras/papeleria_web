<?php 
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
  	<head>
	    <title>Bienvenido | <?php echo $_SESSION['name']; ?></title>
		<link rel="stylesheet" href="/css/bootstrap.min.css">
	    <!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  	</head>
  
  	<body>      
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<a class="navbar-brand" href="/views/turista/index.php"><i class="fas fa-home"></i></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    			<span class="navbar-toggler-icon"></span>
  			</button>
			<div class="collapse navbar-collapse" id="navbarColor01">
			    <ul class="navbar-nav mr-auto">
			      	<li class="nav-item">
			        	<a class="nav-link" href="/views/mascotas/index.php">Mascotas</a>
			      	</li>
			      	<li class="nav-item">
			        	<a class="nav-link" href="#">País</a>
			      	</li>
			      	<li class="nav-item">
			        	<a class="nav-link" href="#">Videojuegos</a>
			      	</li>
			      	<li class="nav-item">
			        	<a class="nav-link" href="#">Notas</a>
			      	</li>
			    </ul>
			</div>
			<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
				<div class="btn-group" role="group">
				    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['name']; ?></button>
				    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
				    	<a class="dropdown-item" href="">Perfil</a>
				    	<a class="dropdown-item" href="/views/base/logout.php">Salir</a>
				    </div>
				</div>
			</div>
		</nav>   
		<div class="content mt-5"> 
			<div class="col-lg-10 col-md-10 col-sm-12 ml-auto mr-auto mt-5">
				<div class="row justify-content-center mt-5 mb-5"> 
					<div class="col-lg-5">
						<a href="/views/mascotas/index.php" style="text-decoration: none;">
							<div class="card border-primary mb-3">
								<div class="card-body">
							    	<h4 class="card-title text-center">Mascotas</h4>
							  	</div>
							</div>
						</a>
					</div>
					<div class="col-lg-5">
						<a href="" style="text-decoration: none;">
							<div class="card border-primary mb-3">
								<div class="card-body">
							    	<h4 class="card-title text-center">País</h4>
							  	</div>
							</div>
						</a>
					</div>
				</div>
				<div class="row justify-content-center mt-5"> 
					<div class="col-lg-5">
						<a href="" style="text-decoration: none;">
							<div class="card border-primary mb-3">
								<div class="card-body">
							    	<h4 class="card-title text-center">Videojuegos</h4>
							  	</div>
							</div>
						</a>
					</div>
					<div class="col-lg-5">
						<a href="" style="text-decoration: none;">
							<div class="card border-primary mb-3">
								<div class="card-body">
							    	<h4 class="card-title text-center">Notas</h4>
							  	</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
		
		<footer class="footer fixed-bottom" style="background-color: #1a1a1a;">
            <div class="row" style="margin-left: 0px; margin-right: 0px;">
                
                <div class="col-auto ml-auto text-white mb-5 mt-5">
                    &copy;<script>document.write(new Date().getFullYear());</script>, Hecho con <i class="fa fa-heart heart"></i>
                </div>
            </div>
	    </footer>
	
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	</body>
</html>