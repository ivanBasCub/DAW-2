<?php

    include "../../config/funciones/conexionBBDD.php";

    // Comprobamos si ha llegado la informacion del formulario
    if($_GET["id"] != ""){
        $con = connectBBDD();

        // Creamos la consulta SQL para borrar el tutor
        $sql = "update tutores set baja = 1 where id_tutor = :id";

        try{
            $stmt = $con->prepare($sql);
            $stmt->bindParam(":id", $_GET["id"]);
            $stmt->execute();

            // Redirigimos al usuario al menu principal
            header("Location:../../vista/tutor/index.php");
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }

        $con = null;
    }
?>