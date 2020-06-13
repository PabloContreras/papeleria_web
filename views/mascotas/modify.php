<?php
require '/scripts/blog.sql';
if ($_SERVER['REQUEST_METHOD']== 'POST') {
    $id = $_POST['id'];
    $nombre= $_POST['nombre'];
    $genero= $_POST['genero'];
try{
    $conn= new PDO('$servername;$dbname','root','');

}catch(PDOExeption $e){
    echo "Error:" . $e->getMessage(); 
}
$statement = $conn->prepare('UPDATE FROM mascotas SET (Nombre=:nombre,Genero=:genero) WHERE id=:id');
$statement->execute(array(
    ':id'=>$id,
    ':nombre'=>$nombre,
    ':genero'=>$genero

));
}
?>