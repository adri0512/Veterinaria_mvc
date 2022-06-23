<?php session_start();
if(isset($_SESSION['usuario'])){
    require 'vista1/principal-vista.php';
}else{
    header ('location: ../modelo/login.php');
}
    
?>
