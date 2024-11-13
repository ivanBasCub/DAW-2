<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar informacion</title>
</head>
<body>
    <?php
        include "../con_mysql.php";
        // Nos conectamos con la base de datos
        $con = connect();

        // Preparamos la consulta SQL
        $query = "select * from pruebas.personas where id_persona = ?";
        $conltPersona = $con -> prepare($query);

        // Recogemos la información del formulario y lo preparamos para ejecutar la consulta
        $id_persona = 3; // $_POST["nombre de la variable"];
        $conltPersona -> bind_param("i",$id_persona);

        // Ejecutemos la consulta y mostramos la información que contiene
        if($conltPersona -> execute()){
            $lista = $conltPersona -> get_result();
            $persona = $lista -> fetch_assoc();
            if(!$persona){
                echo "No hay registros de esa persona";
            }else{
                echo "Nombre de la persona: ". $persona["nombre"] . "<br>Edad de la persona: " . $persona["edad"];
            }
        }else{

        }
    ?>
</body>
</html>