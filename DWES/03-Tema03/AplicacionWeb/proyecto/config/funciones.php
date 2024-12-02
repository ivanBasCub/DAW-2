<?php

include "conexionPDO.php";

// Funcion para escribir la tabla
function renderContentTable(){
    $con = conexion();
            
    $sql = "select * from proyecto";

    try{
        $sentencia = $con -> prepare($sql);
        $sentencia -> setFetchMode(PDO::FETCH_OBJ);
        $sentencia -> execute();

        if($sentencia -> rowCount() != 0){
            for ($i=0; $i < $sentencia -> rowCount(); $i++) { 
                $proyecto = $sentencia -> fetch();
                echo "<tr>";
                    echo "<td>". $proyecto -> titulo ."</td>";
                    echo "<td>". $proyecto -> descripcion ."</td>"; 
                    echo "<td>". $proyecto -> periodo ."</td>"; 
                    echo "<td>". $proyecto -> curso ."</td>"; 
                    echo "<td>". $proyecto -> fecha_presentacion ."</td>"; 
                    echo "<td>". alumnoName($proyecto -> alumno,$con) ."</td>";
                    echo "<td>"."</td>";
                    echo "<td> <img src='data:image/png;base64, ".base64_encode($proyecto -> logotipo)."' width = '50px' height='50px'></td>"; 
                    echo "<td>"."</td>";
                    echo "<td>". $proyecto -> nota ."</td>"; 
                    echo "<td> <a href= 'modificar.php?id=". $proyecto -> id_proyecto ."' class='btn'><img src='img/pencil.svg'></a> </td>";
                    echo "<td>  <a href= 'confirmacion.php?id=".$proyecto -> id_proyecto."' class='btn'><img src='img/trash.svg'></a>  </td>";
                echo "</tr>";
            }
        }else{
            echo "<td colspan='10'><h1>No hay registros</h1></td>";
        }
    }catch(PDOException $e){
        echo "<td colspan='10'><h1>ERROR</h1></td>";
        echo $e -> getMessage();
    }
    $con = null;
}

// Funciones para filtrar los datos que llegan de renderContentTable
function alumnoName($id,$con){

    $sql2 = "select nombre from alumnos where id_alumn = :id";
    
    try{
        $sentencia2 = $con -> prepare($sql2);
        $sentencia2 -> setFetchMode(PDO::FETCH_OBJ);
        $sentencia2 -> bindValue(":id",$id,PDO::PARAM_INT);
        $sentencia2 -> execute();

        $alumno = $sentencia2 -> fetch();
        if($alumno -> nombre != ""){
            return $alumno -> nombre;
        }else{
            return "";
        }
        
    }catch(PDOException $e){

    }

}


// Funcion para rellenar el menu de alumnos
function select_alumnos(){

    $con = conexion();
            
    $sql = "select id_alumn, nombre from alumnos";

    try{
        $sentencia = $con -> prepare($sql);
        $sentencia -> setFetchMode(PDO::FETCH_OBJ);
        $sentencia -> execute();

        if($sentencia -> rowCount() != 0){
            for ($i=0; $i < $sentencia -> rowCount(); $i++) { 
                $alumno = $sentencia -> fetch();
                echo "<option value='". $alumno -> id_alumn ."'>". $alumno -> nombre ."</option>";
            }
        }
    }catch(PDOException $e){
        echo $e -> getMessage();
    }
    $con = null;
}

// Función para rellenar el menu de modulos
function select_modulos(){
    $con = conexion();
    $sql = "select * from modulos";

    try{
        $sentencia = $con -> prepare($sql);
        $sentencia -> setFetchMode(PDO::FETCH_OBJ);
        $sentencia -> execute();
        if($sentencia -> rowCount() != 0){
            for ($i=0; $i < $sentencia -> rowCount(); $i++) { 
                $modulo = $sentencia -> fetch();
                echo "<option value='". $modulo -> id_modulo ."'>(". $modulo -> siglas .") ". $modulo -> nombre ."</option>";
            }
        }
    }catch(PDOException $e){
        echo $e -> getMessage();
    }
    $con = null;
}

