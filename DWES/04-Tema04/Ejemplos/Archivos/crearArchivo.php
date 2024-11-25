<?php

$nomArchive = "archivo.txt";



// Es para abrir un fichero
/*
    Modos de apertura
    - r: Apertura para lectura. Puntero al principio del archivo
    - r+: Apertura para lectura y escritura. Puntero al principio del archivo
    - w: Apertura para escritura. Puntero al principio del archivo y lo sobreescribe. Si no existe se intenta crear.
    - w+: Apertura para lectura y escritura. Puntero al principio del archivo y lo sobreescribe. Si no existe se intenta crear.
    - a: Apertura para escritura. Puntero al final del archivo. Si no existe se intenta crear.
    - a+: Apertura para escritura y escritura. Puntero al final del archivo. Si no existe se intenta crear.
*/

$archivo = fopen($nomArchive, 'w');

if($archivo){
    echo "El archivo se abrio correctamente";
    fclose($archivo);
}else{
    echo "No se puede abrir";
}