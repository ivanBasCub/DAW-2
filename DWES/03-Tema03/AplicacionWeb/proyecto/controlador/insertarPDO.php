<?php

    include "../config/conexionPDO.php";
    $con = conexion();

    // Sentencia sql
    $sqlInsert = "insert into proyecto(titulo,descripcion,periodo,curso,fecha_presentacion,nota,logotipo,modulo1,modulo2,modulo3,alumno) values(:titulo, :descripcion, :periodo, :curso, :fecha_presentacion, :nota, :logotipo, :modulo1, :modulo2, :modulo3, :alumno)";

    try{
        // Preparamos la sentencia sql 
        $sentencia = $con -> prepare($sqlInsert);

        // Parametros
        $sentencia -> bindValue(":titulo",$_POST["titulo"],PDO::PARAM_STR);
        $sentencia -> bindValue(":descripcion",$_POST["descripcion"],PDO::PARAM_STR);
        $sentencia -> bindValue(":periodo",$_POST["periodo"],PDO::PARAM_STR);
        $sentencia -> bindValue(":curso",$_POST["curso"],PDO::PARAM_STR);
        $sentencia -> bindValue(":fecha_presentacion",$_POST["fecha"],PDO::PARAM_STR);
        $sentencia -> bindValue(":nota",$_POST["nota"],PDO::PARAM_STR);
        $sentencia -> bindValue(":logotipo",file_get_contents($_FILES["logo"]["tmp_name"]),PDO::PARAM_LOB);
        $sentencia -> bindValue(":modulo1",$_POST["mod1"],PDO::PARAM_INT);
        $sentencia -> bindValue(":modulo2",$_POST["mod2"],PDO::PARAM_INT);
        $sentencia -> bindValue(":modulo3",$_POST["mod3"],PDO::PARAM_INT);
        $sentencia -> bindValue(":alumno",$_POST["alumno"],PDO::PARAM_INT);

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
