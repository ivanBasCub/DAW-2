<?php
    $array_prueba = ["uno","patata","pera","verdura"];

    // El comando var_dump() muestra toda la información sobre el array y el contenido del array
    echo var_dump($array_prueba)."<br>";

    // El comando array_slice() puedes extraer parte del contenido de un array creado previamente
    $array2 = array_slice($array_prueba,2,2);
    echo var_dump($array2)."<br>";
    
    // El comando array_merge() es para unificar dos o más arrays en uno solo
    $array3 = array_merge($array_prueba,$array2);
    echo var_dump($array3)."<br>";

    // El comando array_shift() es para eliminar el primero elemento de un array
    array_shift($array3);
    echo var_dump($array3). "<br>";

    // El comando array_push() es para añadir un elemento nuevo al final de un array
    $fin = "Fin del array";
    array_push($array2, $fin);
    echo var_dump($array2)."<br>";
?>