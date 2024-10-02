<?php
    /* declaración de variables */
    $entero = 4; // tipo integer
    $numero = 4.5;   // tipo coma flotante
    $cadena = "cadena"; // tipo cadena de caracteres
    $bool = true; //tipo booleano
    /* Indicamos el nombre, contenido y tipo de cada variable */ 
    echo 'Nombre de la variable: ' . '$entero, Contenido: ' . $entero . ', Tipo de variable: ' . gettype($entero);
    echo '<br> Nombre de la variable: ' . '$numero, Contenido: ' . $numero . ', Tipo de variable: ' . gettype($numero);
    echo '<br> Nombre de la variable: ' . '$cadena, Contenido: ' . $cadena . ', Tipo de variable: ' . gettype($cadena);
    echo '<br> Nombre de la variable: ' . '$bool, Contenido: ' . $bool . ', Tipo de variable: ' . gettype($bool);

    /* cambio de tipo de una variable */
    echo "<br>";
    $a = 5; // entero
    echo gettype($a); // imprime el tipo de dato de a
    echo "<br>";
    $a = "Hola"; // cambia a cadena
    echo gettype($a); // se comprueba que ha cambiado
