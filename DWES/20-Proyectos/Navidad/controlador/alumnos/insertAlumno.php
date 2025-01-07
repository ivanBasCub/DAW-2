<?php
    include "../../config/funciones/conexionBBDD.php";
    $con = connectBBDD();

    $sql = "select * from alumnos where dni = :dni";

    try{
        // Preparamos una consulta Select para comprobar si existe en DNI en la BBDD
        $stmt = $con -> prepare($sql);
        $stmt -> bindValue(":dni",$_POST["dni"],PDO::PARAM_STR);
        $stmt -> execute();

        // En el caso de que exista el DNI le saltamos un mensaje de error
        if($stmt -> rowCount() != 0){
            $error = "El DNI ya existe en la base de datos";
            $con = null;
            header("Location:../../vista/alumno/addAlumno.php?loginIndex=$error");
            
        }else{
            // Si no exite le insertamos la consulta correctamente
            $sql = "insert into alumnos (dni,nombre,apellido1,apellido2,email,telefono,curso,baja) values(:dni,:nombre,:apellido1,:apellido2,:email,:telefono,:curso,0)";
            
            $stmt = $con -> prepare($sql);
            $stmt -> bindValue(":dni",$_POST["dni"],PDO::PARAM_STR);
            $stmt -> bindValue(":nombre",$_POST["nombre"],PDO::PARAM_STR);
            $stmt -> bindValue(":apellido1",$_POST["apellido1"],PDO::PARAM_STR);
            $stmt -> bindValue(":apellido2",$_POST["apellido2"],PDO::PARAM_STR);
            $stmt -> bindValue(":email",$_POST["email"],PDO::PARAM_STR);
            $stmt -> bindValue(":telefono",$_POST["telefono"],PDO::PARAM_INT);
            $stmt -> bindValue(":curso",$_POST["curso"],PDO::PARAM_INT);

            if($stmt -> execute()){
                $con = null;
                header("Location: ../../vista/alumno/index.php");
            }
        }

        $con = null;
    }catch(PDOException $e){
        echo $e -> getMessage();
    }
?>