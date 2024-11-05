<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Ivan Bascones Cubillo">
        <title>Filtrado Numeros Pares</title>
    </head>
    <body>
        <form method="post" action="">
            <label>Lista de numeros</label><input type="text" name="lista"><br>
            <input type="submit" name="boton" value="Enviar"><hr>
        </form>
        <?php
            /*
            crea un programa que permita al usuario leer un conjunto de números separados por espacios. El programa filtrará los números leídos para volver a mostrar únicamente los números pares e indicará la cantidad existente.

                Dame números: 1 4 7 9 23 10 8
                Los 3 números pares son: 4 10 8
            */
            // Funciones
            function numpares($lista){
                // Creamos un array con los numeros introducidos por el usuario
                $numlist = explode(" ",$lista);
                // Creamos un array donde vamos almacenar los numeros pares
                $numpares = [];
                // Comprobamos los numeros que hay en el primer array si son pares
                foreach($numlist as $num){
                    if($num % 2 == 0){
                        array_push($numpares,$num);
                    }else{

                    }
                }

                return $numpares;
            }
            
            // Main
            if(count($_POST) != 0){
                $lista = $_POST['lista'];
            }else{
                $lista = "1 2 3 4";
            }
            // Almacenamos los resultado en un array
            $pares = numpares($lista);
            // Los mostramos por pantalla
            echo "Los ".count($pares) ." numeros pares son: ";
            foreach($pares as $num){
                echo $num . " ";
            }
            
        ?>
    </body>
</html>