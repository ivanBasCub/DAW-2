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
                <form method="post" action="">
                    <label>Mi altura:</label><input type="number" name="altura"><br>
                    <input type="submit" name="boton" value="Enviar">
                </form>
                <?php
                    // Creamos el array asociativo
                    $personas = array(
                        "Felipe" => 1.75,
                        "Angela" => 1.87,
                        "Ivan" => 2.01,
                        "Godofredo" => 1.48,
                        "Luis" => 1.67
                    );

                    //Creamos la variable que contiene nuestra altura
                    $mialtura = $_POST['altura'];

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
                    echo "<hr>";

                    if($mialtura > ($contador / count($personas))){
                        echo "<p>Estoy por encima de la media</p>";
                    }else{
                        echo "<p>Estoy por encima de la media</p>";
                    }

                ?>
            </tbody>
        </table>

    </body>
</html>