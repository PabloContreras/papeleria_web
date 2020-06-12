<?php
    include_once '../database.php';

    if(isset($_GET['id'])) {
        $id = (int) $_GET['id'];
        $delete=$conn->prepare('DELETE FROM videogames WHERE id=:id');
        $delete->execute(array(
            ':id'=> $id
        ));
        header('Location: /proyectou3y4/portfolio.php');
    }
?>