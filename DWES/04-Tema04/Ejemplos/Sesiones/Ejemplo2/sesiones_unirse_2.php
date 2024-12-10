<?php
    session_start();
    if(isset($_SESSION["nombre"])){
        echo "Me he unido a la sesion ";
        print_r($_SESSION);
    }
    echo "<br><a href='sesiones_crear_1.php'>Volver a la página principal</a>";
    echo "<br><a href='sesiones_destruir_3.php'>Borrar la sesion</a>";
?>