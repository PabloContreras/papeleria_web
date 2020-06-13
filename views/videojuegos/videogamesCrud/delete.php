<?php
    include_once '../../base/conn.php';

    if(isset($_GET['id'])) {
        $id = (int) $_GET['id'];
        $delete=$conn->prepare('DELETE FROM videojuegos WHERE id=:id');
        $delete->execute(array(
            ':id'=> $id
        ));
        header('Location: /papeleria_web/views/videojuegos/index.php');

    }
?>