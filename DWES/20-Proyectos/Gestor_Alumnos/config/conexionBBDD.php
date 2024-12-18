<?php
    function connectBBDD(){
        $servidor = 'mysql:dbname=gestion_alumnos;host=localhost';
        $usuario = 'root';
        $pw = '';

        try{
            $conexion = new PDO($servidor,$usuario,$pw);
            $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Falló en la conexion: " . $e ->getMessage(); 
        }

        return $conexion;
    }
?>