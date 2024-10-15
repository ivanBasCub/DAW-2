<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Ivan Bascones Cubillo">
        <title>Analizador</title>
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

            // Dividimos la frase en un array
            $frase_array = explode(" ",$frase);
            // Mostramos la cantidad de letras y palabras totales
            echo "La cantidad de letras totales es: ". strlen($frase) . " y la cantidad de palabras es: " . count($frase_array) ."<hr>"; 
            echo "<ul>"; 
            foreach($frase_array as $palabra){
                echo "<li>$palabra: ". strlen($palabra) ."</li>";
            }
            echo "</ul>";
        ?>
    </body>
</html>