<?php
require '/scripts/blog.sql';
if ($_SERVER['REQUEST_METHOD']== 'POST') {
    $id = $_POST['id'];
       
try{
    $conn= new PDO('$servername;$dbname','root','');

}catch(PDOExeption $e){
    echo "Error:" . $e->getMessage(); 
}
$statement = $conn->prepare('DELETE FROM mascotas WHERE id = :id');
$statement->execute(array(
            ':id' => $id
        ));
}
?>
