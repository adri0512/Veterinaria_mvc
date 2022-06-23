<?php
try {
    $conexion = new PDO('mysql:host=localhost;dbname:dbveterinaria', 'root', '');
} catch(PDOException $prueba_error){
    echo"ERROR: ". $prueba_error->getMessage();
}
?>

