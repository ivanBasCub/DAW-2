<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Personas</title>
</head>
<body>
    <?php
        // Realizamos la conexion a la BBDD
        require "../con_mysql.php";
        
        $con = connect();

        // Leemos los datos del formulario
        $nombre = $_POST["name"];
        $edad = $_POST["edad"];

        // Preparamos la consulta SQL
        $query = "insert into pruebas.personas(nombre,edad) value(?,?)"; 
        $consultaInsert = $con -> prepare($query);
        
        // Preparamos los parametros de la consulta SQL
        $consultaInsert -> bind_param('si',$nombre,$edad);
        
        // Ejecutamos la consuta
        if($consultaInsert ->execute()){
            echo "Se ha insertado correctamente la información";
            header("Location: select_personas.php");
        }else{
            echo $con -> error;
        }
    ?>    
</body>
</html>

