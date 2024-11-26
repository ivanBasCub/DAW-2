<?php
//Array de archivos y directorios
chdir('C:\Users\ivan.bascub\Documents\xampp\htdocs');
$directorio = "misphp";
$archivos = scandir($directorio, 1);
print_r($archivos);
?>