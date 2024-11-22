<?php

$nomArchive = "archivo.txt";

$archivo = fopen($nomArchive, 'r');

if($archivo){
    echo "El archivo se abrio correctamente";
    fclose($archivo);
}else{
    echo "No se puede abrir";
}