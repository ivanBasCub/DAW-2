<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Ivan Bascones Cubillo">
        <title>Matematicas</title>
    </head>
    <body>
        <?php
            // Funcion para contar los digitos de un numero
            function digitos($num){
                return strlen($num);
            }
            // Funcion para mostrar el numero dentro de la posicion que deseas
            function digitoN($num,$pos){
                return (int)("".$num)[$pos];
            }

            function quitarporDetras($num,$cant){
                for ($i=0; $i < $cant; $i++) { 
                    $num = $num /10;
                }
                return (int)$num;
            }
            function quitarporDelante($num,$cant){
                return (int)strrev(quitarporDetras(strrev($num),$cant));
            }

            echo digitos(7841) . "<br>";
            echo digitoN(94651,4). "<br>";
            echo quitarporDetras(16548974,3). "<br>";
            echo quitarporDelante(6548965456,5). "<br>";

        ?>
    </body>
</html>