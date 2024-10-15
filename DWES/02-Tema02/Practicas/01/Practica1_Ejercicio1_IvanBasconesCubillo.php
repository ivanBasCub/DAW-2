<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Ivan Bascones Cubillo">
        <title>Practica 1 Ejercicio 1 Ivan Bascones Cubillo</title>
    </head>
    <body>
        <form method="get" action="">
            <label>Maximo del Array:</label><input type="number" name="num_numeros"><br>
            <label>Numero Minimo:</label><input type="number" name="num_min"><br>
            <label>Numero Maximo:</label><input type="number" name="num_max"><br>
            <input type="submit" name="boton" value="Enviar">
        </form>

        <hr>
        <?php
            /*
            La funcion array_numeros que recoge la informacion a traves de URL
            Parametros que necesita es:
            - $index: tamaño del array numeros
            - $num_min: numero minimos del randomizador
            - $num_max: numero maximo del randomizador
            */
            function array_numeros ($index, $num_min, $num_max){
                // Variables
                $numeros1 = [];
                $numeros2 = [];
                $contados = [];
                
                $contador_menor = 0;
                $contador_mayor = 0;
                
                // Comprobamos que el indice no puede ser menor que cero
                if($index > 1){

                    // Comprobamos que los numeros minimo y maximo son mayores o igual q cero, ademas de que el numero max tiene que ser mayor que el numero min
                    if ($num_min >= 0 && $num_max >= 0 && $num_max > $num_min){
                        // Rellenamos los arrays numeros1 y numeros2
                        // Ademas contamos los numeros del array numeros1 si son menores o mayores a la mitad del rango del array
                        for ($i=0; $i < $index; $i++) { 
                            $aux = random_int($num_min,$num_max);
                            $numeros1[]= $aux;
                            
                            // Realizamos la comprobacion
                            if($aux > $index / 2){
                                $contador_mayor++;
                            }else{
                                $contador_menor++;
                            }

                            $aux = random_int($num_min,$num_max);
                            $numeros2[]= $aux;

                        }
                        // Rellenamos el array contador con las comprobaciones
                        $contados[]=$contador_menor;
                        $contados[]=$contador_mayor;
                        
                        // Vaciamos las variables contador_menor y contador_mayor
                        $contador_mayor = 0;
                        $contador_menor = 0;

                        // Hacemos las comprobaciones del array numeros2
                        for ($i=0; $i < $index; $i++) { 
                           // Realizamos la comprobacion
                            if($numeros2[$i] > $index / 2){
                                $contador_mayor++;
                            }else{
                                $contador_menor++;
                            }
                        }
                        
                        // Salida de datos
                        if($contador_mayor > $contados[1]){
                            $contados[0] = $contador_menor;
                            $contados[1] = $contador_mayor;
                            return $numeros2;
                        }else{
                            return $numeros1;
                        }


                    }else{
                        return "ERROR. Los numeros aportados para generar o estan mal ordenados o son menores a 0";
                    }
                }else{
                    return "ERROR. El indice no puede ser menor que cero";
                }
            }

            // Programa principal

            // Variables 
            $num_numeros = 0;
            $num_min = 0;
            $num_max = 0;
            // Primero comprobamos si hay informacion enviada por la URL sino se pondra informacion por defecto
            if($_GET['num_numeros'] != null){
                $num_numeros = $_GET['num_numeros'];
                $num_min = $_GET['num_min'];
                $num_max = $_GET['num_max'];
            }else{
                $num_numeros = 10;
                $num_min = 1;
                $num_max = 10;
            }

            // Probamos la funcion
            echo var_dump(array_numeros($num_numeros,$num_min,$num_max));
        ?>
    </body>
</html>