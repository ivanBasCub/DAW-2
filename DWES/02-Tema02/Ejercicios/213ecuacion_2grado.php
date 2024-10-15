<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Ivan Bascones Cubillo">
    <title>Calcula de 2º Grado</title>
</head>
<body>
    <?php
        // Variables de la ecuación
        $a = 2;
        $b = -15;
        $c = 7;

        echo "Ecuacion: ". $a ."x^2 + ".$b ."x + $c = 0";
        echo "<hr>";

        // Calculamos las posibles soluciones
        $ecu1 = (-$b + sqrt($b**2 - 4 * $a * $c)) / (2*$a);
        $ecu2 = (-$b - sqrt($b**2 - 4 * $a * $c)) / (2*$a);
        
        // Depende de las posibles soluciones mostramos unos datos u otros
        if ($ecu1 == NAN && $ecu2 == NAN){
            echo "<p>No tiene solución</p>";
        }elseif ($ecu1 != NAN && $ecu2 == NAN){
            echo "<p>Resultado de la ecuación es: $ecu1</p>";
        }elseif ($ecu1 == NAN && $ecu2 != NAN){
            echo "<p>Resultado de la ecuación es: $ecu2</p>";
        }else{
            echo "<p>Los Resultados de la ecuación son $ecu1 / $ecu2</p>";
        }
    ?>
</body>
</html>