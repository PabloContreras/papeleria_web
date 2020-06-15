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
                    <a class="nav-link" href="/views/pais/index.php">País</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/views/videojuegos/index.php">Videojuegos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/views/notas/index.php">Notas</a>
                </li>
            </ul>
        </div>
        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
            <div class="btn-group" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['name']; ?></button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <a class="dropdown-item" href="/views/base/logout.php">Salir</a>
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
                            <th scope="col">País</th>
                            <th scope="col">Clima</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $conexion = mysqli_connect("localhost","root","root","project");
                            $registros = mysqli_query($conexion,"SELECT * FROM pais where turista_id = {$_SESSION['turista_id']}"); 
                            
                            while ( $fila = mysqli_fetch_array($registros) ){
                                echo '<tr>';
                                echo '<td>'.$fila ["id"].'</td>';
                                echo '<td>'.$fila["Nombre"].'</td>';
                                echo '<td>'.$fila ["Clima"].'</td>';
                                echo '<td><button class="btn btn-info" style="background-color:transparent; border: none; padding-top:0px; padding-bottom:0px;" data-toggle="modal" data-target="#exampleModal'.$fila ["id"].'"><i class="fas fa-edit" style="color:black;"></i></a></td>';

                                echo '<td><a href="/views/pais/delete.php?id='.$fila ["id"].'"><i class="fas fa-trash-alt" style="color:black;"></i></a></td>';
                                echo '</tr>';       
                                echo  '<div class="modal fade" id="exampleModal'.$fila ["id"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST" action="update.php?id='.$fila ["id"].'">
                                                <div class="modal-body">
                                                    <div class="col-lg-12"> 
                                                        <div class="content mt-5">
                                                            <div class="page-header">                                
                                                                <div class="form-group">
                                                                    <label class="col-form-label" for="inputDefault">Ingresa tu país</label>
                                                                    <input type="text" class="form-control" placeholder="País" name="nombre" required="" value='.$fila ["Nombre"].'>
                                                                </div>
                                                                <div class="form-group">
                                                                    <select class="custom-select" name="clima" required="">
                                                                        <option disabled="">Clima</option>
                                                                        <option { $fila ["Clima"] == "Tropical" ? "selected" : ""}>Tropical</option>
                                                                        <option { $fila ["Clima"] == "Seco" ? "selected" : ""}>Seco</option>
                                                                        <option { $fila ["Clima"] == "Templado" ? "selected" : ""}>Templado</option>
                                                                        <option { $fila ["Clima"] == "Continental" ? "selected" : ""}>Continental</option>
                                                                        <option { $fila ["Clima"] == "Polar" ? "selected" : ""}>Polar</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>';                    
                            }
                         ?>
                    </tbody>
                </table> 
            </div>
            <div class="col-lg-2">
                <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Agregar</button>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar país</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="/views/pais/create.php">
                    <div class="modal-body">
                        <div class="col-lg-12"> 
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="content mt-5">
                                        <div class="page-header">                                
                                            <div class="form-group">
                                                <label class="col-form-label" for="inputDefault">Ingresa tu país</label>
                                                <input type="text" class="form-control" placeholder="País" name="nombre" required="">
                                            </div>
                                            <div class="form-group">
                                                <select class="custom-select" name="clima" required="">
                                                    <option selected="" disabled="">Clima</option>
                                                    <option>Tropical</option>
                                                    <option>Seco</option>
                                                    <option>Templado</option>
                                                    <option>Continental</option>
                                                    <option>Polar</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
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