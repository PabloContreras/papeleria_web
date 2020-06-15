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
                        <a class="nav-link" href="/videojuegos/index.php">Videojuegos</a>
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
                        <a class="dropdown-item" href="">Perfil</a>
                        <a class="dropdown-item" href="/base/logout.php">Salir</a>
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
                                <th scope="col">Precio</th>
                                <th scope="col">Consola</th>
                                <th scope="col">Descripción</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $conexion = mysqli_connect("localhost","admin","admin","project");
                                $registros = mysqli_query($conexion,"SELECT * FROM videojuegos"); 
                                
                                while ( $fila = mysqli_fetch_array($registros) ){
                                    echo '<tr>';
                                    echo '<td>'.$fila ["id"].'</td>';
                                    echo '<td>'.$fila ["nombre"].'</td>';
                                    echo '<td>'.$fila ["precio"].'</td>';
                                    echo '<td>'.$fila ["consola"].'</td>';
                                    echo '<td>'.$fila ["descripcion"].'</td>';
                                    echo '<td><button class="btn btn-info" style="background-color: transparent; border: none; padding-top: 0px; padding-bottom: 0px;" data-toggle="modal" data-target="#exampleModal'.$fila ["id"].'"><i class="fas fa-edit mb-2" style="color:black;"></i></a></td>';

                                    echo '<td><a href="/views/videojuegos/delete.php?id='.$fila ["id"].'"><i class="fas fa-trash-alt" style="color:black;"></i></a></td>';
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
                                                <form method="POST" action="/views/videojuegos/update.php?id='.$fila ["id"].'">
                                                    <div class="modal-body">
                                                        <div class="col-lg-12"> 
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label for="recipient-videojuego" class="col-form-label">Videojuego:</label>
                                                                        <input name="name" type="text" class="form-control" id="recipient-videojuego" value="'.$fila ["nombre"].'">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="recipient-precio" class="col-form-label">Precio:</label>
                                                                        <input name="price" type="number" class="form-control" id="recipient-precio" value="'.$fila ["precio"].'">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="recipient-consola" class="col-form-label">Consola:</label>
                                                                        <input name="console" type="text" class="form-control" id="recipient-consola" value="'.$fila ["consola"].'">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="message-text" class="col-form-label">Descripción:</label>
                                                                        <textarea name="description" class="form-control" id="message-text">'.ucfirst($fila ["descripcion"]).'</textarea>
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
                <div class="col-lg-2 my-auto">
                    <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Agregar</button>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="/views/videojuegos/create.php">
                        <div class="modal-body">
                            <div class="col-lg-12"> 
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="recipient-videojuego" class="col-form-label">Videojuego:</label>
                                            <input name="name" type="text" class="form-control" id="recipient-videojuego">
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-precio" class="col-form-label">Precio:</label>
                                            <input name="price" type="number" class="form-control" id="recipient-precio">
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-consola" class="col-form-label">Consola:</label>
                                            <input name="console" type="text" class="form-control" id="recipient-consola">
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Descripción:</label>
                                            <textarea name="description" class="form-control" id="message-text"></textarea>
                                        </div> 
                                    </div>
                                </div>
                                <div>
                                    <input type="hidden" name="turista_id" value="<?php echo $_SESSION['turista_id']; ?>">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>