<?php
$num = 33;
$nombre = "Larry Bird";
printf("%s llevaba el número %d", $nombre, $num); // %d -> número decimal, %s -> string
$frase = sprintf("%s llevaba el número %d", $nombre, $num);
echo $frase;
echo "<br>";
$num1 = 123.456;
$num2 = 1616.087;
printf("num1 = %1\$.2f y num2 = %2\$u",$num1,$num2);
?>