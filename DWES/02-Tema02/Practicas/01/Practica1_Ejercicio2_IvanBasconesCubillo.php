<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Ivan Bascones Cubillo">
        <title>Practica 1 Ejercicio 2 Ivan Bascones Cubillo</title>
        <style>
            .verde{
                background-color: lime;
            }
        </style>
    </head>
    <body>
        <table border="1">
            <thead>
                <tr>
                    <th>Clases</th>
                    <th>Aprobados</th>
                    <th>Suspendidos</th>
                    <th>Nota Media</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    // Variables 
                        // Arrays asociativos de las clases
                        $claseA = array(
                            "Aprobados" => 0,
                            "Suspensos" => 0,
                            "Media" => 0
                        );
                        $claseB = array(
                            "Aprobados" => 0,
                            "Suspensos" => 0,
                            "Media" => 0
                        );
                        $claseC = array(
                            "Aprobados" => 0,
                            "Suspensos" => 0,
                            "Media" => 0
                        );
                        // Array con las notas
                        $datos_notas = [];
                        // Aprobados, suspensos y media total
                        $aprobados = 0;
                        $suspensos = 0;
                        $media = 0;
                        // Otras variables
                        $size = 90;
                        $clase = 30;
                    
                    // Rellenamos el array con las notas de los alumnos y calculamos los numeros de aprobados y suspensos y la media de la clase
                    for ($i=1; $i <= $size; $i++) { 
                        $aux = random_int(0,10);
                        $datos_notas[] = $aux;

                        if($i / $clase > 0 && $i / $clase <= 1){
                            // Comprobamos si han aprobado o suspendido el alumno
                            if($aux >= 5){
                                $claseA['Aprobados'] += 1;
                                $media += $aux;
                            }else{
                                $claseA['Suspensos'] += 1;
                                $media += $aux;
                            }
                            
                            // Calculamos la media y reseteamos la variable media
                            if($i == 30){
                                $claseA['Media'] = $media / $clase;
                                $media = 0;
                            }
                        }elseif($i / $clase > 1 && $i / $clase <= 2){
                            // Comprobamos si han aprobado o suspendido el alumno
                            if($aux >= 5){
                                $claseB['Aprobados'] += 1;
                                $media += $aux;
                            }else{
                                $claseB['Suspensos'] += 1;
                                $media += $aux;
                            }
                            
                            // Calculamos la media y reseteamos la variable media
                            if($i == 60){
                                $claseB['Media'] = $media / $clase;
                                $media = 0;
                            }
                        }else{
                            // Comprobamos si han aprobado o suspendido el alumno
                            if($aux >= 5){
                                $claseC['Aprobados'] += 1;
                                $media += $aux;
                            }else{
                                $claseC['Suspensos'] += 1;
                                $media += $aux;
                            }

                            // Calculamos la media y reseteamos la variable media
                            if($i == 90){
                                $claseC['Media'] = $media / $clase;
                                $media = 0;
                            }
                        }
                    }

                    // Calculamos el total de aprobados y suspensos totales
                    for ($i=0; $i < $size; $i++) { 
                        // Comprobamos si han aprobado o suspendido el alumno
                        if($datos_notas[$i] >= 5){
                            $aprobados++;
                            $media += $datos_notas[$i];
                        }else{
                            $suspensos++;
                            $media += $datos_notas[$i];
                        }
                    }
                    
                    // Calculamos la media total
                    $media = $media / $size;

                    // Mostramos los datos en la tabla
                        // Clase A
                    if ($claseA['Media'] > $claseB['Media'] && $claseA['Media'] > $claseC['Media']){
                        echo "<tr class = 'verde'>";
                    }else{
                        echo "<tr>";
                    }
                        echo "<th>Clase A</th>";
                    foreach($claseA as $estadistica => $resultado){
                        echo "<td>$resultado</td>";
                    }
                    echo "</tr>";

                        // Clase B
                    if ($claseB['Media'] > $claseA['Media'] && $claseB['Media'] > $claseC['Media']){
                        echo "<tr class = 'verde'>";
                    }else{
                        echo "<tr>";
                    }
                        echo "<th>Clase B</th>";
                    foreach($claseB as $estadistica => $resultado){
                        echo "<td>$resultado</td>";
                    }
                    echo "</tr>";

                        // Clase C
                    if ($claseC['Media'] > $claseB['Media'] && $claseC['Media'] > $claseA['Media']){
                        echo "<tr class = 'verde'>";
                    }else{
                        echo "<tr>";
                    }
                        echo "<th>Clase C</th>";
                    foreach($claseC as $estadistica => $resultado){
                        echo "<td>$resultado</td>";
                    }
                    echo "</tr>";
                    
                        // Total 
                    echo "<tr>";
                        echo "<th>Total</th>";
                        echo "<td>$aprobados</td>";
                        echo "<td>$suspensos</td>";
                        echo "<td>$media</td>";
                    echo "</tr>";
                ?>
            </tbody>
        </table>
    </body>
</html>