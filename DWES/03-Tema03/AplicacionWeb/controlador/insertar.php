<?php

    include "../config/conexion.php";
    include "../config/encabezado.php";
    include "../config/pie.php";
    
    // Preparamos la conexión con la BBDD
    $con = connect();

    // Preparamos la siguiente consulta SQL
    $query = "select * from alumnos where dni = ?";
    $conSelect = $con -> prepare($query);
    $conSelect -> bind_param("s",$_POST["dni"]);
    
    // La ejecutamos y comprobamos si ya existe en el dni en la BBDD
    if($conSelect -> execute()){
        $info = $conSelect -> get_result();
        $total = $info -> num_rows;

        if($total != 0){
            // En el caso de que si exista enviamos el siguiente mensaje
            start_html("../vista/static/index.css");
                echo "<h2>El DNI que estas introduciendo en este alumno ya exite en la BBDD</h2>";
                echo "<a href='../vista/insertar.html' class='btn'>Volver a la página principal</a>";
            fin_html();
        }else{
            // En el caso de que no exista insertamos los datos en la BBDD
            // Preparamos la sentencia SQL
            $query = "insert into alumnos(dni,nombre,apellido1,apellido2,email,telefono,curso) values(?,?,?,?,?,?,?)";
            $conInsert = $con -> prepare($query);
            // Introducimos los parametros
            $conInsert -> bind_param("sssssii", $_POST["dni"], $_POST["nombre"], $_POST["apellido1"], $_POST["apellido2"], $_POST["email"], $_POST["telefono"], $_POST["curso"]);

            if($conInsert->execute()){
                $con -> close();
                header("Location: ../vista/index.php");
            
            }else{
                echo $con -> error;
            }
        }
    }else{
        echo $con -> error;
    }



    

    $con -> close();