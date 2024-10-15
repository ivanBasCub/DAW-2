<!DOCTYPE html>
<html lang="en">
    <head>  
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Ivan Bascones Cubillo">
        <title>Array FM</title>
    </head>
    <body>
        <?php
            // Creamos el pimer array de 100 elementos
            $arraySimple = [];
            // Rellenamos el array
            for ($i=0; $i < 100; $i++) { 
                $num = random_int(0,1);
                if($num == 0){
                    $arraySimple[] = "M";
                }else{
                    $arraySimple[] = "F";
                }
            }
            // Contamos los valores del array simple y lo metemos simplificado en el array asociativo
            $arrayFM = array_count_values($arraySimple);

            // Mostramos los valores
            foreach($arrayFM as $valor => $resultado){
                echo "<p>$valor: $resultado</p>";
            }
        ?>
    </body>
</html>