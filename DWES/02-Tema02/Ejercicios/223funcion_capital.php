<!DOCTYPE html>
<html lang="en">
    <head>  
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Ivan Bascones Cubillo">
        <title>Capitales</title>
    </head>
    <body>
        <?php
            function capital($lista,$paises){
                // Comprobamos si el valor es nulo o esta vacio
                if($paises != null || $paises != ""){
                    // Imprimimos en pantalla el pais interesado
                    if(in_array($paises,$lista)== false){
                        echo "El pais $paises no existe en la lista";
                    }else{
                        echo "La capital de $paises es ". $lista[$paises];
                    }

                    
                }else{
                    echo "Lista de capitales:";
                    echo "<ul>";
                    foreach($lista as $pais => $capital){
                        echo "<li>La capital de $pais es $capital</li>";
                    }
                    echo "</ul>";
                }
            }

            // Creamos el array asociativo con todos los paises
            $capitales = array(
                "España" => "Madrid",
                "Portugal" => "Lisboa",
                "Francia" => "Paris",
                "Japon" => "Tokio",
                "Rusia" => "Moscu",
                "Estados Unidos" => "Washington D. C."
            );
            
            $paises = "Mongolia";

            capital($capitales,$paises);

        ?>
    </body>
</html>