<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Ivan Bascones Cubillo">
    <title>Descomposicion de Dinero</title>
</head>
<body>
    <?php
        // Cantidad de dinero que queremos descomponer
        $dinero = 1654;
        // Variable que contiene todos los billetes y monedas
        $billetes = [500,200,100,50,20,10,5,2,1];
        
        echo "Descomposición de: $dinero euros";
        echo "<hr>";
        // Bucle para recorrer el array
        for ($i=0; $i < count($billetes) ; $i++) { 
            // Comprobamos si el dinero que hay es igual al billete que vamos a usar
            if($dinero >= $billetes[$i]){
                // Para las monedas
                if ($billetes[$i] <= 2){
                    if(intval($dinero / $billetes[$i]) == 1){
                        echo "<p>".intval($dinero / $billetes[$i]) . " moneda de $billetes[$i]</p>";
                    }else{
                        echo "<p>".intval($dinero / $billetes[$i]) . " monedas de $billetes[$i]</p>";
                    }
                // Para los Billetes
                }else{
                    if(intval($dinero / $billetes[$i]) == 1){
                        echo "<p>".intval($dinero / $billetes[$i]) . " billete de $billetes[$i]</p>";
                    }else{
                        echo "<p>".intval($dinero / $billetes[$i]) . " billete de $billetes[$i]</p>";
                    }
                }
                // El dinero que queda por comprobar 
                $dinero = $dinero%$billetes[$i];
            }
        }
    ?>
</body>
</html>

