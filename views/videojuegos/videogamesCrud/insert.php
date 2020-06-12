<?php

if(isset($_POST['guardar'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $console = $_POST['console'];
    $description = $_POST['description'];

    if (!empty($name) && !empty($price) && !empty($console) && !empty($description)) {
       $consulta_insert = $conn->prepare('INSERT INTO videogames(name,price,console,description)
       VALUES(:name, :price, :console, :description)');
       $consulta_insert -> execute(array(
            ':name' => $name,
            ':price' => $price,
            ':console' => $console,
            ':description' => $description
       ));
        header('Location: portfolio.php');

    }else {
        echo "<script> alert('Los campos están vacios');</script>";
    }
}

?>