<?php
    $Paises = [];
    $Capitales = [];
    $arrayPaises = array(
        "España" => "Madrid",
        "Japon" => "Tokyo",
        "Alemania" => "Berlin",
        "Francia" => "Paris",
        "Portugal" => "Lisboa"
    );
    foreach($arrayPaises as $pais => $capital){
        echo "La capital de $pais es $capital<br>";
        $Paises[] = $pais;
        $Capitales[] = $capital;
    }
    echo "<br>";
    for($i=0;$i<count($Paises);$i++){
        echo "La capital de ". $Paises[$i]." es ". $Capitales[$i]."<br>";
    }
?>