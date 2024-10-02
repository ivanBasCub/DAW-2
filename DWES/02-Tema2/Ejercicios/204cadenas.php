<?php
    // Creamos dos variables
    $a = 5;
    $frase = 'Hola mundo';
    // Concatenamos con el simbolo .
    echo $frase . 'desde el  <br>';
    echo 'Vamos a mostrar el valor de $a ' . "es $a <br>";

    /* Variables superglobales:
    Algunas variables predefinidas en PHP son "superglobales", lo que significa que están disponibles en todos los ámbitos a lo largo del script. 
    No es necesario emplear global $variable; para acceder a ellas dentro de las funciones o métodos.
    
    Las variables superglobales que existen son las siguientes:
    - $GLOBALS: es un array asociativo que contiene las referencias de todas las variables creadas en un archivo PHP.
    - $_SERVER: es un array que contiene informacion de las ubicaciones , rutas, cabeceras de los script y es creado por el servidor web.
    - $_GET: es un array asociativo que contiene los datos enviados a traves URL que emplean el metodo GET
    - $_POST: es un array asociativo que contiene los datos enviados a traves URL que emplean el metodo POST
    - $_FILES: es un array asociativo de elementos subidos al script en curso a traves del metodo POST.
    - $_COOKIE: es un array asociativo de variables pasadas al script actual a traves de Cookies HTTP.
    - $_SESSION: es un array asociativo que contiene variables de sesión disponibles para el script actual.
    - $_REQUEST: es un array asociativo que por defecto contiene el contenido de las variables superglobales: $_GET, $_POST y $_COOKIE.
    - $_ENV: es un array asociativo que contiene todas las variables de entornos creadas en tu script que normalmente son las variables globales.
    */

    // Ejemplo de uso de la variable superglobal $_SERVER
    echo 'Dirección Ip del servidor: '. $_SERVER['SERVER_ADDR'];
    echo '<br>Nombre del servidor: '. $_SERVER['SERVER_NAME'];
    echo '<br>Ruta del archivo que estamos ejecutando: '. $_SERVER['SCRIPT_FILENAME'];
?>