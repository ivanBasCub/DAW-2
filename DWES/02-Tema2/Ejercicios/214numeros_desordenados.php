<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Ivan Bascones Cubillo">
        <title>Lista de numeros desordenados</title>
    </head>
    <body>
        <form method="get" action="">
            <label>Max Num:</label><input type="number" name="limit"><br>
            <input type="submit" name="boton" value="Enviar">
        </form>
        <?php
            // Creamos una variables para poner el maximo de numeros que quiere el usuario
            $max =$_GET['limit'];            
            // Creamos el array lvacio
            $lista = [];
            // Bucle for para crear el almacenar los datos
            while(count($lista) < intval(($max / 2)+1)){
                $num = random_int(0,$max);
                if($num%2 == 0){
                    if(in_array($num,$lista) == false){
                        array_push($lista,$num);
                    }
                }
            }
            echo "<hr> [";
            foreach($lista as $par){
                echo "$par ";
            }
            echo "]";
        ?>
    </body>
</html>