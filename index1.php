<?php session_start();

if(isset($_SESSION['usuario'])){
header('location:principal');
} else{
    header('location:login.php');
}

?>
