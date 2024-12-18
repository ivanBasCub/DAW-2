<?php

include "../config/conexionPDO.php";
$con = conexion();
// Sentencia SQL
$sql = "delete from proyecto where id_proyecto = :id";

try{
    $sentencia = $con -> prepare($sql);

    $sentencia -> bindValue(":id",$_GET["id"],PDO::PARAM_INT);

    if($sentencia ->execute()){
        echo "Se ha realizado correctamente la consulta";
        header("Location: ../../vista/index.php");
    }else{
        echo "Error en la consulta SQL";
    }
}catch(PDOException $e){
    echo $e -> getMessage();
}