<?php
    include_once "conexionBBDD.php";
    include "fpdf/fpdf.php";

    function renderTableProyecto($type,$id){
        $con = connectBBDD();

        // Creamos las consultas sql que necesitamos
        $sql_admin = "select * from proyecto";


        echo "<table>";
            echo "<tr>";
                echo "<th>Titulo</th>";
                echo "<th>Descripcion</th>";
                echo "<th>Autor</th>";
                echo "<th>Periodo</th>";
                echo "<th>Curso</th>";
                echo "<th>Fecha de Presentacion</th>";
                echo "<th>Modulos</th>";
                echo "<th>Logotipo</th>";
                echo "<th>Documentacion</th>";
                echo "<th>Nota</th>";
                if($type == 1){
                    echo "<th>Tutor</th>";
                    echo "<th>Editar</th>";
                    echo "<th>Eliminar/Recuperar</th>";
                }else{
                    echo "<th>Editar</th>";
                }
            echo "</tr>";
            try{
                if($type == 1){
                    $stmt = $con->prepare($sql_admin);
                    $stmt -> setFetchMode(PDO::FETCH_OBJ);
                    $stmt -> execute();

                    $proyectos = $stmt->fetchAll();

                    if($proyectos == null){
                        echo "<tr>";
                            echo "<td colspan='13'><h1>No hay proyectos en la base de datos</h1></td>";
                        echo "</tr>";
                    }else{
                        dataProyectos($proyectos,$type,$con);
                    }
                }else{
                    $sql_tutor ="select * from proyecto where tutor = :id";
                    $stmt = $con->prepare($sql_tutor);
                    $stmt -> setFetchMode(PDO::FETCH_OBJ);
                    $stmt -> bindValue(":id",$id,PDO::PARAM_INT);
                    $stmt -> execute();

                    $proyectos = $stmt->fetchAll();

                    if($proyectos == null){
                        echo "<tr>";
                            echo "<td colspan='11'>No hay proyectos en la base de datos</td>";
                        echo "</tr>";
                    }else{
                        dataProyectos($proyectos,$type,$con);
                    }
                }
            }catch(PDOException $e){
                echo "Error: " . $e->getMessage();
            }

        echo "</table>";

        if($type == 1){
            echo "<a href='../index_admin.php' class='btn'>Volver a la Página Principal</a>";
        }else{
            echo "<a href='../index_tutor.php' class='btn'>Volver a la Página Principal</a>";
        }

        $con = null;
    }

    // Funcion que nos permite mostrar los datos de los proyectos
    function dataProyectos($proyectos,$type,$con){
        foreach($proyectos as $proyecto){
            // En el caso de que el proyecto este dado de baja, no se mostrara en la tabla de los tutores
            if($type == 2 && $proyecto -> baja == 1){

            }else{
                echo "<tr>";
                    echo "<td>" . $proyecto -> titulo ."</td>";
                    echo "<td>" . $proyecto -> descripcion ."</td>";
                    echo "<td>" . nameAlumno($con,$proyecto -> alumno) ."</td>";
                    echo "<td>" . $proyecto -> periodo ."</td>";
                    echo "<td>" . $proyecto -> curso ."</td>";
                    echo "<td>" . $proyecto -> fecha_presentacion ."</td>";
                    echo "<td>" . nameModulo($con,$proyecto -> modulo1). " / " . nameModulo($con,$proyecto -> modulo2). " / " . nameModulo($con,$proyecto -> modulo3) ."</td>";
                    echo "<td> <img src='data:image/png;base64, ".base64_encode($proyecto -> logotipo)."' width = '50px' height='50px'></td>";
                    echo "<td> <a href='". $proyecto -> pdf ."' class='btn'><img src='../static/img/download.svg'>Descargar</a></td>";
                    echo "<td>" . $proyecto -> nota ."</td>";
                    if($type == 1){
                        echo "<td>" . nameTutor($con, $proyecto -> tutor)."</td>";
                        echo "<td> <a href= 'modProyecto.php?id=". $proyecto -> id_proyecto ."' target='_blank' class='btn'><img src='../static/img/pencil.svg'></a> </td>";
                        if($proyecto -> baja == 0){
                            echo "<td>  <a href= '../../controlador/proyecto/deleteProyecto.php?id=".$proyecto -> id_proyecto."' class='btn'><img src='../static/img/trash.svg'></a>  </td>";
                        }else{
                            echo "<td>  <a href= '../../controlador/proyecto/activeProyecto.php?id=".$proyecto -> id_proyecto."' class='btn'><img src='../static/img/check-square.svg'></a>  </td>";
                        }
                    }else{
                        echo "<td> <a href= 'modProyecto.php?id=". $proyecto -> id_proyecto ."' class='btn'><img src='../static/img/pencil.svg'></a> </td>";
                    }
                    
                echo "</tr>";
            }

        }
    }

    // Funcion que nos permite mostrar el nombre de los modulos
    function nameModulo($con,$id){
        $sql = "select siglas from modulos where id_modulo = :id";
        try{
            $stmt = $con->prepare($sql);
            $stmt -> setFetchMode(PDO::FETCH_OBJ);
            $stmt -> bindValue(":id",$id,PDO::PARAM_INT);
            $stmt -> execute();

            $modulo = $stmt -> fetch();
            return $modulo -> siglas;
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }

    function nameAlumno($con,$id){
        $sql = "select nombre, apellido1,apellido2 from alumnos where id_alumn = :id";
        try{
            $stmt = $con->prepare($sql);
            $stmt -> setFetchMode(PDO::FETCH_OBJ);
            $stmt -> bindValue(":id",$id,PDO::PARAM_INT);
            $stmt -> execute();

            $alumno = $stmt -> fetch();
            $result = $alumno -> nombre . " " . $alumno -> apellido1 . " " . $alumno -> apellido2;
            return $result;
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }

    function nameTutor($con,$id){
        $sql = "select nombre from tutores where id_tutor = :id";
        try{
            $stmt = $con->prepare($sql);
            $stmt -> setFetchMode(PDO::FETCH_OBJ);
            $stmt -> bindValue(":id",$id,PDO::PARAM_INT);
            $stmt -> execute();

            $tutor = $stmt -> fetch();
            return $tutor -> nombre;
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }
    // Funcion que nos permite modificar los datos de un proyecto
    function renderFormMod($id,$type){
        $con = connectBBDD();
        
        $sql = "select * from proyecto where id_proyecto = :id";
    
        try{
            $stmt = $con -> prepare($sql);
            $stmt -> setFetchMode(PDO::FETCH_OBJ);
            $stmt -> bindValue(":id",$id,PDO::PARAM_INT);
            $stmt -> execute();
    
            if($stmt -> rowCount() != 0){
                $proyecto = $stmt -> fetch();
                if($type == 1){
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
                    echo "<label>Nota del proyecto</label><br>";
                    echo "<input type='text' name='nota' value='". $proyecto -> nota ."'><br>";
                    echo "<label>Alumno encargado del proyecto</label><br>";
                    echo "<select name='alumno'>";
                        select_alumnos();
                    echo "</select><br>";
                    echo "<label>Tutor encargado del proyecto</label><br>";
                    echo "<select name='tutor'>";
                        select_tutores();
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
                    echo "<label>Documentacion del proyecto</label><br>";
                    echo "<input type='file' name='pdf' accept='file/pdf'><br>";
                }else{
                    echo "<label>Nota del proyecto</label><br>";
                    echo "<input type='text' name='nota' value='". $proyecto -> nota ."'><br>";
                }

                echo "<input type='submit' name='enviar' value='Actualizar el proyecto' class='btn'><br>";
            }else{
                echo "<h1>No hay registros de este Proyecto</h1>";
            }
    
        }catch(PDOException $e){
            echo $e -> getMessage();
        }
        
        echo "<input type='hidden' name='id' value='". $id ."'>";
        echo "<input type='hidden' name='type' value='". $type ."'>";
        $con = null;
    }

    // Funcion para rellenar el menu de alumnos
    function select_alumnos(){

        $con = connectBBDD();   
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
        $con = connectBBDD();
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

    function select_tutores(){
        $con = connectBBDD();
        $sql = "select * from tutores where tipo_usu = 2";

        try{
            $sentencia = $con -> prepare($sql);
            $sentencia -> setFetchMode(PDO::FETCH_OBJ);
            $sentencia -> execute();
            if($sentencia -> rowCount() != 0){
                for ($i=0; $i < $sentencia -> rowCount(); $i++) { 
                    $tutor = $sentencia -> fetch();
                    echo "<option value='". $tutor -> id_tutor ."'>". $tutor -> nombre ."</option>";
                }
            }
        }catch(PDOException $e){
            echo $e -> getMessage();
        }
        $con = null;
    }

    
    function pdf_conversion($con,$pdf,$data){
        $dir = "../../data/proyectos/";
        $uploadFile = $dir . basename($pdf["pdf"]["name"]);

        // Movemos el archivo a la carpeta data
        if(move_uploaded_file($pdf["pdf"]["tmp_name"],$uploadFile)){
            
            $sql = "select nombre, apellido1, apellido2 from alumnos where id_alumn = :id";

            try{
                $stmt = $con -> prepare($sql);
                $stmt -> bindValue(":id",$data["alumno"],PDO::PARAM_INT);
                $stmt -> setFetchMode(PDO::FETCH_OBJ);
                $stmt -> execute();
                $alumno = $stmt -> fetch();

                $filename = $alumno -> nombre . "_" . $alumno -> apellido1 . "_" . $alumno -> apellido2 . "_" . $data["titulo"] . ".pdf";
                rename($uploadFile,$dir . $filename);
                $finalFile = $dir . $filename;
                $con = null;

                return $finalFile;
            }catch(PDOException $e){
                echo $e -> getMessage();
            }
        }else{
            echo "Error al subir el archivo";
            return " ";
        }
    }
?>