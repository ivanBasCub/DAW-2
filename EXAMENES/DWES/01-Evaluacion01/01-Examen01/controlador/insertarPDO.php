<?php

    include "../config/conexionPDO.php";
    $con = conexion();

    // Sentencia sql
    $sql1 = "Select * from tareas where titulo = :titulo";
    $sql2 = "insert into tareas(titulo, descripcion, fecha, prioridad, img_tarea, realizada) values(:titulo, :descripcion, :fecha, :prioridad, :img_tarea, :realizada)";
    
    try{
        $sentencia1 = $con -> prepare($sql1);
        $sentencia1 -> bindValue(":titulo",$_POST["titulo"],PDO::PARAM_STR);
        $sentencia1 ->execute();
        if($sentencia1 -> rowCount() == 0){
            // Preparamos la sentencia sql 
            $sentencia = $con -> prepare($sql2);

            // Parametros
            $sentencia -> bindValue(":titulo",$_POST["titulo"],PDO::PARAM_STR);
            $sentencia -> bindValue(":descripcion",$_POST["descripcion"],PDO::PARAM_STR);
            $sentencia -> bindValue(":fecha",$_POST["fecha"],PDO::PARAM_STR);
            $sentencia -> bindValue(":prioridad",$_POST["prioridad"],PDO::PARAM_STR);
            $sentencia -> bindValue(":img_tarea",file_get_contents($_FILES["img_tarea"]["tmp_name"]),PDO::PARAM_LOB);
            $sentencia -> bindValue(":realizada",$_POST["realizada"] ,PDO::PARAM_INT);
        

            if($sentencia ->execute()){
                echo "<h1>Se ha insertardo correctamente la nueva tarea</h1>";
                echo "<form method='post' action='../vista/index.php'>";
                    echo "<input type='hidden' name='user' value='".$_POST["user"]."'>";
                    echo "<input type='hidden' name='pass' value='".$_POST["pass"]."'>";
                    echo "<input type='submit' value='Volver a la página principal' class='btn'>";
                echo "</form>";
            }else{
                echo "Error en la consulta SQL";
            }
        }else{
            echo "<h1>No puede haber dos tareas con el mismo nombre</h1>";
                echo "<form method='post' action='../vista/insertar.php'>";
                    echo "<input type='hidden' name='user' value='".$_POST["user"]."'>";
                    echo "<input type='hidden' name='pass' value='".$_POST["pass"]."'>";
                    echo "<input type='submit' value='Volver' class='btn'>";
                echo "</form>";
        }
        

    }catch(PDOException $e){
        echo $e -> getMessage();
    }
    $con = null;
