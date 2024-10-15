<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Ivan Bascones Cubillo">
        <title>Array Pares</title>
    </head>
    <body>
    <?php
        // Funcion que comprueba si un numero es par o impar
        function esPar($num){
            if ($num % 2 == 0){
                return true;
            }else{
                return false;
            }
        }

        // Funcion que crea un array aleatorio de numeros
        function arrayAleatorio($size, $min, $max){
            $array = [];
            for($i = 0; $i < $size; $i++){
                $array[] = random_int($min,$max);
            }

            return $array;
        }
        // Funcion que comprueba los numeros pares y los que no sean los cambia a cero
        function arrayPares(&$array){
            $total = 0;
            for ($i=0; $i < count($array); $i++) { 
                if(esPar($array[$i])==true){
                    $total += 1;
                    $array[$i] = 0;
                }else{
                    $array[$i] = 0;
                }
            }

            return $total;
        }

        // Probamos las funciones
        $lista = arrayAleatorio(10,1,20);

        // Mostramos la informacion del array por pantalla
        echo "<p>".var_dump($lista)."</p>";
        
        // Comprobamos la siguiente funcion
        echo "<p> Hay ". arrayPares($lista) ." numeros pares.</p>";
        echo "<hr>";

        // Volvemos a mostrar el array si ha cambiado algo
        echo "<p>".var_dump($lista)."</p>";
    ?>
    </body>
</html>

