<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Ivan Bascones Cubillo">
        <title>Array Multidimensional Asociativo</title>
    </head>
    <body>
        <?php
        // Recorremos el array multidimensional
            function recorrerInfo($arrayMulti,&$array){
                foreach($arrayMulti as $persona){
                    foreach ($persona as $clave => $valor){
                        // Metemos la informacion dentro del primer array
                        $array[] = [$clave,$valor]; 
                    }
                }
            }
            // Creamos el array multidimensional Asociativo
            $personas = array(
                array("nombre" => "Juan","nomina" => 1000),
                array("nombre" => "Pedro","nomina" => 900)
            );
            // Creamos los dos arrays que vamos almacenar la informacion
            $array1 = [];
            $array2 = [];

            
            recorrerInfo($personas,$array1);
            // Cambiamos la nomina de Pedro
            $personas[1]['nomina'] = 1100;

            // Recorremos el array multidimensional
            recorrerInfo($personas,$array2);

            //Mostramos los cambios
            echo var_dump($array1) ."<hr>";
            echo var_dump($array2);
        ?>
    </body>
</html>