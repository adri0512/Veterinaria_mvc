<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>INICIAR SESION / REGISTRARSE</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="vista1/styles.css">

</head>

<body>


    <div class="container-form">
        <div class="header">
            <div class="logo-title">
                <img src="./imagenes/logo.png" alt="logo">
                <h2>BIENVENIDO </h2>
            </div>
            <div class="menu">
                <a href="modelo/login.php">
                    <li class="module-login active">INICIAR SESION</li>
                </a>
                <a href="./vista1/registrar-vista.php">
                    <li class="module-register">REGISTRAR</li>
                </a>
            </div>
        </div>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form">
            <div class="welcome-form">
                <h2>VETERINARIA PAW-PATROL</h2>
            </div>
            <div class="user line-input"> 
                <label class="lnr lnr-user"></label>
                <input type="text" placeholder="Nombre Usuario" name="usuario">
            </div>
            <div class="password line-input">
                <label class="lnr lnr-lock"></label>
                <input type="password" placeholder="Contraseña" name="clave">
            </div>

            <?php if (!empty($error)) : ?>
                <div class="mensaje">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <button type="submit">Entrar<label class="lnr lnr-chevron-right"></label></button>
        </form>
    </div>


    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>

</body>

</html>