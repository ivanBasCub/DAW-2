<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Ivan Bascones Cubillo">
        <title>Paramentros variables</title>
    </head>
    <body>
        <?php
            // Funcion para comprobar el numero mas grande entre todos
            function mayor(){
                $num_list = func_get_args();
                $max = 0;
                for ($i=0; $i < count($num_list); $i++) { 
                    if($max < $num_list[$i]){
                        $max = $num_list[$i];
                    }
                }

                return $max;
            }
            // Funcion para concatenar las frases que nos pasen como paramentro
            function concatenar(){
                $lista_frases = func_get_args();
                $frase = "";
                for ($i=0; $i < count($lista_frases); $i++) { 
                    $frase = $frase . " ". $lista_frases[$i];
                }
                return $frase;
            }
            // Main
            echo "<p> El numero mas grande es: ".mayor(1,43,52,9,12,14,60,1)."</p>";
            echo "<hr>";
            echo concatenar("Buenos","dias","por","la","mañana");
        ?>
    </body>
</html>