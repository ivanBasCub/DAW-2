<?php

include "../../config/funciones/conexionBBDD.php";
$con = connectBBDD();
// Sentencia SQL
$sql = "update proyecto set baja = 1 where id_proyecto = :id";

try{
    $sentencia = $con -> prepare($sql);

    $sentencia -> bindValue(":id",$_GET["id"],PDO::PARAM_INT);

    if($sentencia ->execute()){
        echo "Se ha realizado correctamente la consulta";
        header("Location: ../../vista/proyecto/index.php");
    }else{
        echo "Error en la consulta SQL";
    }
}catch(PDOException $e){
    echo $e -> getMessage();
}