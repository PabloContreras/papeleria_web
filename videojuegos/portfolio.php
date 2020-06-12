<?php 
    session_start();
    if(!isset($_SESSION['user_id'])) {
        header('Location: /proyectou3y4');
    }
        require 'database/database.php';
        require 'database/index.database.php';
    
        $sentencia_select = $conn->prepare('SELECT * FROM videogames');
        $sentencia_select->execute();
        $resultado = $sentencia_select->fetchAll();
        
        require 'database/videogames/insert.php';
        
      
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portafolio</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.portfolio.css" type="text/css">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <h1 class="navbar-brand">Bienvenido <?= $user['name'] ?></h1>
        <form class="form-inline">
            <a class="btn btn-danger" href="database/logout.php">Cerrar Sesión</a>
        </form>
    </nav>
    <div class="container">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#añadir">
        Añadir
    </button>
        <table class=" tabla table table-hover">
            <thead class="thead-dark">
                <tr>
                <th scope="col">ID</th>
                <th scope="col">VideoJuego</th>
                <th scope="col">Precio</th>
                <th scope="col">Consola</th>
                <th scope="col">Descripción</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($resultado as $fila): ?>
                <tr>
                    <th scope="row"> <?php echo $fila['id']; ?> </th>
                    <td> <?php echo $fila['name'];?> </td>
                    <td> $<?php echo $fila['price'];?>.00</td>
                    <td> <?php echo $fila['console'];?> </td>
                    <td> <?php echo $fila['description'];?> </td>
                
                    <td class="text-center">
                        <a class="btn btn-primary"href="database/videogames/update.php?id=<?php echo $fila['id']; ?>">Editar</a>
                        <a class="btn btn-danger" href="database/videogames/delete.php?id=<?php echo $fila['id']; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    
        <!-- Añadir nuevo videojuego -->
        <div class="modal fade" id="añadir" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Añadir videojuego</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                
                    <div class="modal-body">
                        <form action="" method="POST">
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
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <input name="guardar" type="submit" class="btn btn-success"></input>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>