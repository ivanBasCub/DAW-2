<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $exit = false;

        for ($i=1; $i <= 10 && !$exit ; $i++) { 
            $dado = rand(1,6);
            echo "Tirando dado... <br>";
            echo "<pre>";
            echo " ___ <br>";
            echo "|   | <br>";
            echo "| $dado | <br>";
            echo "|___| <br>";

            echo "</pre>";
            if ($dado == 5){
                echo "Intentos totales: $i";
                $exit = true;
            }

            if ($dado <> 5 && $i=== 10){
                echo "<h3>No ha salido 5 en ninguno de los 10 intentos</h3>";
            } 
        }
    ?>
</body>
</html>