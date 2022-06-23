<?php session_start();

session_destroy();
$_session_destroy();
header('location:index1.php');

?>