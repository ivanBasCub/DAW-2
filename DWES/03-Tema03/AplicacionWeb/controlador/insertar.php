<?php

    include "../config/conexion.php";
    
    // Preparamos la conexión con la BBDD
    $con = connect();

    // Preparamos la sentencia SQL
    $query = "insert into alumnos(dni,nombre,apellido1,apellido2,email,telefono,curso) values(?,?,?,?,?,?,?)";
    $conInsert = $con -> prepare($query);
    // Introducimos los parametros
    $conInsert -> bind_param("sssssis", $_POST["dni"], $_POST["nombre"], $_POST["apellido1"], $_POST["apellido2"], $_POST["email"], $_POST["telefono"], $_POST["curso"]);

    if($conInsert->execute()){
        $con -> close();
        header("Location: ../vista/index.php");
    
    }else{
        echo $con -> error;
    }

    $con -> close();