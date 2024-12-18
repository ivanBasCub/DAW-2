<?php
include "../config/encabezado.php";
include "../config/conexionPDO.php";


start_html("../vista/static/index.css");

$con = conexion();
// Sentencia SQL
$sql = "delete from tareas where id_tarea = :id";

try{
    $sentencia = $con -> prepare($sql);

    $sentencia -> bindValue(":id",$_POST["id"],PDO::PARAM_INT);

    if($sentencia ->execute()){
        echo "<h1>Se ha eliminado correctamente la tarea</h1>";
            echo "<form method='post' action='../vista/index.php'>";
                echo "<input type='hidden' name='user' value='".$_POST["user"]."'>";
                echo "<input type='hidden' name='pass' value='".$_POST["pass"]."'>";
                echo "<input type='submit' value='Volver a la página principal' class='btn'>";
            echo "</form>";
    }else{
        echo "Error en la consulta SQL";
    }
}catch(PDOException $e){
    echo $e -> getMessage();
}