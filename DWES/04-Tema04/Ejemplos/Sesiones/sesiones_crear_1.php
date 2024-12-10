<?php
    session_start();
    if(!isset($_SESSION["count"])){
        $_SESSION['count'] = 0;
    } else{
        $_SESSION['count']++;
    }
    echo "hola " . $_SESSION["count"];
    
    echo "<br><a href='sesiones_unirse_2.php'>Me uno a la sesión</a>";
?>