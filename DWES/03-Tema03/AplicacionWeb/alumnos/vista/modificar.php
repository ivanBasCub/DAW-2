<?php

    include "../config/conexion.php";
    include "../config/encabezado.php";
    include "../config/pie.php";

    // Parte Principal del formulario
    start_html("../static/index.css");

        echo "<h2>Modifica los datos del alumno</h2>";
        echo "<form action='../../controlador/modificar.php' method='post'>";
        // Conectamos con la BBDD
        $con = connect();

        // Preparamos una query para recoger la información del alumno que se va a modificar
        $query = "select * from alumnos where id_alumn = ?";
        $selectAlumn = $con -> prepare($query);

        $selectAlumn -> bind_param("i",$_GET["id"]);

        if($selectAlumn -> execute()){
            $info = $selectAlumn -> get_result();
            $alumno = $info -> fetch_assoc();
            
            echo "<label>Nombre: </label><br><input type = 'text' name='nombre' value= '".$alumno["nombre"]."'><br>";
            echo "<label>Primer Apellido: </label><br><input type = 'text' name='apell1' value= '".$alumno["apellido1"]."'><br>";
            echo "<label>Segundo Apellido: </label><br><input type = 'text' name='apell2' value= '".$alumno["apellido2"]."'><br>";
            echo "<label>DNI: </label><br><input type = 'text' name='dni' value= '".$alumno["dni"]."'><br>";
            echo "<label>Telefono: </label><br><input type = 'tel' name='telefono' value= '".$alumno["telefono"]."'><br>";
            echo "<label>Email: </label><br><input type = 'email' name='email' value= '".$alumno["email"]."'><br>";
            echo "<label>Curso: </label><br><input type = 'text' name='curso' value= '".$alumno["curso"]."'><br>";
            echo "<input type='hidden' name='id' value='".$_GET["id"]."'>";
            echo "<input type='submit' value='Modificar Alumno' class='btn'>";

        }
        // Sacamos la información de la consulta y preguntamos 
        $con -> close();
    echo "</form>";
    echo "<a href='../index.php' class='btn'>Volver a la pagina principal</a>";
    fin_html();

?>