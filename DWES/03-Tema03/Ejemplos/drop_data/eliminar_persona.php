<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar un registro de una tabla</title>
</head>
<body>
    <?php
        include "../con_mysql.php";
        // Nos conectamos con la base de datos
        $con = connect();

        // Preparamos la consulta SQL
        $query = "delete from pruebas.personas where id_persona = ?";
        $delPersona = $con -> prepare($query);

        // Recogemos la información del formulario y lo preparamos para ejecutar la consulta
        $id_persona = 1; // $_POST["nombre de la variable"];
        $delPersona -> bind_param("i",$id_persona);

        // Ejecutamos al consulta
        $delPersona -> execute();
    ?>
</body>
</html>