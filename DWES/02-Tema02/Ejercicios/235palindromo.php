<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Ivan Bascones Cubillo">
        <title>Palindromo</title>
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
            
            // Creamos las siguientes variables
            $inversefrase = "";
            $nomalfrase = "";
            // Quitamos los espacios de la frase o la palabra
            $auxfrase = strtolower(implode(str_word_count($frase,1)));

            // En el caso de que haya tildes tendriamos que hacer una funcion para quitar la tilde de esa palabra o frase
            // Invertimos la frase
            for ($i=strlen($nomalfrase) -1; $i >= 0; $i--) { 
                $inversefrase = $inversefrase . $nomalfrase[$i];
            }

            // Comprobamos si son iguales
            if ($inversefrase == $nomalfrase){
                echo "La frase o palabra: '$frase' es un palindromo";
            }else{
                echo "La frase o palabra: '$frase'  no es un palindromo";
            }


        ?>
    </body>
</html>