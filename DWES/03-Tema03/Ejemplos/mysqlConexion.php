<?php
    // "10.195.136.22", "admin", "aaa111!!!", "pruebas"

    $conexion = mysqli_connect("10.195.136.22","admin","aaa111!!!","pruebas");

    // Comprobación de la conexion
    if(mysqli_connect_errno()){
        echo "Fallo al conectar a MySQL: " . mysqli_connect_error();
        exit();
    }
    
    echo "<h1>Bienvenid@ a MySQL!!</h1>";

    $consulta ="select * from persona";
    // Realizar la consulta y guardar el resultado de la consulta en una variable 
    $listaPersonas = mysqli_query($conexion,$consulta);
