<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Ivan Bascones Cubillo">
        <title>Vocales</title>
    </head>
    <body>
        <form method="post" action="">
            <label>Frase:</label><input type="text" name="frase"><br>
            <input type="submit" name="boton" value="Enviar"><hr>
        </form>
        <?php
            // Recogemos la informacion del formulario
            if (count($_POST)== 0){
                $frase = "Frase por defecto";
            }else{
                $frase = $_POST["frase"];
            }
            echo "La frase es: $frase <hr>";

            // Creamos el array con las letras que vamos a comparar
            $vocales = array(
                "A" => 0,
                "E" => 0,
                "I" => 0,
                "O" => 0,
                "U" => 0,
                "Total" => 0
            );

            // Comprobamos todas las letras de la frase y contamos la cantidad de vocales
            for ($i=0; $i < strlen($frase); $i++) {
                switch ($frase[$i]){
                    case (strtolower($frase[$i]) == "a"):
                        $vocales['A'] ++;
                        $vocales['Total']++;
                    break;
                    case (strtolower($frase[$i]) =="e"):
                        $vocales['E'] ++;
                        $vocales['Total']++;
                    break;
                    case (strtolower($frase[$i]) == "i"):
                        $vocales['I'] ++;
                        $vocales['Total']++;
                    break;
                    case (strtolower($frase[$i]) == "o"):
                        $vocales['O'] ++;
                        $vocales['Total']++;
                    break;
                    case (strtolower($frase[$i]) == "u"):
                        $vocales['U'] ++;
                        $vocales['Total']++;
                    break;
                    default:
                }
            }

            echo "<table border = '1'>";
                echo "<tr>";
                    echo "<th colspan='2'>Vocales</th>";
                echo "</tr>";
                foreach($vocales as $vocal => $resultado) { 
                    echo "<tr>";
                        echo "<td>". $vocal ."</td>";
                        echo "<td>". $resultado ."</td>";
                    echo "</tr>";
                }
            echo "</table>";

        ?>
    </body>
</html>