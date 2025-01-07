<?php

    include "../../config/funciones/conexionBBDD.php";

    // Comprobamos si ha llegado la informacion del formulario
    if($_GET["id"] != ""){
        $con = connectBBDD();

        // Creamos la consulta SQL para borrar el tutor
        $sql = "update alumnos set baja = 0 where id_alumn = :id";

        try{
            $stmt = $con->prepare($sql);
            $stmt->bindParam(":id", $_GET["id"]);
            $stmt->execute();

            // Redirigimos al usuario al menu principal
            header("Location:../../vista/alumno/index.php");
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }

        $con = null;
    }
?>