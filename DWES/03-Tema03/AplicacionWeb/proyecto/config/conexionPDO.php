<?php

    function conexion(){
        $servidor = 'mysql:dbname=gestion_alumnos;host=localhost';
        $usuario = 'root';
        $pw = '';

        try{
            $conexion = new PDO($servidor,$usuario,$pw);
            $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Falló la conexion: " . $e -> getMessage();
        }

        return $conexion;
    }
    
    // Para cerrar la conexion hay q poner $conexion = null;
?>