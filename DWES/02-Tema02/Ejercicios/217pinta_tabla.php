<!DOCTYPE html>
<html lang="en">
    <head>  
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Ivan Bascones Cubillo">
        <title>Pintar Tabla</title>
    </head>
    <body>
        <form method="post" action="">
            <label>Numero de la tabla:</label><input type="number" name="limit"><br>
            <input type="submit" name="boton" value="Enviar">
        </form>
        <?php
            $limit = $_POST['limit'];
            echo "<table border='1'>";
            echo "<hr>";
            for ($i=0; $i < $limit; $i++) { 
                echo "<tr>";
                    for ($j=0; $j < $limit; $j++) { 
                        echo "<td>($i,$j)</td>";
                    }
                echo "</tr>";
            }
            echo "</table>";
        ?>
    </body>
</html>