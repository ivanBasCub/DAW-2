<?php

function lectura_archivo_1($filePath){
     // Nos aseguramos que el archivo exista
     if(file_exists($filePath)){
        // Abrir el archivo para lectura
        $file = fopen($filePath,"r");

        if($file){
            echo "Lectura fila por fila:";
            // Para leer fila tras fila del contenido del archivo
            while(!feof($file)){
                // Leer cada linea con el comando fscanf
                fscanf($file,"%d %d %d",$num1,$num2,$num3);
                echo "<br> $num1, $num2, $num3";
            }
            fclose($file);
        }else{
            echo "No se puedo abrir el archivo";
        }
    }else{
        echo "Archivo no encontrado.";
    }
}

function lectura_archivo_2($filePath){
    // file_get_contents devuelve una cadena con el contenido
    $contenido = file_get_contents($filePath);
    echo "Contenido del fichero: $contenido<br>";
    // file_put_contents escribe datos en un fichero
    $res = file_put_contents("fichero_salida.txt","Fichero creado con file_put_contents");
    if($res){
        echo "Fichero creado con exito";
    }else{
        echo "Error al crear el fichero";
    }
}

// MAIN
    // Ruta del archivo
    $filePath = "matriz.txt";

    lectura_archivo_1($filePath);
    lectura_archivo_2($filePath);

   