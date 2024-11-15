<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar un registro de una tabla</title>
</head>
<body>
    <?php
        include "../conexion.php";
        // Nos conectamos con la base de datos
        $con = connect();

        // Preparamos la consulta SQL
        $query = "update pruebas.personas set nombre = ? where id_persona = ?";
        $modPersona = $con -> prepare($query);

        // Recogemos la información del formulario y lo preparamos para ejecutar la consulta
        $id_persona = 3; // $_POST["nombre de la variable"];
        $new_name = "Jose";
        
        $modPersona -> bind_param("si",$new_name,$id_persona);
        // Ejecutamos la consulta
        $modPersona -> execute();
    ?>
</body>
</html>