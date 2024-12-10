<?php
    $nombre = "Ivan";
    $edad = 22;
    
    session_start();
    if(!isset($_SESSION["nombre"])){
        $_SESSION['nombre'] =  $nombre;
        $_SESSION['edad'] = $edad;
    }
    echo "<br><a href='sesiones_unirse_2.php'>Me uno a la sesión</a>";
?>