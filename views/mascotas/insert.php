<?php
require '/scripts/blog.sql';

$conn = new sqli ($servername,$username,$password,$dbname);
if ($conn->connect_error) {
    die ("Conexion Fallida" . $conn->connect_error);
}
$insert= "INSERT INTO animales (id,turista_id,Nombre,Genero)";

?>