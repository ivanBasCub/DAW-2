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
            <label>Tamaño de la contraseña</label><input type="number" name="size" min="1"><br>
            <input type="submit" name="boton" value="Enviar"><hr>
        </form>
        <?php
            /*
             crea una función que a partir de un tamaño, genere una contraseña aleatoria compuesta de letras y dígitos de manera aleatoria.            */
            // Funciones
            function genCon ($tam){
                // Creamos una variable que almacene la contraseña
                $con = "";
                $aux = rand(1,3);
                for ($i=0; $i < $tam; $i++) { 
                    switch($aux){
                        case 1:
                            $con = $con . chr(rand(65,90));
                        break;
                        case 2:
                            $con = $con .chr(rand(97,122));
                        break;
                        case 3:
                            $con = $con . random_int(0,9);
                        break;

                    }
                    $aux = rand(1,3);
                }
                chr(rand(65,90));
                chr(rand(97,122));
            }
            // Main
            if(count($_POST) != 0){
                $tam = $_POST['size']; 
            }else{
                $tam = 8; 
            }
        
            echo "La contraseña es: ". genCon($tam);
        ?>

    </body>
</html>