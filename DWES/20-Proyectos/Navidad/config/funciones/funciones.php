<?php
    include "../conexionBBDD.php";
    
    // Funcion para mostrar un mensaje de error y redirigir a la pagina de login
    function errorMsg($error){
        $con = null;
        header("Location:../vista/index.php?loginIndex=$error");
    }

?>