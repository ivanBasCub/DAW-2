<?php
    include "conexionPDO.php";
    $conexion = conexion();


    try{
        $sql = "delete from personas where nombre = :nombre";
        $nombre = "Ana";

        $sentencia = $conexion -> prepare($sql);
        $sentencia -> bindParam(":nombre",$nombre, PDO::PARAM_STR);
        
        if($sentencia -> execute()){
            echo "Se ha ejecutado la consulta correctamente<br>Numero de filas afectadas: ";
            echo $sentencia ->rowCount();
        }else{
            echo "No se ha ejecurado la consulta";
        }

    }catch(PDOException $e){
        echo $e -> getMessage();
    }

$conexion = null;