<?php

    function borrarCookie($name){
        if(isset($_COOKIE[$name])){
            setcookie($name,"",1);
            return "Cookie Eliminada";
        }else{
            return "Esta cookie no existe";
        }
    }

    /* 
    Buscamos la cookie "visitas" 
    si no existe se crea con valor 1
    si existe, se suma 1
    */

    if(!isset($_COOKIE["visitas"])){
        // Crear la cookie
        setcookie("visitas","1",time()+3600*24);
        echo "Bienvenido por primera vez";
    }else{
        // Aumentar el valor de la cookie
        $visitas = (int) $_COOKIE["visitas"];
        $visitas++;
        setcookie("visitas",$visitas,time() + 3600 *24);
        echo "Bienvenido por $visitas vez";

        borrarCookie("visitas");
    }


?>