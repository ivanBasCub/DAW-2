<?php
    session_start();
    if(isset($_SESSION["count"])){
        echo "Me he unido a la sesion " . $_SESSION["count"];
    }else{
         echo "No me he unido a la sesion";
    }
    echo "<br><a href='sesiones_crear_1.php'>Volver a la página principal</a>";
    echo "<br><a href='sesiones_destruir_3.php'>Borrar la sesion</a>";
?>