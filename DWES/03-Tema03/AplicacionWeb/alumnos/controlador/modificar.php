<?php

    include "../config/conexion.php";

    // Conectamos con la BBDD
    $con = connect();
    
    // Perparamos la query
    $query = "update alumnos set dni = ?, nombre = ?, apellido1 = ?, apellido2 = ?, email = ?, telefono = ?, curso = ? where id_alumn = ?";
    $update = $con -> prepare($query);

    $update -> bind_param("sssssiii", $_POST["dni"],$_POST["nombre"],$_POST["apell1"],$_POST["apell2"],$_POST["email"],$_POST["telefono"],$_POST["curso"],$_POST["id"]);

    // Ejecutamos la consulta 
    $update -> execute();

    header("Location: ../vista/index.php");
    
    $con -> close();
?>