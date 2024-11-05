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
            <label>Mayusculas: 0</label><br>
            <label>Minusculas: 1</label><br>
            <label>Tipo de Letra</label><input type="number" name="letra"><br>
            <input type="submit" name="boton" value="Enviar"><hr>
        </form>
        <?php
            /*
             crea una función que permite generar una letra aleatoria, mayúscula o minúscula, dependiendo de lo que yo quiera.
            */
            // Funciones
            function randLetra ($tipo){
                // Comprobamos el tipo de letra que quiere
                if($tipo == 0){
                    return chr(rand(65,90));
                }elseif($tipo == 1){
                    return chr(rand(97,122));
                }else{
                    return -1;
                }
            }
            // Main
            if(count($_POST) != 0){
                $tipo = $_POST['letra']; 
            }else{
                $tipo = 0; 
            }
        
            echo "Letra aleatoria: ". randLetra($tipo);
        ?>

    </body>
</html>