<?php

if(isset($_POST["usuario"], $_POST["edad"])){ //Deben existir ambos 
     echo "Hola ". $_POST["usuario"]." tienes ".$_POST["edad"]." edad.";    

}
else{
    echo "Error, falta el usuario y/o edad";

}
?>