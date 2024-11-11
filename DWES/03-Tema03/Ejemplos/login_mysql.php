<?php
    // Constantes con la información del servidor, el usuario y la BBDD que vamos a usar
    const IP_SERVER = "10.195.136.22";
    const DB_USER_NAME = "admin";
    const DB_USER_PASSWORD = "aaa111!!!";
    const DB_DATABASE_NAME = "pruebas";
    
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
    
