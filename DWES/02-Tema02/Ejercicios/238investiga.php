<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Ivan Bascones Cubillo">
        <title>Investigacion</title>
    </head>
    <body>
        <?php
            /*
            investiga las siguientes funciones de cadena (explica para qué sirven mediante comentarios, y programa un pequeño ejemplo de cada una de ellas): ucwords, strrev, str_repeat y md5.
            */
            // Función ucwords
            /*
                La función ucwords cada vez que les pases un string la primera letra de cada palabra es convertida a mayusculas mientras que sea un caracter alfanumerico
            */
            // Ejemplo
            $frase = "buenos dias";
            echo ucwords($frase);
            echo "<hr>";
            // Función strrev
            /*
                La función strrev inverte la cadena string
            */
            // Ejemplo
            echo strrev($frase);
            echo "<hr>";
            // Función str_repeat
            /*
                La función str_repeat devuelve repetidas veces el string introducido
            */
            // Ejemplo
            $num = 2;
            echo str_repeat($frase,$num);
            echo "<hr>";
            // Función md5
            /*
                La función md5 calcula el hash MD5 del string que se le introducza. 
            */
            // Ejemplo
            echo md5($frase);

        ?>
    </body>
</html>