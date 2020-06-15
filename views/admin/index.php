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
        
        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
            <div class="btn-group" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['name']; ?></button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <a class="dropdown-item" href="/views/admin/base/logout.php">Salir</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="col-lg-10 ml-auto mr-auto mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <table class="table table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo electrónico</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $conexion = mysqli_connect("localhost","root","root","project");
                            $registros = mysqli_query($conexion,"SELECT * FROM turista where admin_id = {$_SESSION['admin_id']}"); 
                            
                            while ( $fila = mysqli_fetch_array($registros) ){
                                echo '<tr>';
                                echo '<td>'.$fila ["id"].'</td>';
                                echo '<td>'.$fila["Name"].'</td>';
                                echo '<td>'.$fila ["Email"].'</td>';
                                echo '<td><button class="btn btn-info" style="background-color:transparent; border: none; padding-top:0px; padding-bottom:0px;" data-toggle="modal" data-target="#exampleModal'.$fila ["id"].'"><i class="fas fa-eye" style="color:black;"></i></a></td>';
                                echo '<td><a href="/views/admin/delete.php?id='.$fila ["id"].'"><i class="fas fa-trash-alt" style="color:black;"></i></a></td>';
                                echo '</tr>';       
                                echo  '<div class="modal fade" id="exampleModal'.$fila ["id"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ver información</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-lg-12"> 
                                                    <div class="row justify-content-center">
                                                        <div class="page-header">';                                
                                                            $mascotas = mysqli_query($conexion, "SELECT * FROM animales where turista_id = {$fila ["id"]}");
                                                            while ( $f = mysqli_fetch_array($mascotas) ){
                                                                echo '
                                                                    <div class="row justify-content-center">
                                                                        <h3>Mascotas</h3>
                                                                        <div class="col-lg-10">
                                                                            <p>Nombre: '.$f["Nombre"].'</p>
                                                                            <p>Género: '.$f["Genero"].'</p>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                ';
                                                            }
                                                            $notas = mysqli_query($conexion, "SELECT * FROM blog where turista_id = {$fila ["id"]}");
                                                            while ( $blog = mysqli_fetch_array($notas) ){
                                                                echo '
                                                                    
                                                                    <div class="row justify-content-center">
                                                                        <h3>Notas</h3>
                                                                        <div class="col-lg-10">
                                                                            <p>Contenido: '.$blog["content"].'</p>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                ';
                                                            }
                                                            $videojuego = mysqli_query($conexion, "SELECT * FROM videojuegos where turista_id = {$fila ["id"]}");
                                                            while ( $vj = mysqli_fetch_array($videojuego) ){
                                                                echo '
                                                                <div class="row justify-content-center">
                                                                    <h3>Videojuegos</h3>
                                                                    <div class="col-lg-10">
                                                                        <p>Nombre: '.$vj["nombre"].'</p>
                                                                        <p>Precio: '.$vj["precio"].'</p>
                                                                        <p>Consola: '.$vj["consola"].'</p>
                                                                        <p>Descripción: '.$vj["descripcion"].'</p>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                ';
                                                            }
                                                            $paises = mysqli_query($conexion, "SELECT * FROM pais where turista_id = {$fila ["id"]}");
                                                            while ( $pais = mysqli_fetch_array($paises) ){
                                                                echo '
                                                                <div class="row justify-content-center">
                                                                    <h3>Países</h3>
                                                                    <div class="col-lg-10">
                                                                        <p>Nombre: '.$pais["Nombre"].'</p>
                                                                        <p>Clima: '.$pais["Clima"].'</p>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                ';
                                                            }
                                                   echo '</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>';                    
                            } 
                         ?>
                    </tbody>
                </table> 
            </div>
        </div>
    </div>

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
    <script type="text/javascript">
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
    </script>
</body>

</html>