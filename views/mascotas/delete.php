<?php
require '/scripts/blog.sql';
try{
    $conn= new PDO('$servername;$dbname','root','');

}catch(PDOExeption $e){
    echo "Error:" . $e->getMessage(); 
}
$statement = $conn->prepare('DELETE FROM mascotas WHERE id');
?>
