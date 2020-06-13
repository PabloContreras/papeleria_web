<?php
require '/scripts/blog.sql';
try{
    $conn= new PDO('$servername;$dbname','root','');

}catch(PDOExeption $e){
    echo "Error:" . $e->getMessage(); 
}
$statement = $conn->prepare('UPDATE FROM mascotas SET (Nombre,Genero) WHERE id');
?>