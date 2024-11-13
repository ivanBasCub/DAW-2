<?php

    include "../config/conexion.php";
    include "../config/encabezado.php";
    include "../config/pie.php";

    // Parte Principal del formulario
    start_html("static/modify_data.css");

        echo "<h2>Modifica los datos del alumno</h2>";
        echo "<form action='../../controlador/modificar.php' method='post'>";
        // Conectamos con la BBDD
        $con = connect();

        echo $_GET["id"];
        // Preparamos una query para recoger la información del alumno que se va a modificar
        $query = "select * from alumnos where id_alumn = ?";
        $selectAlumn = $con -> prepare($query);

        $selectAlumn -> bind_param("i",$_GET["id"]);

        if($selectAlumn -> execute()){
            $info = $selectAlumn -> get_result();
            $alumno = $info -> fetch_assoc();
            
            echo "<label>Nombre: </label><input type = 'text' name='nombre' value= '".$alumno["nombre"]."'><br>";
            echo "<label>Primer Apellido: </label><input type = 'text' name='apell1' value= '".$alumno["apellido1"]."'><br>";
            echo "<label>Segundo Apellido: </label><input type = 'text' name='apell2' value= '".$alumno["apellido2"]."'><br>";
            echo "<label>DNI: </label><input type = 'text' name='dni' value= '".$alumno["dni"]."'><br>";
            echo "<label>Telefono: </label><input type = 'tel' name='telefono' value= '".$alumno["telefono"]."'><br>";
            echo "<label>email: </label><input type = 'email' name='email' value= '".$alumno["email"]."'><br>";
            echo "<label>Curso: </label><input type = 'text' name='curso' value= '".$alumno["curso"]."'><br>";
            echo "<input type='hidden' name='id' value='".$_GET["id"]."'>";
            echo "<input type='submit' value='Modificar Alumno'>";

        }
        // Sacamos la información de la consulta y preguntamos 
        $con -> close();
    echo "</form>";

    fin_html();

?>