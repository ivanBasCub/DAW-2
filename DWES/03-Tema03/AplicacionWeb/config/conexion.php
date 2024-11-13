<?php
    // Constantes con la información del servidor, el usuario y la BBDD que vamos a usar
    const IP_SERVER = "localhost";
    const DB_USER_NAME = "root";
    const DB_USER_PASSWORD = "";
    const DB_DATABASE_NAME = "gestion_alumnos";
    
    // Fucion para conectarse a la BBDD 
    function connect(){
        $mysql_connect = mysqli_connect(IP_SERVER, DB_USER_NAME, DB_USER_PASSWORD, DB_DATABASE_NAME);

        // Comprobación de la conexion
        if(mysqli_connect_errno()){
            echo "Fallo al conectar a MySQL: " . mysqli_connect_error();
            exit();
        }
        
        return $mysql_connect;
    }