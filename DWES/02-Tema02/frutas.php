<?php
    $frutas = ["naranja", "pera", "manzana"];

    array_push($frutas, "piña");
    print_r($frutas);

   $ultFruta = array_pop($frutas);
   if (in_array("piña", $frutas)) {
    echo "<p>Queda piña</p>";
   } else {
    echo "<p>No queda piña</p>";
   }
   print_r($frutas);