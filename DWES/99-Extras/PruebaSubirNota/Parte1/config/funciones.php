<?php

include "conexionPDO.php";

// Funcion para escribir la tabla
function renderContentTable(){
    $con = conexion();
            
    $sql = "select * from rebajas_ivan";

    try{
        $sentencia = $con -> prepare($sql);
        $sentencia -> setFetchMode(PDO::FETCH_OBJ);
        $sentencia -> execute();

        if($sentencia -> rowCount() != 0){
            for ($i=0; $i < $sentencia -> rowCount(); $i++) { 
                $prenda = $sentencia -> fetch();
                echo "<tr>";
                    echo "<td>". $prenda -> prenda ."</td>";
                    echo "<td>". $prenda -> precio ."</td>";
                    if($prenda -> rebajada == 1){
                        echo "<td> Si </td>"; 
                    }else{
                        echo "<td> No </td>";
                    }
                    echo "<td>". $prenda -> rebaja ." % </td>"; 
                    echo "<td> <img src='data:image/png;base64, ".base64_encode($prenda -> foto)."' width = '50px' height='50px'></td>"; 
                    echo "<td> <a href= 'modificar.php?id=". $prenda -> id_prenda ."' class='btn'><img src='img/pencil.svg'></a> </td>";
                    echo "<td>  <a href= 'confirmacion.php?id=".$prenda -> id_prenda."' class='btn'><img src='img/trash.svg'></a>  </td>";
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

// Funcion renderizar el formulario de modificar
function renderFormMod($id){
    $con = conexion();
    
    $sql = "select * from rebajas_ivan where id_prenda = :id";

    try{
        $stmt = $con -> prepare($sql);
        $stmt -> setFetchMode(PDO::FETCH_OBJ);
        $stmt -> bindValue(":id",$id,PDO::PARAM_INT);
        $stmt -> execute();

        if($stmt -> rowCount() != 0){
            $prenda = $stmt -> fetch();
            echo "<label>Nombre de la prenda</label><br>";
            echo "<input type='text' name='prenda' value='". $prenda -> prenda ."'><br>";
            echo "<label>Precio de la prenda</label><br>";
            echo "<input type='number' name='precio' value='". $prenda -> precio ."'><br>";
            echo "<label>Esta rebajada la prenda</label><br>";
            echo "<select name='rebajada'>";
                echo "<option value='1'>Si</option>";
                echo "<option value='0'>No</option>";
            echo "</select><br>";
            echo "<label>Porcentaje de Rebaja</label><br>";
            echo "<input type='number' name='rebaja' value='". $prenda -> rebaja ."'><br>";
            echo "<label>Foto de la prenda</label><br>";
            echo "<input type='file' name='imagen' accept='image/png'><br>";
            echo "<button class='btn'>Actualizar prenda</button>";
        }else{
            echo "<h1>No hay registros de este Proyecto</h1>";
        }

    }catch(PDOException $e){
        echo $e -> getMessage();
    }
    
    echo "<input type='hidden' name='id' value='". $id ."'>";
    $con = null;
}