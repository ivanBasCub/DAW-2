<?php

include "conexionPDO.php";

$con = conexion();

try{
    $sql = "insert into proyecto (titulo, logotipo) values (:titulo,:logotipo)";

    $sentencia = $con -> prepare($sql);

    $titulo = "Naturaleza";
    $logotipo = file_get_contents("https://th.bing.com/th/id/OIP.Fvlkg9xUsG_E1FfqUQ7TXgHaEo?rs=1&pid=ImgDetMain");

    $sentencia -> bindParam(":titulo",$titulo,PDO::PARAM_STR);
    $sentencia -> bindParam(":logotipo",$logotipo,PDO::PARAM_LOB);
    $sentencia -> execute();


}catch(PDOException $e){
    echo $e -> getMessage();
}
$con = null;