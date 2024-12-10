<?php
    session_start();
    session_unset();
    session_destroy();
    echo "Sesion Destruida";
     echo "<br><a href='sesiones_crear_1.php'>Volver a la página principal</a>";
?>