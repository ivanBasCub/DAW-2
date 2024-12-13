<?php
    include_once "../config/conexionPDO.php";
    // Comprobamos si llega la informacion
    if(isset($_POST["enviar"])){
        $user = $_POST["user"];
        $pass = $_POST["pass"];

        // Comprobamos si recibimos datos
        if(empty($user) || empty($pass)){
            $error = "Debes introducir un usuario y contraseña";
            include "../vista/index.php";
        }else{
            // Creamos la conexion a la BBDD
            $con = conexion();

            // Preparamos la sentencia SQL
            $sql = "select * from users where usuario = :user";

            try{
                $stmt = $con -> prepare($sql);

                $stmt -> bindValue(":user",$user,PDO::PARAM_STR);
                $stmt -> setFetchMode(PDO::FETCH_OBJ);
                $stmt -> execute();

                if($stmt -> rowCount() == 0){
                    $error = "El usuario $user no existe";
                    $con = null;
                    include "../vista/index.php";
                }else{
                    $usuario = $stmt -> fetch();
                    // Comprobar que la constraseña es la escrita
                    if(password_verify($pass,$usuario-> password)){

                        // Creamos la sesion
                        session_start();
                        $_SESSION["user"] = $user;
                        $_SESSION["pass"] = $usuario-> password;
                        $_SESSION["type"] = $usuario -> tipo_usu;

                        if($usuario -> tipo_usu == 1){
                            $con = null;
                            include "../vista/index_admin.php";
                        }else{
                            $con = null;
                            include "../vista/index_usu.php";
                        }
                    }else{
                        $error = "La contraseña es incorrecta";
                        $con = null;
                        include "../vista/index.php";
                    }
                }

            }catch(PDOException $e){
                echo $e -> getMessage();
            }
        }
    }
?>