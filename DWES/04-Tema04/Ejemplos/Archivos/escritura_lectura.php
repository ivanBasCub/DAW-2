<?php

function escritura_fwrite($filePath, $texto){
    $file = fopen($filePath, "w");

    fwrite($file,$texto);
    fclose($file);
}

function leer_fread($filePath){
    $file = fopen($filePath, "r");
    // filesize devuelve el tamaño del archivo
    $content = fread($file, filesize($filePath));
    echo $content;

    fclose($file);
}

$filePath = "matriz.txt";

leer_fread($filePath);