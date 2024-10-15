<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Ivan Bascones Cubillo">
        <title>Funcion Potencia</title>
    </head>
    <body>
        <?php
            function potencias($base, $exponente = 2){
                return $base ** $exponente;
            }

            // main
            $num1 = 4;
            $num2 = 3;
            // Probamos la funcion
            
            echo potencias($num1). "<br>";
            echo potencias($num1,$num2);
        ?>
    </body>
</html>