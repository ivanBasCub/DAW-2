<?php
    include "conexionBBDD.php";

    // Funcion para crear un formulario con los datos editables del tutor
    function formDataTutor($id,$type){
        $con = connectBBDD();

        // Creamos la consulta sql para obtener los datos del tutor
        $sql = "select * from tutores where id_tutor = :id";

        try{
            $stmt = $con->prepare($sql);
            $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
            $stmt -> setFetchMode(PDO::FETCH_OBJ);
            $stmt -> execute();
            
            $tutor = $stmt->fetch();

            // Mostramos la informacion editable del tutor y el resto de datos no se mostraran
            echo "<form action='../../controlador/tutor/modtutor.php' method='post'>";
                echo "<label for='name'>Nombre:</label><br>";
                echo "<input type='text' name='name' value='$tutor->nombre' required><br>";
                echo "<label for='subname'>Apellidos:</label><br>";
                echo "<input type='text' name='subname' value='$tutor->apellidos' required><br>";
                echo "<label for='login'>Nombre de usuario:</label><br>";
                echo "<input type='text' name='login' value='$tutor->login' required><br>";
                echo "<label for='password'>Nueva Contraseña:</label><br>";
                echo "<input type='password' name='password'><br>";
                echo "<label for='email'>Correo Electronico:</label><br>";
                echo "<input type='email' name='email' value='$tutor->correo' required><br>";
                if($type == 1){
                    echo "<label for='activar'>Estado:</label><br>";
                    echo "<select name='activar'>";
                        echo "<option value='1'>Activado</option>";
                        echo "<option value='0'>Desactivado</option>";
                    echo "</select><br>";
                }
                echo "<input type='hidden' name='id' value='$tutor->id_tutor'>";
                echo "<input type='hidden' name='type' value='$type'>";
                echo "<input type='submit' name='enviar' value='Actualizar los datos' class='btn'>";
            echo "</form>";

            // Boton para volver al menu principal
            if($type == 1){
                echo "<a href='index.php' class='btn'>Volver al menu principal</a>";
            }else{
                echo "<a href='../index_tutor.php' class='btn'>Volver al menu principal</a>";
            }
            
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
        $con = null;
    }

    // Funcion para crear una tabla con todos los datos de los tutores y con las opciones posibles de edicion para q el administrador pueda modificarlos a su gusto
    function renderTableTutor(){
        $con = connectBBDD();

        // Creamos la consulta sql para obtener todos los datos de los tutores
        $sql = "select * from tutores where tipo_usu = 2";

        try{
            // Preparamos la consulta sql
            $stmt = $con->prepare($sql);
            $stmt -> setFetchMode(PDO::FETCH_OBJ);
            
            if($stmt->execute()){
                echo "<table>";
                    echo "<tr>";
                        echo "<th>Nombre</th>";
                        echo "<th>Apellidos</th>";
                        echo "<th>Nombre de usuario</th>";
                        echo "<th>Correo Electronico</th>";
                        echo "<th>Activada</th>";
                        echo "<th>Baja</th>";
                        echo "<th>Editar</th>";
                        echo "<th>Eliminar / Recuperar </th>";
                    echo "</tr>";

                    $tutores = $stmt->fetchAll();
                    // En el caso de que no haya tutores en la base de datos
                    if($tutores == null){
                        echo "<tr>";
                            echo "<td colspan='7'>No hay tutores en la base de datos</td>";
                        echo "</tr>";
                    }else{
                        // Mostramos los datos de los tutores
                        foreach ($tutores as $tutor) {
                            // En el caso de que un tutor este dado de baja no se mostrara en la tabla
                                echo "<tr>";
                                    echo "<td>" . $tutor -> nombre ."</td>";
                                    echo "<td>" . $tutor -> apellidos ."</td>";
                                    echo "<td>" . $tutor -> login ."</td>";
                                    echo "<td>" . $tutor -> correo ."</td>";
                                    if($tutor -> activar == 1){
                                        echo "<td>Si</td>";
                                    }else{
                                        echo "<td>No</td>";
                                    }
                                    if($tutor -> baja == 1){
                                        echo "<td>Si</td>";
                                    }else{ 
                                        echo "<td>No</td>";
                                    }
                                    echo "<td><a href=modtutor.php?id=". $tutor -> id_tutor ."' class='btn'><img src='../static/img/pencil.svg'></a></td>";
                                    
                                    if($tutor -> baja == 1){
                                        echo "<td><a href='../../controlador/tutor/activetutor.php?id=". $tutor -> id_tutor ."' class='btn'><img src='../static/img/check-square.svg'></a></td>";
                                    }else{
                                        echo "<td><a href='../../controlador/tutor/deletetutor.php?id=". $tutor -> id_tutor ."' class='btn'><img src='../static/img/trash.svg'></a></td>";
                                    }
                                echo "</tr>";
                        }
                    }
                echo"</table>";
            }

            // Boton para volver al menu principal
            echo "<a href='../index_tutor.php' class='btn'>Volver al menu principal</a>";

        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }

        $con = null;
    }
?>