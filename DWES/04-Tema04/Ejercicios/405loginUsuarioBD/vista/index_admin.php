<?php
    // Nos unimos a la sesion
    if(!$_SESSION){
        session_start();
    }
    // Comprobamos si han logeado en la aplicacion
    if(!isset($_SESSION["user"])){
        // Si no se ha autenticado, redirigimos al login
        header("Location:index.php?loginIndex=true");
    }
    if($_SESSION["type"] != 1){
        // Si no se ha autenticado, redirigimos al login
        header("Location:index.php?loginIndex=true");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu de Administradores</title>
</head>
<body>
    <h1>Bienvenido <?= $_SESSION["user"] ?></h1>
    <p>Pulse <a href="../controlador/logout.php">aquí</a> para salir</p>
</body>
</html>