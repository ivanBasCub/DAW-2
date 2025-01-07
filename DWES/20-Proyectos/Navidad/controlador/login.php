<?php
    // Librerias de funciones necesarias
    include_once "../config/funciones/conexionBBDD.php";
    include "../config/funciones/funciones.php";

    // Main
    // Comprobamos si se ha pulsado el boton de enviar
    if(isset($_POST["enviar"])){
        $user = $_POST["username"];
        $pass = $_POST["userpass"];

        if(empty($user) || empty($pass)){
            $error = "Debes introducir un usuario y contraseña";
            header("Location:../vista/index.php?loginIndex=$error");
        }else{
                    // Creamos la conexion a la BBDD
            $con = connectBBDD();

            // Preparamos la sentencia SQL
            $sql = "select * from tutores where login = :user";

            try{
                $stmt = $con -> prepare($sql);

                $stmt -> bindValue(":user",$user,PDO::PARAM_STR);
                $stmt -> setFetchMode(PDO::FETCH_OBJ);
                $stmt -> execute();

                if($stmt -> rowCount() == 0){
                    $error = "El usuario $user no existe";
                    errorMsg($error);
                }else{
                    $usu = $stmt -> fetch();
                    // Comprobamos si el usuario esta dado de baja
                    if($usu -> baja == 1){
                        $error = "El usuario $user esta dado de baja";
                        errorMsg($error);
                    }else{
                        // Comprobamos si la contraseña es correcta
                        if(password_verify($pass,$usu -> password)){
                            // Creamos la sesion
                            session_start();
                            $_SESSION["user"] = $user;
                            $_SESSION["pass"] = $usu -> pasword;
                            $_SESSION["id"] = $usu -> id_tutor;
                            $_SESSION["type"] = $usu -> tipo_usu;
    
                            // Comprobamos el tipo de usuario
                            if($usu -> tipo_usu == 1){
                                $con = null;
                                header("Location:../vista/index_admin.php");
                            }else{
                                if($usu -> activar == 0){
                                    $error = "El usuario $user no esta activado";
                                    errorMsg($error);
                                }else{
                                    $con = null;
                                    header("Location:../vista/index_tutor.php");
                                }
                            }
                        }else{
                            $error = "La contraseña es incorrecta";
                            errorMsg($error);
                        }
                    }

                }
            }catch(PDOException $e){
                echo $e -> getMessage();
            }

            $con = null;
        }
    }else{
        $error = "Primero tienes que loguearte";
        errorMsg($error);
    }
?>