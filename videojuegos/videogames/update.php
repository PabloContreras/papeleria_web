<?php

    include_once '../database.php';

    if(isset($_GET['id'])) {
        $id = (int) $_GET['id'];
        
        $buscar_id = $conn->prepare('SELECT * FROM videogames WHERE id=:id LIMIT 1');
        $buscar_id -> execute(array(
            ':id'=>$id
        ));
        $result = $buscar_id->fetch();
    }else {
        header('Location: /proyectou3y4/portfolio.php');
    }


    if(isset($_POST['editar'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $console = $_POST['console'];
        $description = $_POST['description'];
        $id = $_GET['id'];

        if (!empty($name) && !empty($price) && !empty($console) && !empty($description)) {

            $consulta_update = $conn->prepare('UPDATE videogames SET  
            name=:name,
            price=:price,
            console=:console,
            description=:description
            WHERE id = :id'
            );

            $consulta_update -> execute(array(
                ':name' => $name,
                ':price' => $price,
                ':console' => $console,
                ':description' => $description,
                ':id' => $id
            ));   

        }
        
    header('Location: /proyectou3y4/portfolio.php');
    }


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Videojuego</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/styles.portfolio.css" type="text/css">
</head>
<body>
    <div class="container">
        <h1 class="text-center" >Editar Videojuego</h1>
        <form action="" method="POST" id="formedit">
            <div class="form-group">
                <label for="recipient-videojuego" class="col-form-label">Videojuego:</label>
                <input name="name" value="<?php if($result) echo $result['name'];?>" type="text" class="form-control" id="recipient-videojuego">
            </div>
            <div class="form-group">
                <label for="recipient-precio" class="col-form-label">Precio:</label>
                <input name="price" value="<?php if($result) echo $result['price'];?>" type="number" class="form-control" id="recipient-precio">
            </div>
            <div class="form-group">
                <label for="recipient-consola" class="col-form-label">Consola:</label>
                <input name="console" value="<?php if($result) echo $result['console'];?>" type="text" class="form-control" id="recipient-consola">
            </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label">Descripción:</label>
                <textarea name="description" class="form-control" id="message-text"><?php if($result) echo $result['description'];?></textarea>
            </div> 
            <a href="../../portfolio.php" type="submit" class="btn btn-secondary">Cancelar</a>
            <input  name="editar" value="Editar" type="submit" class="btn btn-primary"></input>
        </form>
    </div>
</body>
</html>