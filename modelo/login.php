<?php session_start(); /*crea una sesión o reanuda la actual basada en un identificador */
if(isset($_SESSION['usuario'])){
    header('location: index.php');
}
$error='';
if($_SERVER['RESQUEST_METHOD']=='POST'){
    $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $clave = hash('sha512', $clave); /* el hash-Devuelve una lista con los algoritmos de cifrado soportados */
   try{
    $conexion = new PDO('mysql:host=localhost;dbname=dbveterinaria', 'root', '');
   }catch(PDOException $prueba_error) {
echo"Error: "  . $prueba_error->getMessage(); /*Obtiene el mensaje */
   }
   $statement = $conexion->prepare('
   SELECT * FROM login WHERE usuario =:usuario AND clave =: clave');
   $statement->execute(array(
    ':usuario' => $usuario,
    ':clave' => $clave
));
   $resultado = $statement->fetch();
   if ($resultado !== false){
    $_SESSION['usuario'] = $usuario;
    header('location: SesionIniciada.php');
}else{
    $error .= '<i>Este usuario no existe</i>';
}

   }





?>