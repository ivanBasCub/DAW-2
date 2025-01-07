<?php

    include "../../config/funciones/conexionBBDD.php";

    // Es una funcion que prepara la consulta SQL
    function prepareTutor($con,$sql,$data){
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":login", $data["login"]);
        if($data["password"] != ""){
            $stmt->bindParam(":password", password_hash($data["password"], PASSWORD_DEFAULT));
        }
        $stmt->bindParam(":nombre", $data["name"]);
        $stmt->bindParam(":apellidos", $data["subname"]);
        $stmt->bindParam(":correo", $data["email"]);
        $stmt->bindParam(":id", $data["id"]);
        return $stmt;
    }

    // Comprobamos si ha llegado la informacion del formulario
    if(isset($_POST["enviar"])){
        $con = connectBBDD();

        // Preparamos dos consultas SQL
        $sql1 = "update tutores set login = :login, password = :password, nombre = :nombre, apellidos = :apellidos, correo = :correo where id_tutor = :id";
        $sql2 = "update tutores set login = :login, nombre = :nombre, apellidos = :apellidos, correo = :correo where id_tutor = :id";
        $sql3 = "update tutores set activar = :activar where id_tutor = :id";
        try{
            // Comprobamos si se ha activado o desactivado el tutor
            if(isset($_POST["activar"])){
                $stmt = $con->prepare($sql3);
                $stmt->bindParam(":activar", $_POST["activar"]);
                $stmt->bindParam(":id", $_POST["id"]);
                $stmt->execute();
            }
            // Comprobamos si se ha introducido una nueva contraseña
            if($_POST["password"] != ""){
                $stmt = prepareTutor($con,$sql1,$_POST);
            }else{
                $stmt = prepareTutor($con,$sql2,$_POST);
            }

            $stmt->execute();

            // Redirigimos al usuario al menu principal
            if($_POST["type"] == 1){
                header("Location:../../vista/tutor/index.php");
            }else{
                header("Location:../../vista/index_tutor.php");
            }
           
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }

        $con = null;
    }

?>