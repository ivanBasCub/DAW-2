<?php
    // DOS formas para realizar consultas select con el PDO
    include "conexionPDO.php";
    $conexion = conexion();


    try{
        // Preparamos la consulta SQL y los parametros
        $sql = "insert into personas (nombre,edad) values (:nombre,:edad)"; 
        $nombre = "Ana";
        $edad = 37;

        $sentencia = $conexion -> prepare($sql);
        // Se pueden preparar igual con bindValue
        $sentencia -> bindParam(":nombre",$nombre, PDO::PARAM_STR);
        $sentencia -> bindParam(":edad",$edad, PDO::PARAM_INT);

        // Ejecutamos la consulta
        if($sentencia -> execute()){
            echo "Se ha ejecutado correctamente";
        }else{
            echo "No se han podido insertar los datos";
        }

    }catch(PDOException $e){
        echo $e -> getMessage();
    }

$conexion = null;