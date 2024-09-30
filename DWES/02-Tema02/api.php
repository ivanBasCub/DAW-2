<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabajar con API</title>
</head>
<body>
    <?php
        /*
        En este archivo PHP se va a trabajar con la api que vas a usar para el proyecto final de curso.
        Para crear el modulo de SRD de la web
        */

        // curl es una libreria de PHP para poder trabajar con datos publicados en api
        // Inicialización de una sesión curl
        $ch = curl_init();

        // Variable que contiene la api
        $url = 'https://www.dnd5eapi.co';
        $url_clases = $url . '/api/classes/'; // Nota: Concatenar cadenas en PHP es con el punto no con el simbolo de sumar

        // Colocamos los parametros necesarios para trabajar con la api
        curl_setopt($ch,CURLOPT_URL,$url_clases); // Introducimos la url que vamos a usar para llamar a la api
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true); // Devuelve el resultado en una cadena curl_exec

        // Ejecutamos la api 
        $response = curl_exec($ch);

        // Filtro por si la llamada de la api sale mal
        if(curl_errno($ch)){
            // Cargar el mesaje de error en una variable
            $error_msg = curl_error($ch);
            echo "Error al conectarse a la API";
        }else{
            // Cerramos la llamada a la api
            curl_close($ch);
            // Guardamos la información de la api en una variable
            $clases = json_decode($response, true);

            // Mostrar la información de la api
            echo "<ul>";
            for ($i=0; $i < count($clases['results']); $i++) { 
                echo "<li>". $clases['results'][$i]['name'] . "</li>";
                $url_data_clases = $url . $clases['results'][$i]['url'];

                $curl = curl_init();
                curl_setopt($curl,CURLOPT_URL,$url_data_clases); // Introducimos la url que vamos a usar para llamar a la api
                curl_setopt($curl,CURLOPT_RETURNTRANSFER,true); // Devuelve el resultado en una cadena curl_exec

                $response = curl_exec($curl);

                if (curl_errno($curl)) {
                    $error_msg = curl_error($curl);
                }else{
                    curl_close($curl);

                    $clase_info = json_decode($response,true);

                    echo "<ul>";
                        echo "<li> Hit die: d". $clase_info['hit_die'] ."</li>";
                        echo "<li>".$clase_info['proficiency_choices'][0]['desc']."</li>";
                    echo "</ul>";
                }
            }
            echo "</ul>";
        }
    ?>
</body>
</html>