<?php

    function createUsers($con){
        
        // Creamos los datos de los usuario
        $userName1 = "admin";
        $userName2 = "Ivan";
        $pwUser1 = password_hash("aaa111!!!",PASSWORD_DEFAULT);
        $pwUser2 = password_hash("Godofredo",PASSWORD_DEFAULT);

        // Creamos la sentencia SQL
        $sql = "insert into users(usuario, password, tipo_usu) values(:usuario, :password, :tipo_usu)";

        try{

            // Preparamos la sentencia SQL
            $stmt = $con -> prepare($sql);

            // Preparamos los valores para la primera inserccion de datos
            insertData($stmt,$userName1,$pwUser1,1);

            // Ejecutamos la consulta SQL
            $stmt -> execute();

            insertData($stmt,$userName2,$pwUser2,2);

            $stmt -> execute();
            // Preparamos los valores de la segunda inserccion

        }catch(PDOException $e){
            echo $e -> getMessage();
        }
    }

    function insertData($stmt,$user,$pass,$type_user){
        $stmt -> bindValue(":usuario",$user,PDO::PARAM_STR);
        $stmt -> bindValue(":password",$pass,PDO::PARAM_STR);
        $stmt -> bindValue(":tipo_usu",$type_user,PDO::PARAM_INT);
    }

?>