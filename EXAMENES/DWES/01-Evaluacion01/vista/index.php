<?php
    include "../config/encabezado.php";
    include "../config/conexionPDO.php";
    include "../config/pie.php";

    start_html("static/index.css");
    // Función para mostrar los datos segun la prioridad 
    function data_bbdd(){
        $con = conexion();
        
        $sql = "select * from tareas order by prioridad";

        try{
            $sentencia = $con -> prepare($sql);
            $sentencia -> setFetchMode(PDO::FETCH_OBJ);
            $sentencia -> execute();

            if($sentencia -> rowCount() != 0){
                for ($i=0; $i < $sentencia -> rowCount(); $i++) { 
                    $tarea = $sentencia -> fetch();
                    echo "<tr>";
                        echo "<td>". $tarea -> titulo ."</td>";
                        echo "<td>". $tarea -> descripcion ."</td>"; 
                        echo "<td>". $tarea -> fecha ."</td>"; 
                        echo "<td>". $tarea -> prioridad ."</td>";
                        echo "<td> <img src='data:image/png;base64, ".base64_encode($tarea -> img_tarea)."' width = '50px' height='50px'></td>"; 
                        if($tarea -> realizada){
                            echo "<td> Terminada </td>";
                        }else{
                            echo "<td> Sin Terminar</td>";
                        }
                        echo "<td>" ;
                            echo "<form method='post' action='modificar.php'>";
                                echo "<input type='hidden' name='user' value='".$_POST["user"]."'>";
                                echo "<input type='hidden' name='pass' value='".$_POST["pass"]."'>";
                                echo "<input type='hidden' name='id' value='".$tarea -> id_tarea."'>";
                                echo "<button class = 'btn'><img src='img/pencil.svg'></button>";
                            echo "</form>";
                        echo "</td>";
                        echo "<td>"; 

                        echo "<form method='post' action='confirmacion.php'>";
                            echo "<input type='hidden' name='user' value='".$_POST["user"]."'>";
                            echo "<input type='hidden' name='pass' value='".$_POST["pass"]."'>";
                            echo "<input type='hidden' name='id' value='".$tarea -> id_tarea."'>";
                            echo "<button class = 'btn'><img src='img/trash.svg'></button>";
                        echo "</form>";
                        
                        echo "</td>";
                    echo "</tr>";
                }
            }else{
                echo "<td colspan='10'><h1>No hay registros</h1></td>";
            }

        }catch(PDOException $e){
            echo $e -> getMessage();
        }
        $con = null;
    }

    // MAIN de la aplicacion

    // Comprobación de que el usuario es correcto
    if($_POST["user"] != "james_bon" || $_POST["pass"] != "007"){
        echo "<h1>Usuario o contraseña no son correctas</h1>";
        echo "<a href='login.php' class='btn'>Volverlo a intentar</a>";
    }else{
        echo "<table>
                <thead>
                    <th>Titulo</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Prioridad</th>
                    <th>Imagen</th>
                    <th>Realizada</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </thead>";
            data_bbdd();
        echo "</table>";

        echo "<form method='post' action='insertar.php'>";
        echo "<input type='hidden' name='user' value='".$_POST["user"]."'>";
        echo "<input type='hidden' name='pass' value='".$_POST["pass"]."'>";
        echo "<input type='submit' value='Agregar una nueva tarea' class='btn'>";
        echo "</form>";
    }

    fin_html();