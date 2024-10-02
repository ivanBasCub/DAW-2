<?php
    // Variables que vamos a usar
    $a = 5;
    $b = 10;

    echo 'Las variables que vamos a usar son dos: ' . '$a = ' . "$a y " . '$b = '. "$b <br>";

    //Operadores aritmeticos
    echo '----------Operadores Aritmeticos----------<br>';
    echo '-$a = ' . -$a;
    echo '<br>$a + $b = '. $a + $b; 
    echo '<br>$a - $b = '. $a - $b; 
    echo '<br>$a * $b = '. $a * $b; 
    echo '<br>$a / $b = '. $a / $b; 
    echo '<br>$a % $b = '. $a % $b;
    echo '<br>$a ** $b = '. $a ** $b; 


    echo '<br>----------Operadores Comparación----------';
    echo '<br>$a == $b = '. ($a == $b); 
    echo '<br>$a === $b = '. ($a === $b); 
    echo '<br>$a != $b / $a <> $b = '. ($a != $b); 
    echo '<br>$a < $b = '. ($a < $b); 
    echo '<br>$a > $b = '. ($a > $b); 
    echo '<br>$a <= $b = '. ($a <= $b); 
    echo '<br>$a >= $b = '. ($a >= $b); 
    echo '<br>$a <=> $b = '. ($a <=> $b); 
    echo '<br>$a ?? $b = '. ($a ?? $b); 

    echo '<br>----------Operadores Logicos----------';
    echo '<br>$a and $b / $a && $b = '. ($a && $b); 
    echo '<br>$a or $b / $a || $b = '. ($a || $b); 
    echo '<br>$a xor $b = '. ($a xor $b); 
    echo '<br>!$a = '. (!$a); 

    echo '<br>----------Operadores Asignación----------';
    echo '<br>$a = $b = '. ($a = $b); 
    echo '<br>$a += $b = '. ($a += $b); 
    echo '<br>$a -= $b = '. ($a -= $b); 
    echo '<br>$a *= $b = '. ($a *= $b); 
    echo '<br>$a /= $b = '. ($a /= $b); 
    echo '<br>$a %= $b = '. ($a %= $b); 

    echo '<br>$a++ = '. ($a++); 
    echo '<br>$a-- = '. ($a--);
    echo '<br>$a .= $b = '. ($a .= $b); 

?> 