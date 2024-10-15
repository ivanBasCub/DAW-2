<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Ivan Bascones Cubillo">
        <title>Frases Impares</title>
    </head>
    <body>
        <form method="post" action="">
            <label>Frase:</label><input type="text" name="frase"><br>
            <input type="submit" name="boton" value="Enviar">
        </form>
        <?php
            if (count($_POST)== 0){
                $frase = "Frase por defecto";
            }else{
                $frase = $_POST["frase"];
            }

            echo "La frase original: $frase";
            echo "<hr>";
            echo "Valores posicionados en las posiciones impares: ";
            // Mostramos los valores impares
            for ($i=1; $i < strlen($frase); $i+=2) { 
                echo $frase[$i] . " ";
            }

        ?>
    </body>
</html>
