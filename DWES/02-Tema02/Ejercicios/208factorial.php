<?php
$num = rand(1,10);
$fact = 1;

for ($i=1; $i <= $num ; $i++) { 
    $fact = $fact * $i;
}
echo "$num! = $fact";
?>