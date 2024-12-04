<?php
    
    include "conexionPDO.php";
    $conexion = conexion();


    try{
        // Preparamos la consulta SQL y los parametros
        $sql = "update personas set nombre = :nombre_new where nombre = :nombre_old"; 
        $nombre_old = "Ana";
        $nombre_new = "Andalucia";

        $sentencia = $conexion -> prepare($sql);
        // Se pueden preparar igual con bindValue
        $sentencia -> bindParam(":nombre_new",$nombre_new, PDO::PARAM_STR);
        $sentencia -> bindParam(":nombre_old",$nombre_old, PDO::PARAM_STR);

        // Ejecutamos la consulta
        if($sentencia -> execute()){
            echo "Se ha ejecutado correctamente<br>Numero de filas afectadas: ";
            echo $sentencia ->rowCount();
        }else{
            echo "No se han podido insertar los datos";
        }

    }catch(PDOException $e){
        echo $e -> getMessage();
    }

$conexion = null;