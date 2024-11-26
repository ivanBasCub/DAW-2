<?php
    // Cargamos la libreria de php
    require("PDO/conexionPDO.php");
    // Cargamos el archivo q vamos almacenar la informacion
    $fileName = "listadoPersonas.txt";

    // Creamos el archivo
    $file = fopen($fileName,"w");

    
    // Noss conectamos con la BBDD
    $con = conexion();

    // Preparamos la consulta SQL
    $sql = "select * from personas";
    
    try{
        $sentencia = $con -> prepare($sql);
        $sentencia -> setFetchMode(PDO::FETCH_OBJ);
        $sentencia -> execute();

        if($sentencia -> rowCount() != 0){
            for ($i=0; $i < $sentencia -> rowCount(); $i++) {
                $persona = $sentencia -> fetch();
                fwrite($file, $persona -> id_persona);
                fwrite($file, "; ");
                fwrite($file, $persona -> nombre);
                fwrite($file, "; ");
                fwrite($file, $persona -> edad);
                fwrite($file, " / ");
            }

        }

    }catch(PDOException $e){
        echo $e -> getMessage();
    }


    fclose($file);