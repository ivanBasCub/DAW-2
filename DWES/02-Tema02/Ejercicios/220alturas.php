<!DOCTYPE html>
<html lang="en">
    <head>  
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Ivan Bascones Cubillo">
        <title>Alturas</title>
    </head>
    <body>
        <table border="1">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Altura</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Creamos el array asociativo
                    $personas = array(
                        "Felipe" => 1.75,
                        "Angela" => 1.87,
                        "Ivan" => 2.01,
                        "Godofredo" => 1.48,
                        "Luis" => 1.67
                    );

                    //Creamos una variable para almacenar los valores de la altura y sumarlos
                    $contador = 0;
                    foreach($personas as $persona => $altura){
                        echo "<tr>";
                            echo "<td>".$persona."</td>";
                            echo "<td>".$altura."</td>";
                        echo "</tr>";
                        $contador += $altura;
                    }
                    echo "<tr>";
                        echo "<td> Media </td>";
                        echo "<td>".$contador / count($personas)."</td>";
                    echo "</tr>";
                ?>
            </tbody>
        </table>

    </body>
</html>