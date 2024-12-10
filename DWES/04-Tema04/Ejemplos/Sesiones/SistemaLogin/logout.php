<?php
    // Recuperamos la informacion de la sesion
    session_start();

    // Eliminamos las variables de sesion
    session_unset();

    // La destruimos
    session_destroy();

    header("Location: index.php")
?>