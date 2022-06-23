<?php session_start();
if(isset($_SESSION['usuario'])){
    header('location: index1.php');
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $clave2 = $_POST['clave2'];
    
    $clave = hash('sha512', $clave);
    $clave2 = hash('sha512', $clave2);
    
    $error = '';

    if(empty($correo)or empty($usuario) or empty($clave) or empty($clave2)){
        $error .='<i>FAVOR DE RELLENAR TODOS LOS CAMPOS</i>';
    }else{
        try{
            $conexion = new PDO('mysql:host=localhost;dbname=dbveterinaria','root','');
        } catch(PDOException $prueba_error){
            echo "Error: ".$prueba_error->getMessage();
        }
      $statement = $conexion->prepare('SELECT * FROM usuario WHERE username =:usuario ');
      $statement->execute(array(':usuario' => $usuario));
      $resultado = $statement->fetch();

      if ($resultado != false){
        $error .= '<i>Este usuario ya existe</i>';
    }
    
    if ($clave != $clave2){
        $error .= '<i> Las contraseñas no coinciden</i>';
    }
    }
if ($error == ''){
    $statement = $conexion->prepare('INSERT INTO usuario (fk_idcliente, correo, username, contraseña) VALUES (null, :correo, :usuername, :contraseña)');
    $statement->execute(array(
                
        ':correo' => $correo,
        ':usuario' => $username,
        ':clave' => $contraseña   
    ));
    $error .= '<i style="color: green;">USUARIO REGISTRADO exitosamente</i> ';
}

    }
    require 'vista1/registrar-vista.php';

?>