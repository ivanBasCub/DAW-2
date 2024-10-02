<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Ivan Bascones Cubillo">
        <title>Tabla de multiplicar</title>
    </head>
    <body>
        <form method="get" action="">
            <label>Numero para multiplicar:</label><input type="number" name="num"><br>
            <input type="submit" name="boton" value="Enviar">
        </form>
        <?php
            $num = $_GET['num'];

            echo "<h1>Tabla de multiplicar $num</h1>";
            echo "<table border= '1'>";
                echo "<thead>";
                    echo "<tr>";
                        echo "<th>Multiplicacion</th>";
                        echo "<th>Resultado</th>";
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                    for ($i=0; $i <= 10; $i++) { 
                        echo "<tr>";
                            echo "<td> $num * $i </td>";
                            echo "<td>". $num * $i ."</td>";
                        echo "</tr>";
                    }
                echo "</tbody>";
                    
            echo "</table>"
        
        ?>
    </body>
</html>
