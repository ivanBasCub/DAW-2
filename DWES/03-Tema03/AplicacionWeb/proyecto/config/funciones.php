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
                    echo "<td>".moduloName($proyecto -> modulo1,$con)." / ".moduloName($proyecto -> modulo2,$con)." / ".moduloName($proyecto -> modulo3,$con)."</td>";
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
        echo $e -> getMessage();
    }
}

// Funcion para filtrar los nombres de los modulos que llegan de renderContentTable
function moduloName($id,$con){
    $sql = "select siglas from modulos where id_modulo = :id";

    try{
        $stmt = $con -> prepare($sql);
        $stmt -> setFetchMode(PDO::FETCH_OBJ);
        $stmt -> bindValue(":id",$id,PDO::PARAM_INT);
        $stmt -> execute();

        $modulo = $stmt -> fetch();
        if($modulo -> siglas != ""){
            return $modulo -> siglas;
        }else{
            return "";
        }

    }catch(PDOException $e){
        echo $e -> getMessage();
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

// Funcion renderizar el formulario de modificar
function renderFormMod($id){
    $con = conexion();
    
    $sql = "select * from proyecto where id_proyecto = :id";

    try{
        $stmt = $con -> prepare($sql);
        $stmt -> setFetchMode(PDO::FETCH_OBJ);
        $stmt -> bindValue(":id",$id,PDO::PARAM_INT);
        $stmt -> execute();

        if($stmt -> rowCount() != 0){
            $proyecto = $stmt -> fetch();
            echo "<label>Titulo del Proyecto</label><br>";
            echo "<input type='text' name='titulo' value='". $proyecto -> titulo ."'><br>";
            echo "<label>Descripcion del Proyecto</label><br>";
            echo "<input type='text' name='descripcion' value='". $proyecto -> descripcion ."'><br>";
            echo "<label>Periodo del Proyecto</label><br>";
            echo "<input type='text' name='periodo' value='". $proyecto -> periodo ."'><br>";
            echo "<label>Curso</label><br>";
            echo "<input type='text' name='curso' value='". $proyecto -> curso ."'><br>";
            echo "<label>Fecha de presentación del proyecto</label><br>";
            echo "<input type='date' name='fecha' value='". $proyecto -> fecha_presentacion ."'><br>";
            echo "<label>Alumno encargado del proyecto</label><br>";
            echo "<select name='alumno'>";
                select_alumnos();
            echo "</select><br>";
            echo "<label>Modulos</label><br>";
            echo "<label>Modulo 1: </label>";
            echo "<select name='mod1'>";
                select_modulos();
            echo "</select>";
            echo "<label>Modulo 2: </label>";
            echo "<select name='mod2'>";
                select_modulos();
            echo "</select>";
            echo "<label>Modulo 3: </label>";
            echo "<select name='mod3'>";
                select_modulos();
            echo "</select><br>";
            echo "<label>Logotipo del proyecto</label><br>";
            echo "<input type='file' name='logo' accept='image/png'><br>";
            echo "<button class='btn'>Actualizar el usuario</button>";
        }else{
            echo "<h1>No hay registros de este Proyecto</h1>";
        }

    }catch(PDOException $e){
        echo $e -> getMessage();
    }
    
    echo "<input type='hidden' name='id' value='". $id ."'>";
    $con = null;
}