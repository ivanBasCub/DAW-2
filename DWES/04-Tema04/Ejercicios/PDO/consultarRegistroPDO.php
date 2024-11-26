<?php
    // DOS formas para realizar consultas select con el PDO
    include "conexionPDO.php";
    $conexion = conexion();
    $id = 2;
    try{
        $sql = "select * from personas where id_persona = :id";

        $sentencia = $conexion -> prepare($sql);
        $sentencia -> bindParam(":id",$id, PDO::PARAM_INT);
        $sentencia -> setFetchMode(PDO::FETCH_ASSOC);
        $sentencia -> execute();

        if($sentencia -> rowCount() != 0){
            while($fila = $sentencia -> fetch()){
                echo "ID:" . $fila["id_persona"] . "<br>";
                echo "Nombre:" . $fila["nombre"] . "<br>";
                echo "Edad:" . $fila["edad"] . "<br>";
            }
        }else{
            echo "No hay registros disponibles";
        }

        
    }catch(PDOException $e){
        echo $e -> getMessage();
    }


$conexion = null;