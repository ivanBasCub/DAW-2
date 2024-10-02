<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $curl = curl_init();

        $url = 'https://www.dnd5eapi.co';
        $url_spell = $url . '/api/spells/';

        curl_setopt($curl,CURLOPT_URL,$url_spell);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true); 

        $call = curl_exec($curl);

        if(curl_errno($curl)){
            $error_msg = curl_error($curl);
            echo "Error al conectarse a la API";
        }else{
            curl_close($curl);

            $lista_spell = json_decode($call,true);
            
            for($i = 0; $i < 10; $i++){
                if ($i == 0){
                    echo "Cantrips:";
                }else{
                    echo "Level $i:";
                }
                echo "<ul>";
                for($j = 0; $j < count($lista_spell['results']);$j++){
                    if($lista_spell['results'][$j]['level'] == $i){
                        echo "<li>".$lista_spell['results'][$j]['name']."</li>";
                    }
                }
                echo "</ul>";

            }
            
        }
            
    ?>
</body>
</html>