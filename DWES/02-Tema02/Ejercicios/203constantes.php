<?php
    define("PI", 3.1416);
    const IVA = 0.21;
    echo PI, " ", IVA. '<br>';
    /* Creamos las constantes con los variables PHP_INT_MAX y PHP_INT_MIN */
    const INT_MAX = PHP_INT_MAX;
    const INT_MIN = PHP_INT_MIN;
    echo INT_MAX . '  ' . INT_MIN . '<br>';

    // Probamos el comando settype()
    $a = 2;
    if(settype($a,"float") == 1){
        echo "False";
    }else{
        echo "True";
    };