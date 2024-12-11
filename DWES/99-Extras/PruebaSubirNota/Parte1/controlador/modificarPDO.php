<?php

    include "../config/conexionPDO.php";
    $con = conexion();

    $sqlUpdate = "Update rebajas_ivan set prenda = :prenda, foto = :foto, precio = :precio, rebajada = :rebajada, rebaja = :rebaja where id_prenda = :id";

    try{

        $stmt = $con -> prepare($sqlUpdate);

        // Parametros
        $stmt -> bindValue(":id",$_POST["id"],PDO::PARAM_INT);
        $stmt -> bindValue(":prenda",$_POST["prenda"],PDO::PARAM_STR);
        $stmt -> bindValue(":foto",file_get_contents($_FILES["imagen"]["tmp_name"]),PDO::PARAM_LOB);
        $stmt -> bindValue(":precio",$_POST["precio"],PDO::PARAM_INT);
        $stmt -> bindValue(":rebajada",$_POST["rebajada"],PDO::PARAM_INT);

        if($_POST["rebajada"] == 1){
            $stmt -> bindValue(":rebaja",$_POST["rebaja"],PDO::PARAM_INT);
        }else{
            $stmt -> bindValue(":rebaja",0,PDO::PARAM_INT);
        }

        if($stmt ->execute()){
            echo "Se ha realizado correctamente la consulta";
            header("Location: ../vista/index.php");
        }else{
            echo "Error en la consulta SQL";
        }
    }catch(PDOException $e){
        echo $e -> getMessage();
    }

    $con = null;
?>