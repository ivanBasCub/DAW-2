<?php
    include "../../config/conexionBBDD.php";
    include "../../config/html/encabezado.php";
    include "../../config/html/encabezado.php";
    $con = connectBBDD();

    $sql = "select * from alumnos where dni = :dni";

    try{
        // Preparamos una consulta Select para comprobar si existe en DNI en la BBDD
        $stmt = $con -> prepare($sql);
        $stmt -> bindValue(":dni",$_POST["dni"],PDO::PARAM_STR);
        $stmt -> execute();

        // En el caso de que exista el DNI le saltamos un mensaje de error
        if($stmt -> rowCount() != 0){
            startHtml("");
            echo "<h2>El DNI que estas introduciendo en este alumno ya exite en la BBDD</h2>";
            echo "<a href='../vista/insertar.html' class='btn'>Volver a la página principal</a>";
            endHtml();
            
        }else{
            // Si no exite le insertamos la consulta correctamente
            $sql = "insert into alumnos (dni,nombre,apellido1,apellido2,email,telefono,curso) values(:dni,:nombre,:apellido1,:apellido2,:email,:telefono,:curso)";
            
            $stmt = $con -> prepare($sql);
            $stmt -> bindValue(":dni",$_POST["dni"],PDO::PARAM_STR);
            $stmt -> bindValue(":dni",$_POST["nombre"],PDO::PARAM_STR);
            $stmt -> bindValue(":dni",$_POST["apellido1"],PDO::PARAM_STR);
            $stmt -> bindValue(":dni",$_POST["apellido2"],PDO::PARAM_STR);
            $stmt -> bindValue(":dni",$_POST["email"],PDO::PARAM_STR);
            $stmt -> bindValue(":dni",$_POST["telefono"],PDO::PARAM_INT);
            $stmt -> bindValue(":dni",$_POST["curso"],PDO::PARAM_INT);

            if($stmt -> execute()){
                $con = null;
                header("Location: ");
            }
        }

        $con = null;
    }catch(PDOException $e){
        echo $e -> getMessage();
    }
?>