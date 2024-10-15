<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Ivan Bascones Cubillo">
        <title>Traductor a Cani</title>
    </head>
    <body>
        <form method="post" action="">
            <label>Frase:</label><input type="text" name="frase"><br>
            <input type="submit" name="boton" value="Enviar"><hr>
        </form>
        <?php
            // Recogemos la informacion del formulario
            if (count($_POST)== 0){
                $frase = "Frase por defecto";
            }else{
                $frase = $_POST["frase"];
            }

            echo "La frase insertada es: $frase <hr>";
            // Creamos una variable para almacenar la frase
            $cani = "";
            // La transcribimos a cani
            for ($i=0; $i < strlen($frase); $i++) {
                if($i % 2 == 0){
                    $cani = $cani . strtoupper($frase[$i]);
                }else{
                    $cani = $cani . strtolower($frase[$i]);
                }
               
            }
            // La mostramos por pantalla
            echo "Resultado: $cani";
        ?>
    </body>
</html>