<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Ivan Bascones Cubillo">
        <title>Numeros Aleatorios</title>
    </head>
    <body>
        <?php
            // Creamos un array aleatorio de 33 elementos
            $lista=[];
            $size = 33;
            $media = 0;
            for ($i=0; $i < $size; $i++) { 
                $num = random_int(0,100);
                array_push($lista,$num);
                $media += $num;
            }

            echo "<p> El valor máximo es: ".max($lista) ."</p>";
            echo "<p> El valor minimo es: ". min($lista) ."</p>";
            echo "<p> La media es: ". $media / $size ."</p>";
        ?>
    </body>
</html>