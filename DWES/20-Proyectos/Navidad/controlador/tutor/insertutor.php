<?php

    include "../../config/funciones/conexionBBDD.php";

    if(isset($_POST["enviar"])){


        if(empty($_POST["login"]) || empty($_POST["password"]) || empty($_POST["email"]) || empty($_POST["userName"]) || empty($_POST["subName"])){
            $error = "Debes rellenar todos los campos";
            header("Location:../../vista/registrar.php?error=$error");
        }else{
            $login = $_POST["login"];
            $password = $_POST["password"];
            $correo = $_POST["email"];
            $nombre = $_POST["userName"];
            $apellidos = $_POST["subName"];

            $con = connectBBDD();

            $sql = "insert into tutores (login,password,correo,nombre,apellidos,tipo_usu,baja,activar) values(:login,:password,:correo,:nombre,:apellidos,2,0,0)";

            try{
                $stmt = $con -> prepare($sql);

                $stmt -> bindValue(":login",$login,PDO::PARAM_STR);
                $stmt -> bindValue(":password",password_hash($password,PASSWORD_DEFAULT),PDO::PARAM_STR);
                $stmt -> bindValue(":correo",$correo,PDO::PARAM_STR);
                $stmt -> bindValue(":nombre",$nombre,PDO::PARAM_STR);
                $stmt -> bindValue(":apellidos",$apellidos,PDO::PARAM_STR);

                if($stmt -> execute()){
                    $con = null;
                    header("Location:../../vista/index.php");
                }
            }catch(PDOException $e){
                echo $e -> getMessage();
            }
        }
    }
    
?>