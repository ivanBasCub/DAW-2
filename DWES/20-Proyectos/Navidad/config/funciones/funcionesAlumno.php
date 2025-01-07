<?php
    include "conexionBBDD.php";

    function renderTableAlumnos($type,$id){
        // Creamos la consulta sql para obtener todos los datos de los alumnos
        $con = connectBBDD();

        // Creamos las consultas sql que necesitamos
        $sql_admin = "select * from alumnos";
        
        // Creamos la tabla con la informacion de los alumnos
        echo "<table>";
            echo "<tr>";
                echo "<th>DNI</th>";
                echo "<th>Nombre</th>";
                echo "<th>Apellidos</th>";
                echo "<th>Correo Electronico</th>";
                echo "<th>Telefono</th>";
                echo "<th>Curso</th>";
                // Estas dos columnas solo se mostraran si el tipo de usuario administrador
                if($type == 1){
                    echo "<th>Baja</th>";
                    echo "<th>Editar</th>";
                    echo "<th>Eliminar / Recuperar </th>";
                }
            echo "</tr>";
            try{
                if($type == 1){
                    $stmt = $con->prepare($sql_admin);
                    $stmt -> setFetchMode(PDO::FETCH_OBJ);
                    $stmt -> execute();
                    $alumnos = $stmt->fetchAll();

                    if($alumnos == null){
                        echo "<tr>";
                            echo "<td colspan='7'>No hay alumnos en la base de datos</td>";
                        echo "</tr>";
                    }else{
                        dataAlumnos($alumnos,$type);
                    }
                }else{
                    // Preparamos una segunda consulta sql para obtener los id de los alumnos
                    $sql_idAlumnos = "select distinct alumno from proyecto where tutor = :id";
                    $stmt = $con->prepare($sql_idAlumnos);
                    $stmt -> setFetchMode(PDO::FETCH_OBJ);
                    $stmt -> bindValue(":id",$id,PDO::PARAM_INT);

                    if($stmt -> execute()){
                        $alumnos = $stmt -> fetchAll();
                        if($alumnos == null){
                            echo "<tr>";
                                echo "<td colspan='7'>No hay alumnos en la base de datos</td>";
                            echo "</tr>";
                        }else{
                            foreach ($alumnos as $alumno) {
                                $sql_alumnos = "select * from alumnos where id_alumn = :id";
                                $stmt = $con->prepare($sql_alumnos);
                                $stmt -> setFetchMode(PDO::FETCH_OBJ);
                                $stmt -> bindValue(":id",$alumno -> alumno,PDO::PARAM_INT);
                                $stmt -> execute();
                                $alumnos = $stmt -> fetchAll();
                                dataAlumnos($alumnos,$type);
                            }
                        }
                    }
                }
            }catch(PDOException $e){
                echo "Error: " . $e->getMessage();
            }

        echo "</table>"; 

        if($type == 1){
            echo "<a href='../index_admin.php' class='btn'>Volver al menu principal</a>";
        }else{
            echo "<a href='../index_tutor.php' class='btn'>Volver al menu principal</a>";
        }

        $con = null;
    }



    // Funcion para imprimir los datos de los alumnos en la tabla
    function dataAlumnos($alumnos,$type){
        foreach ($alumnos as $alumno) {
            // En el caso de que un alumno este dado de baja no se mostrara en la tabla
            if($type == 2 && $alumno -> baja == 1){

            }else{
                echo "<tr>";
                echo "<td>" . $alumno -> dni ."</td>";
                echo "<td>" . $alumno -> nombre ."</td>";
                echo "<td>" . $alumno -> apellido1 . " ". $alumno -> apellido2 ."</td>";
                echo "<td>" . $alumno -> email ."</td>";
                echo "<td>" . $alumno -> telefono ."</td>";
                echo "<td>" . $alumno -> curso ."</td>";
                
                if($type == 1){
                    if($alumno -> baja == 1){
                        echo "<td>Si</td>";
                    }else{
                        echo "<td>No</td>";
                    }
                    echo "<td><a href=modAlumno.php?id=". $alumno -> id_alumn ."' class='btn'><img src='../static/img/pencil.svg'></a></td>";
                    if($alumno -> baja == 1){
                        echo "<td><a href='../../controlador/alumnos/activeAlumno.php?id=". $alumno -> id_alumn ."' class='btn'><img src='../static/img/check-square.svg'></a></td>";
                    }else{
                        echo "<td><a href='../../controlador/alumnos/deleteAlumno.php?id=". $alumno -> id_alumn ."' class='btn'><img src='../static/img/trash.svg'></a></td>";
                    }
                }

                echo "</tr>";
            }    
        }
    }

    // Funcion para mostrar el formulario de modificacion de un alumno
    function formModAlumno($id){
        $con = connectBBDD();

        // Creamos la consulta sql para obtener los datos de un alumno
        $sql = "select * from alumnos where id_alumn = :id";

        try {
            $stmt = $con -> prepare($sql);
            $stmt -> setFetchMode(PDO::FETCH_OBJ);
            $stmt -> bindValue(":id",$id,PDO::PARAM_INT);

            $stmt -> execute();
            $alumno = $stmt -> fetch();

            // Creamos el formulario para modificar los datos de un alumno
            echo "<form action='../../controlador/alumnos/modAlumnos.php' method='post'>";
                echo "<label for='dni'>DNI:</label><br>";
                echo "<input type='text' name='dni' value='". $alumno -> dni ."'><br>";
                echo "<label for='nombre'>Nombre:</label><br>";
                echo "<input type='text' name='nombre' value='". $alumno -> nombre ."'><br>";
                echo "<label for='apellido1'>Primer Apellido:</label><br>";
                echo "<input type='text' name='apellido1' value='". $alumno -> apellido1 ."'><br>";
                echo "<label for='apellido2'>Segundo Apellido:</label><br>";
                echo "<input type='text' name='apellido2' value='". $alumno -> apellido2 ."'><br>";
                echo "<label for='email'>Correo Electronico:</label><br>";
                echo "<input type='text' name='email' value='". $alumno -> email ."'><br>";
                echo "<label for='telefono'>Telefono:</label><br>";
                echo "<input type='text' name='telefono' value='". $alumno -> telefono ."'><br>";
                echo "<label for='curso'>Curso:</label><br>";
                echo "<input type='text' name='curso' value='". $alumno -> curso ."'><br>";
                echo "<input type='hidden' name='id' value='". $alumno -> id_alumn ."'><br>";
                echo "<input type='submit' value='Modificar' class='btn'><br>";
            echo "</form>";

             // Boton para volver al menu principal
             echo "<a href='index.php' class='btn'>Volver a Alumnos</a>";

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $con = null;
    }

?>