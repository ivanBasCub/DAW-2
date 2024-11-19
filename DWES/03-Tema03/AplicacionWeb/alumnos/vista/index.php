<?php
    include "../config/conexion.php";
    include "../config/encabezado.php";
    include "../config/pie.php";

    // Función para mostrar datos de la BBDD en la tabla
    function data_BBDD(){
        $con = connect();

        // Preparamos la consulta SQL
        $query = "select * from alumnos";
        $conSelect = $con -> prepare($query);

        // Ejecutamos la consulta SQL
        if($conSelect -> execute()){
            $lista = $conSelect -> get_result();
            $alumno = $lista -> fetch_assoc();
            if(!$alumno){
                exit();
            }
            while($alumno != null || $alumno != null){
                echo "<tr>";
                    echo "<td>".$alumno["dni"]."</td>";
                    echo "<td>".$alumno["nombre"]."</td>";
                    echo "<td>". $alumno["apellido1"] ." ". $alumno["apellido2"] ."</td>";
                    echo "<td>".$alumno["telefono"]."</td>";
                    echo "<td>".$alumno["email"]."</td>";
                    echo "<td>".$alumno["curso"]."</td>";
                    echo "<td> <a href= 'modificar.php/?id=".$alumno["id_alumn"]."' class='btn'><img src='img/pencil.svg'></a> </td>";
                    echo "<td>  <a href= 'confirmacion.php/?id=".$alumno["id_alumn"]."' class='btn'><img src='img/trash.svg'></a>  </td>";
                echo "</tr>";
                $alumno = $lista -> fetch_assoc();
            }

        }
        // Cerramos la Conexion a la BBDD
        $con -> close();
    }

    // Parte Principal de la página
    start_html("static/index.css");
    echo "<table>";
        echo "<thead>";
            echo "<th>DNI</th>";
            echo "<th>Nombre</th>";
            echo "<th>Apellidos</th>";
            echo "<th>Telefono</th>";
            echo "<th>Email</th>";
            echo "<th>Curso</th>";
            echo "<th>Modificar</th>";
            echo "<th>Eliminar</th>";
        echo "</thead>";
        // Mostramos aqui la información de la BBDD
        data_BBDD();

    echo "</table>";

    echo "<a href='insertar.html' class='btn'> <img src='img/plus-circle.svg'> Agregar </a>";
    fin_html();

?>