<?php

include_once '../base/conn.php';

if(isset($_POST['guardar'])) {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $consola = $_POST['consola'];
    $descripcion = $_POST['descripcion'];

    if (!empty($nombre) && !empty($precio) && !empty($consola) && !empty($descripcion)) {
       $consulta_insert = $conn->prepare('INSERT INTO videojuegos(nombre,precio,consola,descripcion)
       VALUES(:nombre, :precio, :consola, :descripcion)');
       $consulta_insert -> execute(array(
            ':nombre' => $nombre,
            ':precio' => $precio,
            ':consola' => $consola,
            ':descripcion' => $descripcion
       ));
        header('Location: index.php');

    }else {
        echo "<script> alert('Los campos están vacios');</script>";
    }
}

?>