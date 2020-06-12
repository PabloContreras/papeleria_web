/* Destroy current user session */

<?php
session_start();
session_unset($_SESSION['email']);
session_destroy();

header("location: /");
//header("location: /proWeb/papeleria_web-master/");
?>