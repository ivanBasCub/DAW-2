<?php

    include "../config/conexion.php";

    // Preparamos la conexion SQL
    $con = connect();

    // Preparamos la consulta SQL
    $query = "delete from alumnos where id_alumn = ?";
    $delete = $con -> prepare($query);

    $delete -> bind_param("i",$_GET["id"]);
    
    // Ejecutamos la consulta SQL
    $delete ->execute();

    header("Location: ../../vista/index.php");

    $con -> close();