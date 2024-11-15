<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Personas Registradas</title>
</head>
<body>
    <table>
        <thead>
            <th>Id</th>
            <th>Nombre</th>
            <th>Edad</th>
        </thead>
        <?php
            include "../conexion.php";
            
            $con = connect();

            // Preparamos la consulta SQL
            $query = "Select * from pruebas.personas";
            $consultaSelect = $con -> prepare($query);

            // Ejecutamos la consulta
            if($consultaSelect-> execute()){
                $lista = $consultaSelect->get_result();
                $persona = $lista -> fetch_assoc();
                // Creamos una variable auxiliar para contar todas las personas que hay en la BBDD
                $contador = 0;
                while($persona != null || $persona != false){
                    // Lo mostramos por pantalla
                    echo "<tr>";
                        echo "<td>".$persona["id_persona"]."</td>";
                        echo "<td>".$persona["nombre"]."</td>";
                        echo "<td>".$persona["edad"]."</td>";
                    echo "</tr>";
                    $contador++;
                    $persona = $lista -> fetch_assoc();
                }

                echo "<tr>";
                    echo "<td colspan= '2'>Total de registros</td>";
                    echo "<td>".$contador."</td>";
                echo"</tr>";
            }
        ?>
    </table>
    
    
</body>
</html>