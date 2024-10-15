<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Ivan Bascones Cubillo">
        <title>Array de Funciones</title>
    </head>
    <body>
        <form method="post" action="">
            <label>Numero 1:</label><input type="number" name="num1"><br>
            <label>Numero 2:</label><input type="number" name="num2"><br>
            <input type="submit" name="boton" value="Enviar">
        </form>
        <?php
            // Incluimos la libreria anterior
            include "228biblioteca.php";
            // Recogemos la información del formulario
            if ($_POST['num1'] != null){
                $num1 = $_POST['num1'];
                $num2 = $_POST['num2'];
            }else{
                $num1 = 0;
                $num2 = 0;
            }
            // Array con el nombre de funciones del archivo biblioteca
            $funciones =["sumar","restar","multiplicar","dividir"];

            // Usamos las funciones
            for ($i=0; $i < count($funciones) ; $i++) { 
                echo "<p>$funciones[$i]: ".$funciones[$i]($num1,$num2)."</p>";
            }

        ?>
    </body>
</html>