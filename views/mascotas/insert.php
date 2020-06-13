<?php
require '/scripts/blog.sql';
if ($_SERVER['REQUEST_METHOD']== 'POST') {
    $turista_id = $_POST['turista_id'];
    $nombre= $_POST['nombre'];
    $genero= $_POST['genero'];
try{
    $conn= new PDO('$servername;$dbname','root','');

}catch(PDOExeption $e){
    echo "Error:" . $e->getMessage(); 
}

$statement = $conn->prepare('INSERT INTO mascotas(id,turista_id,Nombre,Genero) VALUES(NUll,:turista_id,:nombre,:genero)');
$statement->execute(array(

    ':turista_id' => $turista_id,
    ':nombre'=>$nombre,
    ':genero'=>$genero

));
}
?>