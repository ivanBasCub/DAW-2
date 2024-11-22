<?php

    include "../config/conexionPDO.php";
    $con = conexion();

    // Sentencia sql
    $sql = "insert into proyecto(titulo,descripcion,periodo,curso,fecha_presentacion,nota,logotipo) values(:titulo, :descripcion, :periodo, :curso, :fecha_presentacion, :nota, :logotipo)";
    
    try{
        // Preparamos la sentencia sql 
        $sentencia = $con -> prepare($sql);

        // Parametros
        $sentencia -> bindValue(":titulo",$_POST["titulo"],PDO::PARAM_STR);
        $sentencia -> bindValue(":descripcion",$_POST["descripcion"],PDO::PARAM_STR);
        $sentencia -> bindValue(":periodo",$_POST["periodo"],PDO::PARAM_STR);
        $sentencia -> bindValue(":curso",$_POST["curso"],PDO::PARAM_STR);
        $sentencia -> bindValue(":fecha_presentacion",$_POST["fecha"],PDO::PARAM_STR);
        $sentencia -> bindValue(":nota",$_POST["nota"],PDO::PARAM_STR);
        $sentencia -> bindValue(":logotipo",$_POST["logo"],PDO::PARAM_LOB);
        

        if($sentencia ->execute()){
            echo "Se ha realizado correctamente la consulta";
            header("Location: ../vista/index.php");
        }else{
            echo "Error en la consulta SQL";
        }

    }catch(PDOException $e){
        echo $e -> getMessage();
    }
    $con = null;
