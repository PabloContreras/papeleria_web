<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bienvenido | <?php echo $_SESSION['name']; ?></title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="/proWeb/papeleria_web-master/css/bootstrap.min.css"> -->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="views/turista/index.php"><i class="fas fa-home"></i></a>
        <!-- <a class="navbar-brand" href="/proWeb/papeleria_web-master/views/turista/index.php"><i class="fas fa-home"></i></a> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Mascotas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="views/pais/">País</a>
                    <!-- <a class="nav-link" href="/opt/lampp/htdocs/proWeb/papeleria_web-master/views/pais/">País</a>-->
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
                    <!-- <a class="dropdown-item" href="/proWeb/papeleria_web-master/views/base/logout.php">Salir</a> -->
                    <a class="dropdown-item" href="/views/base/logout.php">Salir</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mi codigo Natha inicio-->
    <div class="content mt-5">
        <div class="col-lg-10 col-md-10 col-sm-12 ml-auto mr-auto mt-5">
            <div class="row justify-content-center mt-5 mb-5">
                <div class="page-header">
                    <h1 id="forms">Pais</h1>
                    <div class="form-group">
                        <label class="col-form-label" for="inputDefault">Ingresa tu pais</label>
                        <input type="text" class="form-control" placeholder="Pais" id="inputDefault">
                    </div>
                    <div class="form-group">
                        <select class="custom-select">
                            <option selected="">Clima</option>
                            <option value="1">tropical</option>
                            <option value="2">seco</option>
                            <option value="3">templado</option>
                            <option value="4">continental</option>
                            <option value="5">polar</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mi codigo Natha fin-->


    <footer class="footer fixed-bottom" style="background-color: #1a1a1a;">
        <div class="row" style="margin-left: 0px; margin-right: 0px;">

            <div class="col-auto ml-auto text-white mb-5 mt-5">
                &copy;<script>
                    document.write(new Date().getFullYear());
                </script>, Hecho con <i class="fa fa-heart heart"></i>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>

</html>