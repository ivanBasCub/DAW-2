<?php

    include_once "../../config/funciones/conexionBBDD.php";
    include "../../config/funciones/funcionesProyecto.php";
    
    if(isset($_POST["enviar"])){
        $con = connectBBDD();

        // Sentencia sql
        $sqlInsert = "insert into proyecto(titulo,descripcion,periodo,curso,fecha_presentacion,nota,logotipo,pdf,modulo1,modulo2,modulo3,alumno,tutor,baja) values(:titulo, :descripcion, :periodo, :curso, :fecha_presentacion, :nota, :logotipo, :pdf, :modulo1, :modulo2, :modulo3, :alumno,:tutor,0)";

        try{
            $stmt = $con -> prepare($sqlInsert);
            // Preparamos los valores a insertar en la tabla
            $stmt -> bindValue(":titulo",$_POST["titulo"],PDO::PARAM_STR);
            $stmt -> bindValue(":descripcion",$_POST["descripcion"],PDO::PARAM_STR);
            $stmt -> bindValue(":periodo",$_POST["periodo"],PDO::PARAM_STR);
            $stmt -> bindValue(":curso",$_POST["curso"],PDO::PARAM_STR);
            $stmt -> bindValue(":fecha_presentacion",$_POST["fecha"],PDO::PARAM_STR);
            $stmt -> bindValue(":nota",$_POST["nota"],PDO::PARAM_STR);
            $stmt -> bindValue(":logotipo",file_get_contents($_FILES["logo"]["tmp_name"]),PDO::PARAM_LOB);
            $stmt -> bindValue(":modulo1",$_POST["mod1"],PDO::PARAM_INT);
            $stmt -> bindValue(":modulo2",$_POST["mod2"],PDO::PARAM_INT);
            $stmt -> bindValue(":modulo3",$_POST["mod3"],PDO::PARAM_INT);
            $stmt -> bindValue(":alumno",$_POST["alumno"],PDO::PARAM_INT);
            $stmt -> bindValue(":tutor",$_POST["tutor"],PDO::PARAM_INT);
            $stmt -> bindValue(":pdf",pdf_conversion($con,$_FILES,$_POST),PDO::PARAM_STR);

            if($stmt ->execute()){
                echo "Se ha realizado correctamente la consulta";
                header("Location: ../../vista/proyecto/index.php");
            }else{
                echo "Error en la consulta SQL";
            }
            
        }catch(PDOException $e){
            echo $e -> getMessage();
        }
    }


    
    $con = null;

?>