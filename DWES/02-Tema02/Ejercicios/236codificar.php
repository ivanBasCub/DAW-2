<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Ivan Bascones Cubillo">
        <title>Codificar</title>
    </head>
    <body>
        <form method="post" action="">
            <label>Cadena de Caracteres: </label><input type="text" name="frase"><br>
            <label>Desplazamiento: </label><input type="number" name="number" min="1"><br>
            <input type="submit" name="boton" value="Enviar"><hr>
        </form>
        <?php
            /*
            utilizando las funciones para trabajar con caracteres, a partir de una cadena y un desplazamiento:

                Si el desplazamiento es 1, sustituye la A por B, la B por C, etc.
                El desplazamiento no puede ser negativo
                Si se sale del abecedario, debe volver a empezar

            Hay que respetar los espacios, puntos y comas.
            */

            // Funciones 
            function codificador($frase,$desp){
                // Creamos un array con los casos que queramos evitar
                $jump = [" ",",","."];
                //Creamos una variable string para almacenar la frase codificada
                $cod = "";
                // Comprobamos si el desplazamiento no es negativo o cero
                if($desp <= 0){
                    return "ERROR. El desplazamiento no puede ser negativo o cero";
                }else{
                    // Convertimos la frase a un array
                    $frase = str_split($frase,1);
                    // hacemos un bucle foreach para ir cambiando las letras
                    foreach($frase as $letra){
                        // Comprobamos si la letra no pertenece a ninguno de los caracteres que tenemos que saltar
                        if(in_array($letra,$jump) == true){
                            $cod = $cod . $letra;
                        }else{
                            // Comprobamos si la letra que estamos comprobando se va del abecerario
                            if(((ord($letra) + $desp) >= 97 && (ord($letra) + $desp) <= 122)||((ord($letra) + $desp) >= 65 && (ord($letra) + $desp) <= 90)){
                                $cod = $cod . chr(ord($letra) + 2);
                            }else{
                                if(((ord($letra) + $desp) >= 97 && (ord($letra) + $desp) <= 122)){
                                    $cod = $cod . "a";
                                }else{
                                    $cod = $cod . "A";
                                }
                            }
                        }
                    }
                    return $cod;
                } 
            }

            // Main
            if(count($_POST) != 0){
                $frase = $_POST['frase'];
                $desp = $_POST['number'];
            }else{
                $frase = "Frase por defecto";
                $desp = 1;
            }

            echo codificador($frase,intval($desp));
        ?>
    </body>
</html>